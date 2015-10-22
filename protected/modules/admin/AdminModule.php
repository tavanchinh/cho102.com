<?php

class AdminModule extends CWebModule
{
	
   public $homeUrl="/admin/";
   public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*'
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
          	Yii::app()->widgetFactory->widgets['CBreadcrumbs']=array( 'homeLink'=>CHtml::link('Home', array('/admin')));
		  	Yii::app()->errorHandler->errorAction='admin/default/error';
		  	return true;
		}
		else
			return false;
	}
}
