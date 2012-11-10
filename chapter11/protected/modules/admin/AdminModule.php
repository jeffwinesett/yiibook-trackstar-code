<?php

class AdminModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
		
		$this->layout = 'main';

	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			if( !Yii::app()->user->checkAccess("admin") )
			{
				throw new CHttpException(403,Yii::t('application','You are not authorized to perform this action.'));
			}
			return true;
		}
		else
			return false;
	}
}
