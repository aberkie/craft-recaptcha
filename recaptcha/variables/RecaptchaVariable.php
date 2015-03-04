<?php

namespace Craft;
/*
*
* reCaptcha for Craft Variables
* Author: Aaron Berkowitz (@asberk)
* https://github.com/aberkie/craft-recaptcha
*
*/

class RecaptchaVariable
{
	public function render($params=null)
	{
		$return = craft()->recaptcha_render->render($params);
		return $return;
	}
	
}
