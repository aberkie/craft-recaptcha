<?php
namespace Craft;

/**
 * Recaptcha controller
 */
class Recaptcha_ServiceController extends BaseController
{
    protected $allowAnonymous = true;
	/**
	 * Handle the save user form request.
	 */
	public function actionSaveUser()
	{
        $this->requirePostRequest();
		$captcha = craft()->request->getPost('g-recaptcha-response');
		$verified = craft()->recaptcha_verify->verify($captcha);
		
		if ($verified)
		{
			$this->forward('users/saveUser', false);
		}
		else
		{
            craft()->urlManager->setRouteVariables(array(
               'errors' => array('Failed Recaptcha validation',
               )
            ));
		}
	}
}
