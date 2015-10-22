<?php

class ChangepasswordController extends Controller
{
   /**
   * Check login all action
   */
   public $layout='//layouts/cms/create';
   public function beforeAction($action){
      if(is_null(Yii::app()->user->id))
         $this->redirect('/admin/default/login');
      else
         return true;
   }
   public function actionIndex()
	{
	   $_SESSION['session_user'] = md5(time());    
	   $user_id = Yii::app()->user->id;
      $message = '';  
      $error_message = '';
      $action_user = Yii::app()->request->getParam('action_user',''); // Biến xác định user ấn apply hay save  
      $model = Member::model()->findByPk($user_id);
      if(isset($_POST['Member'])){
      $session_user = $_POST['session_user'];
      if($session_user == $_SESSION['session_user']){
         $oldPassword = $_POST['Member']['oldPassword'];
         $newPassword = $_POST['Member']['Password'];
         $repeatPassword = $_POST['Member']['repeatPassword'];
         if(md5($oldPassword) != $model->attributes['Password'] || $oldPassword == ''){
            $error_message = 'Mật khẩu cũ không chính xác';
         }elseif($repeatPassword != $newPassword || $newPassword == ''){
            $error_message = 'Xác nhận mật khẩu không chính xác';
         }else{
            $model->Password = md5($newPassword);
            $model->save(false);
            $message = 'Cập nhật thành công';
            if($action_user == 'save'){
               $this->redirect('/index.php/admin/member');
            }
         } 
      }
      
      
      }
      $this->pageTitle = 'Đổi mật khẩu';
		$this->render('index',array('model' => $model,
                                  'session_user' => $_SESSION['session_user'],
                                  'message' => $message,
                                  'error_message' => $error_message));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}