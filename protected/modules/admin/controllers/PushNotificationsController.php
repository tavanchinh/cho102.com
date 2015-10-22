<?php

class PushNotificationsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/cms/main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
        $group_admin = Member::getUserByGroup('admin');
        $group_sp_admin = Member::getUserByGroup('sp_admin');
      
      return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>$group_sp_admin,
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','changepassword'),
				'users'=>$group_sp_admin,
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>$group_sp_admin,
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		
      $model=new PushNotifications;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PushNotifications']))
		{
			//$model->attributes=$_POST['PushNotifications'];
         
         foreach($_POST['PushNotifications']['device_id'] as $device_id){
            $model=new PushNotifications;
            $model->device_id = $device_id;
            $model->content = $_POST['PushNotifications']['content'];
            if($model->save()){
               $device = Devices::model()->findByPk($device_id);
               if(!is_null($device)){
                  $device_token = $device->device_token;
                  $gcm = new GCM();
                  $gcm->send_notification($device_token,$model->content);
               }
            }
            
         }
			
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PushNotifications']))
		{
			$model->attributes=$_POST['PushNotifications'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('PushNotifications');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PushNotifications('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PushNotifications']))
			$model->attributes=$_GET['PushNotifications'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PushNotifications the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PushNotifications::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PushNotifications $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='push-notifications-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
   
   public function actiontest(){
      $gcm = new GCM();
      $mgs = json_encode(array('msg' => 'Noi dung nay se duoc gui den thiet bi nguoi dung', 'alert' => '123'));
      $device_token = 'APA91bExkYaoLjv6y5BgtVzAnf_vyMt7qlkrA3FOp7q6-UOE3nphr3t3zeo4IgSKGpBxh9PZZOfF8id5TdkZElsFZPw8CIjsa9UVoHx6JBvXddd5Y4l-eVd1GOJuzAyhHz40ZxEnxbG2SFgxDHqt0Ep5GnLaj0iTcra5PN49EyxiZM2WxQjSGBY';
      $gcm->send_notification($device_token,$mgs);
      
   }
}
