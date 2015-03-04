<?php

/*
*
* reCaptcha for Craft Main Plugin File
* Author: Aaron Berkowitz (@asberk)
* https://github.com/aberkie/craft-recaptcha
*
*/

namespace Craft;

class RecaptchaPlugin extends BasePlugin
{
	function getName()
	{
		return Craft::t('reCAPTCHA for Craft');
	}
	
	function getVersion()
	{
		return '1.0';
	}
	
	function getDeveloper()
	{
		return 'Aaron Berkowitz';
	}
	
	function getDeveloperUrl()
	{
		return 'https://github.com/aberkie';
	}

	protected function defineSettings()
	{
		return array(
			'siteKey' => array(AttributeType::Mixed, 'default' => ''),
			'secretKey' => array(AttributeType::Mixed, 'default' => '')
		);
	}

	public function getSettingsHtml()
	{
		return craft()->templates->render('recaptcha/settings', array(
			'settings' => $this->getSettings()
		));
	}
}
