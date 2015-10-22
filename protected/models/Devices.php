<?php

/**
 * This is the model class for table "devices".
 *
 * The followings are the available columns in table 'devices':
 * @property integer $id
 * @property string $device_token
 * @property string $udid
 * @property integer $platform_id
 *
 * The followings are the available model relations:
 * @property Platforms $platform
 * @property PushNotifications[] $pushNotifications
 */
class Devices extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'devices';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('device_token, udid, platform_id', 'required'),
			array('platform_id', 'numerical', 'integerOnly'=>true),
			array('device_token', 'length', 'max'=>512),
			array('udid', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, device_token, udid, platform_id', 'safe', 'on'=>'search'),
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
			'platform' => array(self::BELONGS_TO, 'Platforms', 'platform_id'),
			'pushNotifications' => array(self::HAS_MANY, 'PushNotifications', 'device_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'device_token' => 'Device Token',
			'udid' => 'Udid',
			'platform_id' => 'Platform',
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
		$criteria->compare('device_token',$this->device_token,true);
		$criteria->compare('udid',$this->udid,true);
		$criteria->compare('platform_id',$this->platform_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Devices the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
