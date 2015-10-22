<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property integer $cat_id
 * @property string $sapo
 * @property string $content
 * @property integer $active
 * @property integer $hot
 * @property string $create_date
 * @property string $modify_date
 * @property integer $view
 * @property integer $comment
 * @property integer $count_like
 * @property integer $has_video
 */
class News extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, cat_id, content, create_date', 'required','message' => '{attribute} không được bỏ trống'),
         array('image', 'file', 'types'=>'jpg, gif, png','wrongType' => 'Chỉ cho phép tải lên những file có định dạng jpg,png và gif','maxSize' => 1024 * 1024 * 2,'tooLarge' => 'Dung lượng ảnh không được vượt quá 2MB','allowEmpty'=>'true'),
			array('cat_id, active, hot, view, comment, count_like, has_video', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('sapo', 'length', 'max'=>512),
			array('modify_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, image, cat_id, sapo, content, active, hot, create_date, modify_date, view, comment, count_like, has_video', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}
   

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Tiêu đề',
         'image' => 'Ảnh đại diện',
			'cat_id' => 'Danh mục',
			'sapo' => 'Tóm tắt',
			'content' => 'Nội dung',
			'active' => 'Hiển thị',
			'hot' => 'Tin hot',
			'create_date' => 'Ngày tạo',
			'modify_date' => 'Ngày cập nhật',
         'view' => 'View',
         'comment' => 'Comment',
         'count_like' => 'Lượt like',
         'has_video' => 'Tin chứa video',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
      
		$criteria=new CDbCriteria;
      
		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
      $criteria->compare('image',$this->image,true);
		
		$criteria->compare('sapo',$this->sapo,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('hot',$this->hot);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('modify_date',$this->modify_date,true);
      $criteria->compare('view',$this->view);
      $criteria->compare('comment',$this->comment);
      $criteria->compare('count_like',$this->count_like);
      $criteria->compare('has_video',$this->has_video);
      
      if($this->cat_id != null){
         // Nếu chọn cate cha thì load ra cả những tin của cate con
         $list_child_cate = array($this->cat_id);
         //CVarDumper::dump($list_child_cate,10,true);die();
         $list_cate = Category::model()->findAllByAttributes(
            array('parent_id' => $this->cat_id)
         );
         if(count($list_cate) > 0){
            foreach($list_cate as $item){
               $list_child_cate[] = $item->id;
            }
         }
         $criteria->addInCondition('cat_id',$list_child_cate);
      }
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
         'sort'=>array(
             'defaultOrder'=>'modify_date DESC, create_date DESC',
         ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
   
   public function getDetailLink($id,$title){
      return '/tin-tuc/' . CVietnameseTools::makeUrlFriendly($title).'-'.$id.'.html';
   }
   
   /**
    * Get path image
   */
   public function getPathImage(){
      return Yii::app()->request->baseUrl.'/uploads/pictures/news/';
   }
   
   /**
    * Get full of folder image
   */
   public function getDirImage(){
      return Yii::getPathOfAlias('webroot').'/uploads/pictures/news/';
   }
}
