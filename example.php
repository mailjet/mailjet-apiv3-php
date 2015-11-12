
<?php

require 'vendor/autoload.php';
use \Mailjet\Resources;

// View: CSV upload
$mj = new \Mailjet\Client(getenv('MJ_APIKEY_PUBLIC'), getenv('MJ_APIKEY_PRIVATE'));

$response = $mj->post(Resources::$DnsCheck, ['id' => 3]);
if ($response->success())
{
	var_dump("Ok");
	var_dump($response->getData());
}
else
{
	var_dump($response->getData());
}
?>
