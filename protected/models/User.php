<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property integer $city_id
 * @property integer $district_id
 * @property string $street
 * @property double $lat
 * @property double $lng
 * @property string $password
 * @property integer $gender
 * @property string $email
 * @property string $phone_number
 */
class User extends CActiveRecord
{
	public $repeatPassword;
   /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, password, gender, email, repeatPassword', 'required',
               'message' => "{attribute} không được bỏ trống",'on' => 'insert'),
         array('phone_number, city_id, district_id', 'required',
               'message' => "{attribute} không được bỏ trống",'on' => 'post_product'),
         array('repeatPassword','compare','compareAttribute' => 'password','message' => 'Xác nhận mật khẩu không chính xác','on' => 'insert'),
         array('password','validatePassword','on' => 'insert'),
			array('city_id, district_id, gender', 'numerical', 'integerOnly'=>true),
			array('lat, lng', 'numerical'),
			array('name, address, street, password, email', 'length', 'max'=>255),
         array('phone_number', 'length', 'max'=>20),
         array('email', 'email','message'=>"Định dạng email không chính xác"),
         array('email', 'unique','message'=>'Email này đã tồn tại'),   
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, address, city_id, district_id, street, lat, lng, password, gender, email, phone_number', 'safe', 'on'=>'search'),
		);
	}
   
   public function validatePassword($attribute,$params){
      if(strlen($this->password) < 8){
         $this->addError($attribute,'Mật khẩu phải dài 8 ký tự trở lên');
      }
   }
   
   public function validateLoginName($attribute,$params){
      
      $row = $this->findByAttributes(array("LoginName" => $this->LoginName));
      if(!is_null($row)){
         $this->addError($attribute,'Tên đăng nhập này đã tồn tại');
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
			'name' => 'Họ tên',
			'address' => 'Địa chỉ chi tiết',
			'city_id' => 'Tỉnh/Thành phố',
			'district_id' => 'Quận/Huyện',
			'street' => 'Đường phố',
			'lat' => 'Vĩ độ',
			'lng' => 'Kinh độ',
			'password' => 'Mật khẩu',
			'gender' => 'Giới tính',
			'email' => 'Email',
         'repeatPassword' => 'Xác nhận mật khẩu',
         'phone_number' => 'SĐT',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('district_id',$this->district_id);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('lat',$this->lat);
		$criteria->compare('lng',$this->lng);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('email',$this->email,true);
      $criteria->compare('phone_number',$this->phone_number,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function getListFriends($user_id){
        $sql = "SELECT user_id1 AS user_id FROM friend WHERE user_id2=10
                UNION
                select user_id2 AS user_id FROM friend WHERE user_id1 = 10";
        $list = Yii::app()->db->createCommand($sql)->queryAll();
        $data = array();
        if(count($list) > 0){
            foreach($list as $value){
                $data[] = $value['user_id'];
            }
        }
        
        return $data;
    }
}
