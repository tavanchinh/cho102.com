<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property integer $id
 * @property string $url
 * @property string $news_id
 * @property string $page_title
 * @property integer $site_id
 * @property string $create_date
 * @property integer $status
 * @property string $user_name
 * @property string $email
 * @property string content
 */
class Comment extends CActiveRecord
{
	public $cmt_content;
   public $verifyCode;
   
   /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url, site_id, content, user_name', 'required' , 'message' => '{attribute}  không được bỏ trống'),
			array('site_id, status', 'numerical', 'integerOnly'=>true),
			array('url, user_name, email', 'length', 'max'=>255),
         array('news_id', 'length', 'max'=>20),
         array('page_title', 'length', 'max'=>512),
			array('create_date', 'safe'),
         array('user_name','validateUserName'),
         //array('email','email','message' => 'Định dạng email không chính xác'),
         //array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(),'message' => 'Mã xác nhận không chính xác'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, url, news_id, page_title, site_id, create_date, status, user_name, email, verifyCode', 'safe', 'on'=>'search'),
		);
	}
   
   public function validateUserName($attribute,$params){
      $string = $this->$attribute;
      $string = CVietnameseTools::removeSigns($string);
      
      if(preg_match("/[^a-zA-Z0-9 ]/",$string)){
         $this->addError($attribute, 'Họ tên chứa ký tự không hợp lệ');
      }
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
			'url' => 'Url',
         'news_id' => 'News ID',
         'page_title' => 'Bài viết',
			'site_id' => 'Website',
			'create_date' => 'Ngày tạo',
			'status' => 'Status',
			'user_name' => 'Họ tên',
			'email' => 'Email',
         'content' => 'Ý kiến của bạn',
         'verifyCode' => 'Mã xác nhận',
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
	public function search($site_id = null)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
      
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('url',$this->url,true);
      $criteria->compare('news_id',$this->news_id,true);
      $criteria->compare('page_title',$this->page_title,true);
		$criteria->compare('site_id',$site_id);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('email',$this->email,true);
      $criteria->compare('verifyCode',$this->verifyCode,true);
      
      $criteria->addCondition('status=0');
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
   
}
