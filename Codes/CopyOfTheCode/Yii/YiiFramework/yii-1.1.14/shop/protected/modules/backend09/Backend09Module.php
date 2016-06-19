<?php

class Backend09Module extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'backend09.models.*',
			'backend09.components.*',
		));

		//为后台登录管理员设置session名字前缀信息
		Yii::app()->setComponents(array(
			'user'=>array(
				'stateKeyPrefix' =>'backend09',
				'loginUrl'=>'./index.php?r=backend09/manager/login',
			)
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
