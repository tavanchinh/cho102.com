<?php

class NewsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
   
   /**
    * Width and height image
   */
   private $nw = 620;
   private $nh = 330;
   /** 
    * Return path upload image
    */
   public function getDirUpload(){
      return Yii::getPathOfAlias('webroot').'/uploads/pictures/news/';
   }

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
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','checkhot','checkactive','FileManager'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$model=new News;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['News']))
		{
			$model->attributes=$_POST['News'];
         $model->create_date = date('Y-m-d H:i:s');
         
         //CVarDumper::dump($image,10,true);die();
         
			if($model->save()){
			   
			   $file = $_FILES['News'];
            $ext = strtolower(pathinfo($file['name']['image'], PATHINFO_EXTENSION));
            if ($file['name']['image'] != '') {
         		$ext = strtolower(pathinfo($file['name']['image'], PATHINFO_EXTENSION));
               $fileName = uniqid().'.'.$ext;
					$size = getimagesize($file['tmp_name']['image']);

					$x = (int) $_POST['x'];
					$y = (int) $_POST['y'];
					$w = (int) $_POST['w'] ? $_POST['w'] : $size[0];
					$h = (int) $_POST['h'] ? $_POST['h'] : $size[1];

					$data = file_get_contents($file['tmp_name']['image']);
					$vImg = imagecreatefromstring($data);
					$dstImg = imagecreatetruecolor($this->nw, $this->nh);
					imagecopyresampled($dstImg, $vImg, 0, 0, $x, $y, $this->nw, $this->nh, $w, $h);
					
               //Create image
               imagejpeg($dstImg, $this->getDirUpload().$fileName);
					imagedestroy($dstImg);
               $model->image = $fileName;
               $model->save();
               //Resize image
               $simpleImage = new SimpleImage();
               
               $simpleImage->load($this->getDirUpload().$fileName);
               $simpleImage->resizeToWidth(620);
               $simpleImage->save($this->getDirUpload().'l_'.$fileName);
               
               $simpleImage->load($this->getDirUpload().$fileName);
               $simpleImage->resizeToWidth(300);
               $simpleImage->save($this->getDirUpload().'m_'.$fileName); 
               
               $simpleImage->load($this->getDirUpload().$fileName);
               $simpleImage->resizeToWidth(90);
               $simpleImage->save($this->getDirUpload().'s_'.$fileName);  
         	}
			   $this->redirect(array('view','id'=>$model->id));
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
      $old_image = $model->image;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
      $image = CUploadedFile::getInstance($model,'image');
		if(isset($_POST['News']))
		{
			$model->attributes=$_POST['News'];
         $model->image = $old_image;
         $model->modify_date = date('Y-m-d H:i:s');
			if($model->save()){
            $file = $_FILES['News'];
            $ext = strtolower(pathinfo($file['name']['image'], PATHINFO_EXTENSION));
            //CVarDumper::dump($file,10,true);die();
            if ($file['name']['image'] != '') {
         		$ext = strtolower(pathinfo($file['name']['image'], PATHINFO_EXTENSION));
               $fileName = uniqid().'.'.$ext;
					$size = getimagesize($file['tmp_name']['image']);

					$x = (int) $_POST['x'];
					$y = (int) $_POST['y'];
					$w = (int) $_POST['w'] ? $_POST['w'] : $size[0];
					$h = (int) $_POST['h'] ? $_POST['h'] : $size[1];

					$data = file_get_contents($file['tmp_name']['image']);
					$vImg = imagecreatefromstring($data);
					$dstImg = imagecreatetruecolor($this->nw, $this->nh);
					imagecopyresampled($dstImg, $vImg, 0, 0, $x, $y, $this->nw, $this->nh, $w, $h);
					
               //Create image
               imagejpeg($dstImg, $this->getDirUpload().$fileName);
					imagedestroy($dstImg);
               $model->image = $fileName;
               $model->save();
               //Resize image
               $simpleImage = new SimpleImage();
               
               $simpleImage->load($this->getDirUpload().$fileName);
               $simpleImage->resizeToWidth(620);
               $simpleImage->save($this->getDirUpload().'l_'.$fileName);
               
               $simpleImage->load($this->getDirUpload().$fileName);
               $simpleImage->resizeToWidth(300);
               $simpleImage->save($this->getDirUpload().'m_'.$fileName); 
               
               $simpleImage->load($this->getDirUpload().$fileName);
               $simpleImage->resizeToWidth(90);
               $simpleImage->save($this->getDirUpload().'s_'.$fileName);  
               
               //Xóa những ảnh cũ
               if(file_exists($this->getDirUpload().$old_image)){
                  @unlink($this->getDirUpload().$old_image);
                  @unlink($this->getDirUpload().'s_'.$old_image);
                  @unlink($this->getDirUpload().'m_'.$old_image);
                  @unlink($this->getDirUpload().'l_'.$old_image);
               }
         	}
			   $this->redirect(array('view','id'=>$model->id));
			}
				
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
		$dataProvider=new CActiveDataProvider('News');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new News('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['News']))
			$model->attributes=$_GET['News'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
   
   public function actionFileManager(){
      $this->render('file_manager');
   }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return News the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=News::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param News $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='news-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
   
   public function gridContent($data,$row){
      $id = $data->id;
      if($id){
         $detail = News::model()->findByPk($id);
         $link = News::model()->getDetailLink($id,$detail->title);
         if(!file_exists(Yii::getPathOfAlias('webroot').'/uploads/pictures/news/s_'.$detail->image)){
            $image = Yii::app()->request->baseUrl.'/images/df_image.png';
         }else{
            $image = Yii::app()->request->baseUrl.'/uploads/pictures/news/'.'s_'.$detail->image;
         }
         //$image = ($detail->image != '') ? Yii::app()->request->baseUrl.'/uploads/pictures/news/'.'s_'.$detail->image : Yii::app()->request->baseUrl.'/images/df_image.png';
         
         $html = '<div class="left" style="margin-right:10px;width:90px;"><img src="'.$image.'"/></div>';
         $html .= '<strong><a target="_blank" href="'.$link.'">' . $detail->title . '</a></strong>';
         $sapo = ($detail->sapo != '') ?  $detail->sapo : Str::cutString(Str::removeHTML($detail->content),200);
         $html .= '<p class="sapo" style="margin-right:20px">'.$sapo.'</p>';
         return $html;   
      }else{
         return '-- Không xác định --';
      }
      
   }
   
   public function gridHot($data,$row){
      if($data->hot){
         return '<span data-status="0" data-id="'.$data->id.'" class="check-hot checked" onclick="check_hot(this)"></span>';
      }else{
         return '<span data-status="1" data-id="'.$data->id.'" class="check-hot" onclick="check_hot(this)"></span>';
      }
   }
   
   public function gridActive($data,$row){
      if($data->active){
         return '<span data-status="0" data-id="'.$data->id.'" class="check-hot checked" onclick="check_active(this)"></span>';
      }else{
         return '<span data-status="1" data-id="'.$data->id.'" class="check-hot" onclick="check_active(this)"></span>';
      }
   }
   public function gridCate($data,$row){
      $id = $data->cat_id;
      if($id){
         $detail = Category::model()->findByPk($id);
         return $detail->name;   
      }else{
         return '-- Chưa chọn --';
      }
      
   }
   
   //Check or uncheck hot
   public function actionCheckhot(){
      $status = Yii::app()->request->getParam('status');
      $id = Yii::app()->request->getParam('id');
      $model = News::model()->findByPk($id);
      //CVarDumper::dump($model);
      if($model != null){
         $model->modify_date = date('Y-m-d H:i:s');
         $model->hot = $status;
         var_dump($model->save()); 
         
      }
   }
   
   //Check or uncheck active
   public function actionCheckactive(){
      $status = Yii::app()->request->getParam('status');
      $id = Yii::app()->request->getParam('id');
      $model = News::model()->findByPk($id);
      //CVarDumper::dump($model);
      if($model != null){
         $model->modify_date = date('Y-m-d H:i:s');
         $model->active = $status;
         var_dump($model->save()); 
         
      }
   }
   
   
}
