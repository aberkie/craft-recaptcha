<?php
/*
*
* reCaptcha for Craft Verify Service
* Author: Aaron Berkowitz (@asberk)
* https://github.com/aberkie/craft-recaptcha
*
*/
namespace Craft;

class Recaptcha_VerifyService extends BaseApplicationComponent
{

	public function verify($data)
	{

		$base = "https://www.google.com/recaptcha/api/siteverify";

		$plugin = craft()->plugins->getPlugin('recaptcha');
	    $settings = $plugin->getSettings();
	   
	    $params = array(
	    	'secret' =>  $settings->attributes['secretKey'],
	    	'response' => $data
	    );

	    $client = new \Guzzle\Http\Client();

	   	$request = $client->post($base);
	   	$request->addPostFields($params);
	    $result = $client->send($request);

	    if($result->getStatusCode() == 200)
	    {
	    	$json = $result->json();
	    	if($json['success'])
	    	{
	    		return true;
	    	} else {
	    		return false;
	    	}
	    } else {
	    	return false;
	    }
	}
}