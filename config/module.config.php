<?php
return array(
    'Mailjet' => array(
        //
    ),
    'controllers' => array(
        'invokables' => array(
            'Mailjet\Controller\Api' => 'Mailjet\Controller\ApiController'
        )
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'mailjet-api-generate' => array(
                    'options' => array(
                        'route'    => 'api generate <metadata-file>',
                        'defaults' => array(
                            'controller' => 'Mailjet\Controller\Api',
                            'action'     => 'generate',
                        ),
                    ),
                ),
            )
        )
    )
);
