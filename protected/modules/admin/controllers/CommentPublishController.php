<?php

class CommentPublishController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/cms/main';

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
		$group_spadmin = Member::model()->getUserByGroup('sp_admin');
      $group_emdep = Member::model()->getUserByGroup('emdep');
      $group_myidol = Member::model()->getUserByGroup('myidol');
      $group_toancanh = Member::model()->getUserByGroup('toancanh');
      return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('handle'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	
   public function actionAdmin(){
      $model=new CommentPublish('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Comment']))
			$model->attributes=$_GET['Comment'];
      
      if (isset($_POST['Unapprove'])){ // Nếu click vào nút bỏ phê duyệt
         if (isset($_POST['selectedIds']))
         {
            foreach ($_POST['selectedIds'] as $id)
            {
               $publish_cmt = CommentPublish::model()->findByPk($id);
               $comment = Comment::model()->findByPk($id);
               if(!is_null($publish_cmt)){
                  if($publish_cmt->delete()){
                     $comment->status = 0;
                     $comment->save();
                     $error_code = 200;
                     $message = 'OK';
                  }
               }
            }
         }
      }
		$this->render('admin',array(
			'model'=>$model,
		));
   }
   

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Comment the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Comment::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Comment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
   
   public function gridUser($data,$row){
      $html = '<strong>
               <img alt="" src="'.Yii::app()->request->baseUrl.'/images/avatar_df.png" class="avatar avatar-32 photo" height="32" width="32">
               <span>'.$data->user_name.'<span>
               </strong>
               <br />
               <a href="mailto:'.$data->email.'">'.$data->email.'</a>';
      return $html;
   }
   
   public function gridContent($data,$row){
      $html = '<p class="column-comment"><strong><em>'.$data->content.'</em></strong></p>';
      $html .= '<div class="user">
                  <span>Người gửi: </span>
                  <span>'.$data->user_name.'<span>
                  <span> | Email: </span>
                  <a href="mailto:'.$data->email.'">'.$data->email.'</a>
                  <span> | Ngày : </span>
                  <span class="submitted-on"><a href="javascript:void(0)">'.date('d/m/Y',strtotime($data->create_date)).' lúc '.date('H:i',strtotime($data->create_date)).' </a></span>
               </div>';
      $html .='<div class="row-actions">
                  <span class="approve"><a href="javascript:void(0)" onclick="unapprove_cmt('.$data->id.')">Bỏ duyệt</a></span>
               </div>';
      return $html;
   }
   
   public function gridWebsite($data,$row){
      $detail_site = Site::model()->findByPk($data->site_id);
      $domain = isset($detail_site->domain) ? $detail_site->domain : 'Chưa rõ';
      $criteria = new CDbCriteria();
      $criteria->addCondition('news_id ='.$data->news_id);
      $count_cmt = CommentPublish::model()->count($criteria);
      
      $html = '<div class="response-links"><a href="javascript:void(0)">'.$domain.'</a></div>
               <a target="_blank" href="'.$data->url.'">
                  <span class="comment-count">('.$count_cmt.')</span>
                  <span title="Xem bài viết trên trang">'.$data->page_title.'</span>
               </a>';
      return $html;
   }
   
   public function actionHandle(){
      $action = Yii::app()->request->getPost('action');
      $id = Yii::app()->request->getPost('id');
      $error_code = '400';
      $message = 'No action';
      if($action == 'unapprove'){ // Nếu chọn phê duyệt sẽ chuyển bản ghi sang bảng comment_publish
         $publish_cmt = CommentPublish::model()->findByPk($id);
         $comment = Comment::model()->findByPk($id);
         //CVarDumper::dump($publish_cmt);
         if(!is_null($publish_cmt)){
            if($publish_cmt->delete()){
               $comment->status = 0;
               $comment->save();
               $error_code = 200;
               $message = 'OK';
            }
         }
      }
      
      echo json_encode(array('error_code' => $error_code,'message' => $message));
   }
}
