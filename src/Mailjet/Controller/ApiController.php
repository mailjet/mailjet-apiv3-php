<?php
/**
 * MailJet Api
 *
 * Copyright (c) 2013, Mailjet.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 *     * Redistributions of source code must retain the above copyright notice,
 *       this list of conditions and the following disclaimer.
 *
 *     * Redistributions in binary form must reproduce the above copyright notice,
 *       this list of conditions and the following disclaimer in the documentation
 *       and/or other materials provided with the distribution.
 *
 *     * Neither the name of Zend Technologies USA, Inc. nor the names of its
 *       contributors may be used to endorse or promote products derived from this
 *       software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
 * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */
namespace Mailjet\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Console\Exception\InvalidArgumentException;
use Zend\Console\ColorInterface as Color;

use Zend\Json\Json;
use Zend\Json\Exception\RuntimeException as JsonRuntimeException;

use Zend\Code\Generator;
use Zend\Code\Generator\DocBlock\Tag\ParamTag;
use Zend\Code\Generator\DocBlock\Tag\ReturnTag;
use Mailjet\Api\AbstractApi;

/**
 * Console Controller used to generate Api classes
 *
 * @link      http://mailjet.com/
 * @copyright Copyright (c) 2013 Mailjet.
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
class ApiController extends AbstractActionController
{
    const LICENSE = <<<LICENSE
Copyright (c) 2013, Mailjet.
All rights reserved.

Redistribution and use in source and binary forms, with or without modification,
are permitted provided that the following conditions are met:

    * Redistributions of source code must retain the above copyright notice,
      this list of conditions and the following disclaimer.

    * Redistributions in binary form must reproduce the above copyright notice,
      this list of conditions and the following disclaimer in the documentation
      and/or other materials provided with the distribution.

    * Neither the name of Zend Technologies USA, Inc. nor the names of its
      contributors may be used to endorse or promote products derived from this
      software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
LICENSE;

    /**
     * Generate Api and Model Classes
     *
     * @throws Exception\InvalidArgumentException
     */
    public function generateAction()
    {
        /* @var $request \Zend\Console\Request */
        /* @var $console \Zend\Console\AdapterInterface */
        $request = $this->getRequest();
        $console = $this->getServiceLocator()->get('console');

        $metadataFile = $request->getParam('metadata-file');

        if (! is_file($metadataFile)) {
            throw new Exception\InvalidArgumentException(
                "Invalid metadata file path provided '$metadataFile'"
            );
        } elseif (! is_readable(realpath($metadataFile))) {
            throw new Exception\InvalidArgumentException(
                "Cannot read metadata file '$metadataFile'; aborting."
            );
        }

        try {
            $metadata = Json::decode(file_get_contents($metadataFile));
        } catch (JsonRuntimeException $e) {
            throw new Exception\InvalidArgumentException(
                "Invalid metadata Json format; aborting." . PHP_EOL);
        }

        // Create Wrapper to consume apis
        $apiWrapperClass = new Generator\ClassGenerator();
        $apiWrapperClass->setName('Api')
            ->setNamespaceName('Mailjet\Api')
            ->setExtendedClass('AbstractApi')
            ->setDocBlock(
                new Generator\DocBlockGenerator(
                    'Mailjet Api',
                    'Wrapper used (as proxy) to consume apis',
                    array(
                        new Generator\DocBlock\Tag(
                            array(
                                'name' => 'see',
                                'description' => sprintf('http://mjdemo.poxx.net/~shubham'),
                            )
                        ),
                    )
                )
            )
        ;

        foreach ($metadata->Data as $metadata) {

            if (! $metadata->PublicOperations) {
                continue; // If not Public skip the generation
            }

            // Generate Api class
            $this->generateApiFromMetadata($metadata);

            // Generate Model class
            $this->generateModelFromMetadata($metadata);

            // Append proxy method to Wrapper
            $apiClassName = ucfirst($metadata->Name);
            $apiWrapperClass->addMethod(
                $metadata->Name,
                array(),
                Generator\MethodGenerator::FLAG_PUBLIC,
                "return \$this->api('$apiClassName');",
                new Generator\DocBlockGenerator(
                    'Helper for ' . $metadata->Name . ' calls',
                    null,
                    array(
                        new ReturnTag(
                            array(
                                'datatype' => ucfirst($metadata->Name),
                            )
                        ),
                    )
                )
            );
        }

        // Create and Write Wrapper Class File
        $file = new Generator\FileGenerator();
        $file->setClass($apiWrapperClass);
        $file->setFilename(dirname(__DIR__) . '/Api/' . $apiWrapperClass->getName() . '.php');

        if (file_put_contents($file->getFilename(), $file->generate())) {
            $console->writeLine("The Api Wrapper has been created.", Color::GREEN);
        } else {
            $console->writeLine("There was an error during Api Wrapper creation.", Color::RED);
        }

        $console->writeLine("DONE", Color::GREEN);
        $console->writeLine("Wrote api from '$metadataFile'", Color::LIGHT_WHITE);
    }

    /**
     * Generate Api class from metadata
     *
     * @param  stdClass                      $metadata*
     * @return Generator\ClassGenerator|null
     */
    protected function generateApiFromMetadata($metadata)
    {
        $console = $this->getServiceLocator()->get('console');
        $name = strtolower($metadata->Name);
        $ucName = ucfirst($name);

        $objectPrototype = sprintf('Mailjet\Model\%s', $ucName);

        // Create Api Class
        $class = new Generator\ClassGenerator($ucName, 'Mailjet\Api');
        $class->setExtendedClass('AbstractApi')
            ->adduse('Mailjet')
            ->adduse('Mailjet\Model')
            ->addUse('Mailjet\Api\ResultSet')
            ->setDocBlock(
                new Generator\DocBlockGenerator(
                    $class->getName() . ' Api',
                    $metadata->Description,
                    array(
                        new Generator\DocBlock\Tag(
                            array(
                                'name' => 'see',
                                'description' => sprintf('http://mjdemo.poxx.net/~shubham/%s.html', $name),
                            )
                        ),
                    )
                )
            )->addMethod(
                'init',
                array(),
                Generator\MethodGenerator::FLAG_PUBLIC,
                sprintf('$this->getResultSetPrototype()->setObjectPrototype(new %s);', $objectPrototype) . PHP_EOL .
                sprintf('$this->setUrl(\'%s/%s/\');', AbstractApi::API_BASE_URI, $name) . PHP_EOL,
                new Generator\DocBlockGenerator("Post __construct initializations")
            );
        ;

        // Property : Name of Api
        $nameProperty = new Generator\PropertyGenerator('name');
        $nameProperty->setFlags(Generator\PropertyGenerator::FLAG_PROTECTED);
        $nameProperty->setDefaultValue($name);
        $nameProperty->setDocBlock(new Generator\DocBlockGenerator('Api name'));
        $class->addPropertyFromGenerator($nameProperty);

        // Property : Filters
        $filters = array();
        foreach ($metadata->Filters as $filter) {
            $filters[$filter->Name] = array(
                'name' => $filter->Name,
                'required' => $filter->IsRequired,
            );
        }
        $filtersProperty = new Generator\PropertyGenerator('filters');
        $filtersProperty->setFlags(Generator\PropertyGenerator::FLAG_PROTECTED);
        $filtersProperty->setDefaultValue($filters);
        $filtersProperty->setDocBlock(new Generator\DocBlockGenerator('Supported Filters'));
        $class->addPropertyFromGenerator($filtersProperty);

        // Property : Properties
        $properties = array();

        $initMethod = $class->getMethod('init');
        $initBodyMehtod = $initMethod->getBody();

        $hydratorAppended = false;

        foreach ($metadata->Properties as $property) {

            $property = $this->getNormalizedFilterOrProperty($property);

            if (isset($property['hydrator']['strategy'])) {
                if (!$hydratorAppended) {
                    $initBodyMehtod .= '$hydrator = $this->getResultSetPrototype()->getHydrator();' . PHP_EOL;
                    $hydratorAppended = true;
                }
                $class->addUse($property['hydrator']['strategy']);
                $initBodyMehtod .= $property['hydrator']['init'];
            }

            $properties[$property['name']] = $property;
            while (list($k, $v) = each($properties[$property['name']])) {
                if (!in_array($k, array('name', 'dataType', 'required'))) {
                    unset($properties[$property['name']][$k]);
                }
            }
        }

        $initMethod->setBody($initBodyMehtod);

        $propertiesProperty = new Generator\PropertyGenerator('properties');
        $propertiesProperty->setFlags(Generator\PropertyGenerator::FLAG_PROTECTED);
        $propertiesProperty->setDefaultValue($properties);
        $propertiesProperty->setDocBlock(new Generator\DocBlockGenerator('Supported properties'));
        $class->addPropertyFromGenerator($propertiesProperty);

        $httpMethodes = explode(', ', $metadata->PublicOperations);
        array_walk($httpMethodes, function (&$v) {$v = strtoupper($v);});

        foreach ($httpMethodes as $httpMethod) {
            $this->generateApiOperationFromMetadata($class, $httpMethod, $metadata);
        }

        // Create and Write Api Class File
        $file = new Generator\FileGenerator();
        $file->setClass($class);
        $file->setDocBlock(new Generator\DocBlockGenerator(
            'MailJet Api',
            self::LICENSE
        ));
        $file->setFilename(dirname(__DIR__) . '/Api/' . $class->getName() . '.php');

        if (file_put_contents($file->getFilename(), $file->generate())) {
            $console->writeLine(
                sprintf("The Api %s has been created.", $class->getName()),
                Color::GREEN
            );

            return $class;
        } else {
            $console->writeLine(
                sprintf("There was an error during %s Api creation.", $class->getName()),
                Color::RED
            );
        }
    }

    /**
     * Generate Madel class from metadata
     *
     * @param  stdClass                      $metadata
     * @return Generator\ClassGenerator|null
     */
    protected function generateModelFromMetadata($metadata)
    {
        $console = $this->getServiceLocator()->get('console');
        $name = $metadata->Name;
        $ucName = ucfirst($name);

        // Create Api Class
        $class = new Generator\ClassGenerator($ucName, 'Mailjet\Model');
        $class->setImplementedInterfaces(array('ModelInterface'))
            ->setDocBlock(
            new Generator\DocBlockGenerator(
                $class->getName() . ' Model',
                $metadata->Description,
                array()
            )
        );

        $this->addProperties($class, $metadata->Properties);

        // Create and Write Api Class File
        $file = new Generator\FileGenerator();
        $file->setClass($class);
        $file->setDocBlock(new Generator\DocBlockGenerator(
            'MailJet Model',
            self::LICENSE
        ));
        $file->setFilename(dirname(__DIR__) . '/Model/' . $class->getName() . '.php');

        if (file_put_contents($file->getFilename(), $file->generate())) {
            $console->writeLine(
                sprintf("The Model '%s' has been created.", $class->getName()),
                Color::GREEN
            );

            return $class;
        } else {
            $console->writeLine(
                sprintf("There was an error during '%s' Model creation.", $class->getName()),
                Color::RED
            );
        }

        return $class;
    }

    /**
     * Append Properties, Getter and Setter to Model class
     *
     * @param Generator\ClassGenerator $class
     * @param array                    $properties
     * @param array                    $hydratorStrategy
     */
    protected function addProperties(Generator\ClassGenerator &$class, array $properties)
    {

        foreach ($properties as $metadata) {

            $propertyInfos = $this->getNormalizedFilterOrProperty($metadata);

            $name = $propertyInfos['name'];
            $required = $propertyInfos['required'];
            $lazyLoading = $propertyInfos['lazyLoading'];
            $dataType = $propertyInfos['dataType'];
            $defaultValue = $propertyInfos['defaultValue'];
            $description = $propertyInfos['description'];
            $flags = Generator\PropertyGenerator::FLAG_PROTECTED;

            foreach ($propertyInfos['uses'] as $use) {
                $class->addUse($use);
            }

            $property = new Generator\PropertyGenerator($name);
            $property->setFlags($flags);

            if (!empty($defaultValue) or 'bool' === $dataType ) {
                $property->setDefaultValue($defaultValue, $dataType);
            }

            $property->setDocBlock(new Generator\DocBlockGenerator($description));
            $class->addPropertyFromGenerator($property);

            // Add Setter method
            $setterParam = new Generator\ParameterGenerator($name, true === $lazyLoading ? null : $dataType);
            if (!$required) {
                $setterParam->setDefaultValue(null);
            }

            $setterBody = '';
            if (true === $lazyLoading) {
            	if( $dataType == "ResultSet")
            	{
            		$class->addUse('Mailjet\Api\ResultSet\Exception');
            		$setterBody .= sprintf(
            				'if (! ($%s instanceof \Closure || $%s instanceof %s)) {' . PHP_EOL .
            				'   throw new Exception\InvalidArgumentException("%s must be an instance of \'%s\' or \Closure");' . PHP_EOL .
            				'}' . PHP_EOL . PHP_EOL
            				, $name, $name, $dataType, $name, $dataType);
            	}else{
	                $setterBody .= sprintf(
	                        'if (! ($%s instanceof \Closure || $%s instanceof %s)) {' . PHP_EOL .
	                        '   throw new Exception\InvalidArgumentException("$%s must be an instance of \'%s\' or \Closure");' . PHP_EOL .
	                        '}' . PHP_EOL . PHP_EOL
	                        , $name, $name, $dataType, $name, $dataType);
            	}
            }
            $setterBody .= sprintf(
                '$this->%s = $%s;' . PHP_EOL .
                'return $this;' . PHP_EOL, $name, $name
            );
            $class->addMethod(
                'set' . ucfirst($name),
                array(
                    $setterParam
                ),
                Generator\MethodGenerator::FLAG_PUBLIC,
                $setterBody,
                new Generator\DocBlockGenerator(
                    "Sets the " . $property->getDocBlock()->getShortDescription(),
                    '',
                    array(
                        new ParamTag(
                            array(
                                'name' => $name,
                                'datatype' => $dataType,
                            )
                        ),
                        new ReturnTag(
                            array(
                                'datatype' => $class->getName(),
                            )
                        ),
                    )
                )
            );

            // Add Getter method
            $getterBody = '';

            if (true === $lazyLoading) {

                $getterBody .= sprintf(
                    'if ($this->%s instanceof \Closure) {' . PHP_EOL .
                    '   $this->%s = call_user_func($this->%s);' . PHP_EOL .
                    '}' . PHP_EOL .
                    'if (! $this->%s instanceof %s) {' . PHP_EOL .
                    '    $this->%s = new %s();' . PHP_EOL .
                    '}' . PHP_EOL . PHP_EOL
                    , $name, $name, $name, $name, $dataType, $name, $dataType);
            }
            $getterBody .= sprintf('return $this->%s;', $name);

            $class->addMethod(
                'get' . ucfirst($name), //'bool' === $dataType ? ucfirst($name) : 'get' . ucfirst($name),
                array(),
                Generator\MethodGenerator::FLAG_PUBLIC,
                $getterBody,
                new Generator\DocBlockGenerator(
                    'Gets the ' . $property->getDocBlock()->getShortDescription(),
                    '',
                    array(
                        new ReturnTag(
                            array(
                                'datatype' => $dataType,
                            )
                        ),
                    )
                )
            );

            // If DataType Resulset => add/remove methods
            if ('ResultSet' === $dataType) {
                $class->addMethod(
                    'add' . ucfirst($name) . 'Item',
                    array(new Generator\ParameterGenerator('item', $propertyInfos['model'])),
                    Generator\MethodGenerator::FLAG_PUBLIC,
                    sprintf('return $this->get%s()->add($item);' . PHP_EOL, ucfirst($name)),
                    new Generator\DocBlockGenerator(
                        'Add new item to ' . ucfirst($name),
                        '',
                        array(
                            new ReturnTag(
                                array(
                                    'datatype' => 'bool',
                                )
                            ),
                        )
                    )
                );
                $class->addMethod(
                    'remove' . ucfirst($name) . 'Item',
                    array(new Generator\ParameterGenerator('item', $propertyInfos['model'])),
                    Generator\MethodGenerator::FLAG_PUBLIC,
                    sprintf('return $this->get%s()->remove($item);' . PHP_EOL, ucfirst($name)),
                    new Generator\DocBlockGenerator(
                        'Remove $item from ' . ucfirst($name),
                        '',
                        array(
                            new ReturnTag(
                                array(
                                    'datatype' => 'bool',
                                )
                            ),
                        )
                    )
                );
            }
        }

    }

    /**
     * Append methods to Api class
     *
     * @param Generator\ClassGenerator $class
     * @param string                   $operation
     * @param mixed                    $apiMetadata
     * @param FileGenerator            $demoFile
     */
    protected function generateApiOperationFromMetadata(Generator\ClassGenerator & $class,
        $httpMethod, $apiMetadata)
    {
        $console = $this->getServiceLocator()->get('console');

        $modelClassName = 'Mailjet\\Model\\' . $class->getName();
        $model = $class->getName();
        $class->addUse('Zend\Json\Json')
                ->addUse('Zend\InputFilter');

        $httpMethod = strtoupper($httpMethod);

        switch ($httpMethod) {
            case 'GET' :

                if ($apiMetadata->Filters) {

                    $class->addMethods(array(
                         new Generator\MethodGenerator(
                            'getList',
                            array(
                                new Generator\ParameterGenerator(
                                   'filters',
                                   'array',
                                   array()
                                )
                            ),
                            Generator\MethodGenerator::FLAG_PUBLIC,
                            'return parent::_list($filters);',
                            new Generator\DocBlockGenerator(
                                "Return list of $modelClassName",
                                "Return list of $modelClassName filtered by \$filters if provided"
                                . PHP_EOL ,
                                array(
                                    new ParamTag(
                                        array(
                                            'name' => 'filters',
                                            'datatype' => 'array',
                                            'description' => 'key/val filters',
                                        )
                                    ),
                                    new ReturnTag(
                                        array(
                                            'datatype' => 'ResultSet\ResultSet',
                                            'description' => "List of $modelClassName",
                                        )
                                    ),
                                )
                            )
                        ),
                    ));

                    foreach ($apiMetadata->Filters as $filterInfo) {

                        try {
                            $filterName = $filterInfo->Name;

                            $dataTypeInfos = $this->getNormalizedFilterOrProperty($filterInfo);

                            $dataType = $dataTypeInfos['dataType'];
                            foreach ($dataTypeInfos['uses'] as $use) {
                                $class->addUse($use);
                            }

                            $isKey = $filterName == $apiMetadata->UniqueKey;

                            if ($isKey) {
                                $bodyMethod = sprintf('return $this->_get($%s);' . PHP_EOL, $filterName);
                            } else {
                                $bodyMethod = sprintf(
                                    '$result = $this->getList(array(\'%s\' => $%s));' . PHP_EOL .
                                    'return $result;', $filterName, $filterName
                                );
                            }

                            $class->addMethods(array(
                                new Generator\MethodGenerator(
                                    'getBy' . $filterName,
                                    array(
                                        new Generator\ParameterGenerator(
                                            $filterName,
                                            $dataType
                                        )
                                    ),
                                    Generator\MethodGenerator::FLAG_PUBLIC,

                                    $bodyMethod,

                                    new Generator\DocBlockGenerator(
                                        ($isKey ? "Return $modelClassName" : "Return list of $modelClassName with $filterName = \$$filterName"),
                                        '',
                                        array(
                                            new ParamTag(
                                                array(
                                                    'name' => $filterName,
                                                    'datatype' => $dataType,
                                                )
                                            ),
                                            new ReturnTag(
                                                array(
                                                    'datatype' => $isKey ? $modelClassName : 'ResultSet\ResultSet',
                                                )
                                            ),
                                        )
                                    )
                                ),
                            ));
                        } catch (\Exception $e) {
                            $console->writeLine('[' . $class->getName() . ']' . $e->getMessage(), Color::YELLOW);
                        }
                    }

                    $param = new Generator\ParameterGenerator('id', 'int');
                    $class->addMethods(array(
                        new Generator\MethodGenerator(
                            'get',
                            array($param),
                            Generator\MethodGenerator::FLAG_PUBLIC,
                            'if (empty($id)) {' . PHP_EOL .
                            '    throw new Exception\InvalidArgumentException("You must specify the ID");' . PHP_EOL .
                            '}' . PHP_EOL . PHP_EOL .
                            'return parent::_get($id);',
                            new Generator\DocBlockGenerator(
                                "Return $modelClassName with id = \$id",
                                '',
                                array(
                                    new ParamTag(
                                        array(
                                            'name' => 'id',
                                            'datatype' => 'int',
                                            'description' => 'Id of resource to get',
                                        )
                                    ),
                                    new ReturnTag(
                                        array(
                                            'datatype' => $modelClassName,
                                        )
                                    ),
                                )
                            )
                        ),
                    ));
                } else {
                    $class->addMethods(array(
                        new Generator\MethodGenerator(
                            'current',
                            array(),
                            Generator\MethodGenerator::FLAG_PUBLIC,
                            'return parent::_get();',
                            new Generator\DocBlockGenerator(
                                "Return current $modelClassName",
                                '',
                                array(
                                    new ReturnTag(
                                        array(
                                            'datatype' => $modelClassName,
                                        )
                                    ),
                                )
                            )
                        ),
                    ));
                }

                break;

            case 'DELETE':

                $class->addMethods(array(
                    new Generator\MethodGenerator(
                        'delete',
                        array(
                            new Generator\ParameterGenerator('id')
                        ),
                        Generator\MethodGenerator::FLAG_PUBLIC,
                         'return parent::_delete($id);',
                        new Generator\DocBlockGenerator(
                            "Delete the $model with id = \$id",
                            '',
                            array(
                                new ParamTag(
                                    array(
                                        'name' => 'id',
                                        'datatype' => 'integer',
                                        'description' => 'Id to delete',
                                    )
                                ),
                                new ReturnTag(
                                    array(
                                        'datatype' => 'bool',
                                        'description' => 'True on success',
                                    )
                                ),
                            )
                        )
                    ),
                ));

                break;

            case 'POST' :

                $modelParameter = new Generator\ParameterGenerator($model, $modelClassName);
                $modelParameter->setPassedByReference(true);

                $class->addMethods(array(
                    new Generator\MethodGenerator(
                        'create',
                        array(
                            $modelParameter
                        ),
                        Generator\MethodGenerator::FLAG_PUBLIC,
                        "return parent::_create($$model);",
                        new Generator\DocBlockGenerator(
                            "Create a new $model",
                            '',
                            array(
                                new ParamTag(
                                    array(
                                        'name' => $model,
                                        'datatype' => $modelClassName
                                    )
                                ),
                                new ReturnTag(
                                    array(
                                        'datatype' => "$modelClassName|false",
                                        'description' => 'Object created or false',
                                    )
                                ),
                            )
                        )
                    ),
                ));
                break;

            case 'PUT':

                $modelParameter = new Generator\ParameterGenerator($model, $modelClassName);
                $modelParameter->setPassedByReference(true);

                $class->addMethods(array(
                    new Generator\MethodGenerator(
                        'update',
                        array(
                            $modelParameter
                        ),
                        Generator\MethodGenerator::FLAG_PUBLIC,
                        "return parent::_update($$model);",
                        new Generator\DocBlockGenerator(
                            "Update existing $model",
                            '',
                            array(
                                new ParamTag(
                                    array(
                                        'name' => $model,
                                        'datatype' => $modelClassName
                                    )
                                ),
                                new ReturnTag(
                                    array(
                                        'datatype' => "$modelClassName|false",
                                        'description' => 'Object created or false',
                                    )
                                ),
                            )
                        )
                    ),
                ));
                break;
            default:
                break;
        }
    }

    /**
     * Normalize property metadata
     *
     * @param  stdClass $property
     * @return array    Normalized property metadata
     */
    protected function getNormalizedFilterOrProperty($property)
    {
        $dataType = $property->DataType;
        $name = $property->Name;
        $required = $property->IsRequired;
        $lazyLoading = false;
        $uses = array();
        $hydrator = null;
        $model = null;
        $description = $property->Description;
        $defaultValue = $property->DefaultValue;

        switch ($dataType) {
            case 'Currency':
            case 'TSenderEmail':
            case 'TBillingEmail':
            case 'TEmail':
                $dataType = 'string';
                break;

            case 'TBooleanFilter':
            case 'Boolean':
                $dataType = 'bool';
                $defaultValue = $defaultValue == "true";
                break;

            case 'TStrings':
                $dataType = 'array';
                break;
			            
            case 'TUserAgent':		// moved                                 
            case 'Byte':
            case 'ShortInt':
            case 'SmallInt':
            case 'LongInt':
            case 'Int64':
                $dataType = 'int';
                break;
			
           	case 'TRecipient':		// moved
           		$name = "RecipientID";
           		$dataType = 'int';
           		break;
           	case 'TContact':		// moved
           		$name = "ContactID";
           		$dataType = 'int';
           		break;
           	case 'TSubAccount':
           		$name = "SubaccountID";
           		$dataType = 'int';
           		break;
           	case 'TMessageTemplate': // moved
           		$name = "TemplateID";
           		$dataType = 'int';
           		break;
           	case 'TDestination':	// moved
           		$name = "DestinationID";
           		$dataType = 'int';
           		break;
           	case 'TPlanSubscription': // moved
           		$name = "PlanSubscriptionID";
           		$dataType = 'int';
           		break;
           	case 'TSpamAssassinRuleList': // moved
           		$name = "SpamAssassinRuleListID";
           		$dataType = 'int';
           		break;
           	case 'TDNS':		// moved
           		$name = "DNSID";
           		$dataType = 'int';
           		break;
           	case 'TAPIKey':	// moved
           		$name = "APIKeyID";
           		$dataType = 'int';
           		break;		
           	case 'TCampaign':
           		$name = "CampaignID";
           		$dataType = 'int';
           		break;
           	case 'TMessage':
           		$name = "MessageID";
           		$dataType = 'int';
           		break;
           	case 'TMessageState':
           		$name = "StateID";
           		$dataType = 'int';
           		break;
           	case 'TNewsLetter':
           		$name = "NewsLetterID";
           		$dataType = 'int';
           		break;
           	case 'TNewsLetterTemplate':
           		$name = "TemplateID";
           		$dataType = 'int';
           		break;
           	case 'TWidget':
           		$name = "WidgetID";
           		$dataType = 'int';
           		break;

           	case 'TContactsList':	// moved
           	case 'TNewsLetterTemplateCategory':
           	case 'TSender':
           	case 'TUser': // moved
           		$name = $name."ID";
           		$dataType = 'int';
           		break;
           		
            case 'TRunLevel':
            case 'TCustomStatus':
            case 'TManyContactsAction':
            case 'TMessageEventType':
            case 'TResourceOps':
            case 'TSenderStatus':
                $uses[] = sprintf('Mailjet\Type\%s', $dataType);
                $hydrator = array(
                    'strategy' => sprintf('Mailjet\Hydrator\Strategy\%sStrategy', $dataType),
                    'init' => sprintf(
                        '$hydrator->addStrategy(\'%s\', new %sStrategy());' . PHP_EOL
                        , $property->Name, $dataType
                    )
                );
                break;

            case 'AnsiString':
                $dataType = 'string';
                break;

            case 'DateTime':
            case 'TRFC3339DateTime':
                $dataType = '\Datetime';
                $uses[] = '\Datetime';
                $hydrator = array(
                        'strategy' => 'Mailjet\Hydrator\Strategy\TRFC3339DateTimeStrategy',
                        'init' => sprintf(
                            '$hydrator->addStrategy(\'%s\', new TRFC3339DateTimeStrategy());' . PHP_EOL
                            , $property->Name
                        )
                );
                break;

            //case 'TContactsList':
            case 'TContactsListSignup':
            case 'TListRecipientList':
                $apiName = preg_replace('/^T/', '', $dataType);
                $model = preg_replace('/^T/', '', $dataType);
                $dataType = 'ResultSet';
                $uses[] = 'Mailjet\Api\ResultSet\ResultSet';
                $lazyLoading = true;
                $hydrator = array(
                    'strategy' => 'Mailjet\Hydrator\Strategy\ModelCollectionStrategy',
                    'init' => sprintf(
                        '$hydrator->addStrategy(\'%s\', new ModelCollectionStrategy($this, \'%s\'));' . PHP_EOL
                        , $property->Name, $apiName
                    )
                );
                break;

            default:
                //$dataType = 'string';
                $dataType = 'int';
                break;
        }

        $property = array(
            'name' => $name,
            'lazyLoading' => $lazyLoading,
            'dataType' => $dataType,
            'uses' => $uses,
            'hydrator' => $hydrator,
            'model' => $model,
            'required' => $required,
            'description' => $description,
            'defaultValue' => $defaultValue
        );
        while (list($k, $v) = each($property)) {
            if (null === $v) {
                unset($property[$k]);
            }
        }

        return $property;
    }
}
