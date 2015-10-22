<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		
      /*
      //CVarDumper::dump($block_news,10,true);die();
      $list_city = City::model()->findAll();
      //CVarDumper::dump($list_city,10,true);die();
      foreach($list_city as $value){
         $api = 'http://www.ebay.vn/service/authen/getDistrict?locationId='.$value->id;
         $result = json_decode(file_get_contents($api));
         $data = $result->data;
         foreach($data as $province){
            //CVarDumper::dump($province,10,true);die();
            $pro = new Province();
            $pro->id = $province->id;
            $pro->city_id = $province->cityId;
            $pro->name = $province->name;
            $pro->position = $province->order;
            $pro->save();
         }
         
         //echo $api.'<br />';
         
      }
      */
      //$address = Maps::getAddressFromLatLng(21.029128399999,105.7699631);
      //CVarDumper::dump($address,19,true);
		$this->render('index');
	}
   
   public function actionHomePage(){
      $this->render('homepage.php');
   }
   
   public function actiongetAddress(){
      $lat = Yii::app()->request->getParam('lat');
      $lng = Yii::app()->request->getParam('lng');
      echo Maps::getAddressFromLatLng($lat,$lng);
   }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
      setcookie('logged', null, -1, '/');
		$this->redirect(Yii::app()->homeUrl);
	}
   
   public function actionLoginFB(){
      $user = array();
      $app_id = "174176739397727";
      $app_secret = "6c0e227e04e9c11fd61562f17340c9eb";
      $redirect_uri = urlencode("http://localhost:2025/site/loginfb");    
      
      // Get code value
      $code = Yii::app()->request->getParam('code');
      
      if(!is_null($code)){
         // Get access token info
         $facebook_access_token_uri = "https://graph.facebook.com/oauth/access_token?client_id=$app_id&redirect_uri=$redirect_uri&client_secret=$app_secret&code=$code";    
         $ch = curl_init(); 
         curl_setopt($ch, CURLOPT_URL, $facebook_access_token_uri);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
         
         $response = curl_exec($ch); 
         curl_close($ch);
   
         
         $data = str_replace('access_token=', '', explode("&", $response));
         $access_token = $data[0];
         
         // Get user infomation
         $ch = curl_init(); 
         curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/me?access_token=$access_token");
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
         
         $response = curl_exec($ch); 
         curl_close($ch);
         $user = json_decode($response);
         CVarDumper::dump($user,10,true);die();
      }
      
      
      $this->render('login_fb',array(
         'user' => $user,
         'app_id' => $app_id,
         'redirect_uri' => $redirect_uri,
      ));
      
   }
   
   /**
    * Upload multil image width ajax
   */
   public function actionUpload(){
      $failed = false;
      $images = Array();
      $date_folder = date('Y').'/'.date('m').'/';
      $upload_dir = $_SERVER["DOCUMENT_ROOT"].'/uploads/'.$date_folder;
      $path_image = 'http://'.$_SERVER["HTTP_HOST"].'/uploads/'.$date_folder;
      if(!file_exists($upload_dir)){
         mkdir($upload_dir,0777,true);
      }
      
      if ($_SERVER['CONTENT_LENGTH'] < 8380000) {
      if (isset($_FILES['upload_files']) && $_FILES['upload_files']['error'] != 0) {    
          
              foreach($_FILES['upload_files']['tmp_name'] as $key=>$value) {
      
                      $file = $_FILES['upload_files']['name'][$key];
                      $file = CVietnameseTools::makeUrlFriendly($file);
                      // allow only image upload
                      if(preg_match('#image#',$_FILES['upload_files']['type'][$key])) {
                          if(!move_uploaded_file($value, $upload_dir.$file)) {
                              $failed = true;
                          } else {                    
                              $images[] = $path_image.$file;                    
                          }    
                      } else {
                          $images = array("error"=>"Sorry, only images are allowed to upload");
                      }
              }
      }
      } else {
          $images = array("error"=>"Sorry, Upload size exceed allowed upload size of 8MB");
      }
      if($failed == true) {
      	$images = array("error"=>"Server Error<br/>Reported to Admin");
      }
      echo '<script type="text/javascript">window.parent.Uploader.done(\''.json_encode($images).'\') </script>';
      
   }
   
   /**
    * Register user
   */
   public function actionRegister(){
      $model = new User();
      if(isset($_POST['User'])){
         $model->attributes = $_POST['User'];
         $model->password = md5($model->password);
         $model->repeatPassword = md5($model->repeatPassword);
         if($model->validate()){
            
            if($model->save()){
               echo json_encode(array('success' => 'Đăng ký thành công !'));   
            }else{
               echo json_encode(array('message' => 'Có lỗi xảy ra'));
            }
            
         }else{
            echo json_encode(array('error' => $model->errors));
         }
      }
   }
   
   /**
    * Login via ajax
   */
   public function actionLogin(){
      if(isset($_POST['User'])){
         $email = $_POST['User']['email'];
         $password = md5($_POST['User']['password']);
         $model = User::model()->findByAttributes(array(
            'email' => $email,
            'password' => $password,
         ));
         if(is_null($model)){
            echo json_encode(array('error' => 'Email hoặc mật khẩu không chính xác'));
         }else{
            Yii::app()->session['user_id'] = $model->id;
            setcookie('logged',json_encode(array('id' => $model->id,'email' => $email,'password' => $password)),time() + 86400*7,'/');
            echo json_encode(array('message' => 'Đăng nhập thành công'));
         }
      }
   }
}