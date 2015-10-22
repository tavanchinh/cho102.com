<?php

class DefaultController extends Controller
{
   //public $layout='//layouts/column3';
   public $layout='//layouts/column2';
	public function actionIndex()
	{
	   //CVarDumper::dump(Yii::app()->session['admin_id'],10,true);die();
	   $this->render('index');
      
	}
   
   /**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))      
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
			   Yii::app()->session['admin_id'] = Yii::app()->user->id;
            $this->redirect('/admin');
         }
	
		}

		$this->layout = '//layouts/cms/login';
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{  
		Yii::app()->user->logout();
		$this->redirect('/admin/default/login');
	}

	public function actionError(){
      //$this->layout = null;
      if($error=Yii::app()->errorHandler->error)
		{
         if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
   }
}