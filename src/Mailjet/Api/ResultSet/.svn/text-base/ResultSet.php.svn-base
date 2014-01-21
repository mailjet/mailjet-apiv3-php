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

namespace Mailjet\Api\ResultSet;

use ArrayObject;
use ArrayIterator;
use Countable;
use Iterator;
use IteratorAggregate;

use Zend\Stdlib\Hydrator\ArraySerializable;
use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\Stdlib\Hydrator\HydratorAwareInterface;
use Mailjet\Model\ModelInterface;

/**
 * ResultSet
 *
 * Collection of Models
 */
class ResultSet implements Iterator, ResultSetInterface, HydratorAwareInterface
{
    /**
     * @var HydratorInterface
     */
    protected $hydrator = null;

    /**
     * @var null
     */
    protected $objectPrototype = null;

    /**
     *
     * @var null int
     */
    protected $count = null;

    /**
     *
     * @var Iterator IteratorAggregate ResultInterface
     */
    protected $dataSource = null;

    /**
     *
     * @var int
     */
    protected $position = 0;

    /**
     * Constructor
     *
     * @param null|HydratorInterface $hydrator
     * @param null|object            $objectPrototype
     */
    public function __construct(HydratorInterface $hydrator = null, $objectPrototype = null)
    {
        $this->setHydrator(($hydrator) ?: new ArraySerializable);
        $this->setObjectPrototype(($objectPrototype) ?: new ArrayObject);
    }

    /**
     * Set the data source for the result set
     *
     * @param  Iterator|IteratorAggregate|ResultInterface $dataSource
     * @return ResultSet
     * @throws Exception\InvalidArgumentException
     */
    public function initialize($dataSource)
    {
        if (is_array($dataSource)) {
            // its safe to get numbers from an array       
            //$first = current($dataSource);              
            //reset($dataSource);
            $this->count = count($dataSource);
            $this->dataSource = new ArrayIterator($dataSource);   
        } elseif ($dataSource instanceof Iterator) {
            $this->dataSource = $dataSource;
        } else {
            throw new Exception\InvalidArgumentException(
                'DataSource provided is not an array nor an ArrayIterator');
        }

        if ($this->count == null && $this->dataSource instanceof Countable) {
            $this->count = $this->dataSource->count();
        }

        return $this;
    }

    /**
     * Get the data source used to create the result set
     *
     * @return null Iterator
     */
    public function getDataSource()
    {
        return $this->dataSource;
    }

    /**
     * Iterator: move pointer to next item
     *
     * @return void
     */
    public function next()
    {
        $this->dataSource->next();
        $this->position ++;
    }

    /**
     * Iterator: retrieve current key
     *
     * @return mixed
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * Iterator: is pointer valid?
     *
     * @return bool
     */
    public function valid()
    {
        if ($this->dataSource instanceof Iterator) {
            return $this->dataSource->valid();
        } else {
            $key = key($this->dataSource);

            return ($key !== null);
        }
    }

    /**
     * Iterator: rewind
     *
     * @return void
     */
    public function rewind()
    {
        if ($this->dataSource instanceof Iterator) {
            $this->dataSource->rewind();
        } else {
            reset($this->dataSource);
        }

        $this->position = 0;
    }

    /**
     * Countable: return count of rows
     *
     * @return int
     */
    public function count()
    {

        if ($this->dataSource instanceof Countable) {
            return $this->dataSource->count();
        }
        if ($this->count !== null) {
            return $this->count;
        }
        $this->count = count($this->dataSource);

        return $this->count;
    }

    /**
     * Set the row object prototype
     *
     * @param  object                             $objectPrototype
     * @throws Exception\InvalidArgumentException
     * @return ResultSet
     */
    public function setObjectPrototype($objectPrototype)
    {
        if (!is_object($objectPrototype)) {
            throw new Exception\InvalidArgumentException(
                'An object must be set as the object prototype, a ' . gettype($objectPrototype) . ' was provided.'
            );
        }
        $this->objectPrototype = $objectPrototype;

        return $this;
    }
    /**
     * Get the object prototype
     * @return mixed
     */
    public function getObjectPrototype()
    {
        return $this->objectPrototype;
    }
    /**
     * Set the hydrator to use for each row object
     *
     * @param  HydratorInterface $hydrator
     * @return ResultSet
     */
    public function setHydrator(HydratorInterface $hydrator)
    {
        $this->hydrator = $hydrator;

        return $this;
    }

    /**
     * Get the hydrator to use for each row object
     *
     * @return HydratorInterface
     */
    public function getHydrator()
    {
        return $this->hydrator;
    }

    /**
     * Iterator: get current item
     *
     * @return object
     */
    public function current()
    {    	
        $data = $this->dataSource->current();
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                if (preg_match('/^(?<name>\w+)ID$/', $k, $matches)) {                 	
                	if( !property_exists( $this->objectPrototype, $k ) )
                	{
	                    $data[$matches['name']] = $v;
	                    unset($data[$k]);
                	}
                }
            }
        }       
        
        if ($this->objectPrototype instanceof ArrayObject) {
            if (is_array($data)) {           	
                return new ArrayObject($data);
            } elseif ($data instanceof ArrayObject) {
                return $data;
            }
        }
 
        $object = is_array($data) ? $this->hydrator->hydrate($data, clone $this->objectPrototype) : false;
        return $object;
    }

    public function add(ModelInterface $element)
    {

        if ($this->dataSource instanceof Iterator) {
            $this->dataSource->append($element);

            return true;
        } else {
            $this->dataSource[] = $element;

            return true;
        }

        return false;
    }

    public function remove(ModelInterface $element)
    {
        if ($this->dataSource instanceof Iterator) {
            $elements = $this->dataSource->getArrayCopy();
            $key = array_search($element, $elements, true);
            if ($key !== false) {
                $this->dataSource->offsetUnset($key);

                return true;
            }

        } else {
            $key = array_search($element, $this->dataSource, true);
            if ($key !== false) {
                unset($this->dataSource[$key]);

                return true;
            }
        }

        return false;
    }

    /**
     * Cast result set to array of arrays
     *
     * @return array
     * @throws Exception\RuntimeException if any row is not castable to an array
     */
    public function toArray()
    {
        $return = array();
        foreach ($this as $row) {
            $return[] = $this->getHydrator()->extract($row);
        }

        return $return;
    }
}
