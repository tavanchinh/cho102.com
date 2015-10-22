<?php

class UserController extends Controller
{
	

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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;
      $list_city = CHtml::listData(City::model()->findAll(array(
         'order' => 'position ASC, name ASC',
      )),'id','name');
      //CVarDumper::dump($list_city)
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
         'list_city' => $list_city,
		));
	}
   
   public function actionInfo(){
      $rel = Yii::app()->request->getParam('rel');
      $logged = isset($_COOKIE['logged']) ? $_COOKIE['logged'] : null;
      $model = new User();
      if(!is_null($logged)){
         $decode_logged = json_decode($logged,true);
         $email = $decode_logged['email'];
         $password = $decode_logged['password'];
         $model = User::model()->findByAttributes(array(
            'email' => $email,
            'password' => $password,
         ));
      }
      if($rel == '/post'){
         $model->setScenario('post_product');
      }
      $this->render('info',array(
         'model' => $model,
         'rel' => $rel,
      ));
   }
   
   /**
    * Update info user via ajax
   */
   public function actionUpdate(){
      $name = Yii::app()->request->getPost('name');
      $email = Yii::app()->request->getPost('email');
      $phone_number = Yii::app()->request->getPost('phone_number');
      $city_id = Yii::app()->request->getPost('city_id');
      $district_id = Yii::app()->request->getPost('district_id');
      $street = Yii::app()->request->getPost('street');
      
      $error_code = 0;
      $result = '';
      $message = '';
      $logged = isset($_COOKIE['logged']) ? json_decode($_COOKIE['logged'],true) : null;
      if($logged != null){
         $model = User::model()->findByAttributes(array(
            'email' => $logged['email'],
            'password' => $logged['password'],
         ));
         $city_name = '';
         $district_name = '';
         //Edit name
         if($name != null){
            $model->name = $name;
            if($model->validate()){
               $model->save();
               $result = $name;
            }
         }
         //Edit email
         if($email != null){
            $model->email = $email;
            if($model->validate()){
               $model->save();
               $result = $email;
            }
         }
         //Edit phone_number
         if($phone_number != null){
            $model->phone_number = $phone_number;
            if($model->validate()){
               $model->save();
               $result = $phone_number;
            }
         }
         
         //Edit city_id
         if($city_id != null){
            $model->city_id = $city_id;
            $city_name = City::model()->findByPk($model->city_id)->name;
            if($model->validate()){
               $lat_lng = Maps::getLatLngFromAddress($city_name);
               $model->lat = $lat_lng['lat']; 
               $model->lng = $lat_lng['lng'];
               $model->address = $city_name; 
               $model->save();
               $result = $city_name;
            }
         }
         //Edit district_id
         if($district_id != null){
            $model->district_id = $district_id;
            $city_name = City::model()->findByPk($model->city_id)->name;
            $district_name = Province::model()->findByPk($model->district_id)->name;
            if($model->validate()){
               $lat_lng = Maps::getLatLngFromAddress($district_name . ' ' .$city_name);
               $model->lat = $lat_lng['lat']; 
               $model->lng = $lat_lng['lng']; 
               $model->address = $district_name. ' - ' .$city_name;
               $model->save();
               $result = $district_name;
            }
         }
         
         //Edit street
         if($street != null){
            
            $model->street = $street;
            $city_name = City::model()->findByPk($model->city_id)->name;
            $district_name = Province::model()->findByPk($model->district_id)->name;
            if($model->validate()){
               $lat_lng = Maps::getLatLngFromAddress($street.' - '.$district_name.' - '.$city_name);
               $model->lat = $lat_lng['lat']; 
               $model->lng = $lat_lng['lng']; 
               $model->address = $street.' - '.$district_name.' - '.$city_name;
               $model->save();
               $result = $street;
            }
         }
         
      }else{
         $error_code = 1;
         $message = 'Bạn vui lòng đăng nhập để thực hiện hành động này !';
      }
      echo json_encode(array('error_code' => $error_code,'message' => $message,'result' => $result));
   }

	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
