<?php

/**
 * This is the model class for table "platforms".
 *
 * The followings are the available columns in table 'platforms':
 * @property integer $id
 * @property string $platform_name
 * @property string $platform_code_identifer
 * @property string $api_key
 *
 * The followings are the available model relations:
 * @property AppVersions[] $appVersions
 * @property Devices[] $devices
 */
class Platforms extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'platforms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('platform_name, platform_code_identifer', 'required'),
			array('platform_name, platform_code_identifer, api_key', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, platform_name, platform_code_identifer, api_key', 'safe', 'on'=>'search'),
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
			'appVersions' => array(self::HAS_MANY, 'AppVersions', 'platform_id'),
			'devices' => array(self::HAS_MANY, 'Devices', 'platform_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'platform_name' => 'Platform Name',
			'platform_code_identifer' => 'Platform Code Identifer',
			'api_key' => 'Api Key',
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
		$criteria->compare('platform_name',$this->platform_name,true);
		$criteria->compare('platform_code_identifer',$this->platform_code_identifer,true);
		$criteria->compare('api_key',$this->api_key,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Platforms the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
