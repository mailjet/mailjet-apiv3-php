<?php
return array(
    'uri' => 'http://localhost/testapi',
    'header' => array(
        'Content-Type' => 'application/json'
    ),
    'method' => 'POST',
    'body' => json_encode(array(
        'test' => array(
            'passwordCredentials' => array(
                'username' => $params[0],
                'password' => $params[1]
            )
        )
    )),
    'response' => array(
        'valid_codes' => array('200')
    )
);
