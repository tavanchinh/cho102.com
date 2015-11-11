<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id
 * @property string $name
 * @property integer $price
 * @property integer $cat_id
 * @property string $create_date
 * @property integer $sale
 * @property integer $special
 * @property string $avatar
 * @property string $des
 * @property integer $active
 * @property integer $user_id
 * @property integer $type
 */
class Product extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'product';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, des, user_id', 'required'),
            array(
                'price, cat_id, sale, special, active, user_id, type',
                'numerical',
                'integerOnly' => true),
            array(
                'name, avatar',
                'length',
                'max' => 255),
            array('create_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array(
                'id, name, price, cat_id, create_date, sale, special, avatar, des, active, user_id, type',
                'safe',
                'on' => 'search'),
            );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Tên sản phẩm',
            'price' => 'Giá',
            'cat_id' => 'Chuyên mục',
            'create_date' => 'Ngày đăng',
            'sale' => 'Giảm giá',
            'special' => 'Sản phẩm hot',
            'avatar' => 'Ảnh đại diện',
            'des' => 'Mô tả',
            'active' => 'Trạng thái',
            'user_id' => 'Người đăng',
            'type' => 'Kiểu',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('price', $this->price);
        $criteria->compare('cat_id', $this->cat_id);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('sale', $this->sale);
        $criteria->compare('special', $this->special);
        $criteria->compare('avatar', $this->avatar, true);
        $criteria->compare('des', $this->des, true);
        $criteria->compare('active', $this->active);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('type', $this->type);

        return new CActiveDataProvider($this, array('criteria' => $criteria, ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Product the static model class
     */
    public static function model($className = __class__)
    {
        return parent::model($className);
    }

    /**
     * Get path save image by name
     * @param string image_name
     * @return string path_image
     */
    public function getFullPathImageByName($image_name)
    {
        $prefix = '/uploads/';
        $default = '/images/df_image.png';
        $explode = explode('-', $image_name);
        if (count($explode) > 0) {
            $last_elm = end($explode);
            $explode = explode(".", $last_elm);
            $date_folder = substr($explode[0], 0, 4) . "/" . substr($explode[0], 4, 2) . '/';
            return $prefix . $date_folder . $image_name;
        } else {
            return $default;
        }
    }


    public function GetListImages($id)
    {
        $sql = "SELECT * FROM pro_image WHERE pro_id =:id";
        $list= Yii::app()->db->createCommand($sql)->bindParam(':id',$id)->queryAll();
        $data = array();
        if(count($list) > 0){
            foreach($list as $value){
                $data[] = $value['img'];
            }
        }
        return $data;
    }
    
    public function getCate($cat_id){
        $sql = "SELECT * FROM category WHERE pro_id =:id";
        $list= Yii::app()->db->createCommand($sql)->bindParam(':id',$id)->queryAll();
        $data = array();
        if(count($list) > 0){
            foreach($list as $value){
                $data[] = $value['img'];
            }
        }
        return $data;
    }

    /**
    * Lay danh sanh san pham theo cat_id
    * @param 
    */
    public function getByCate($cat_id,$limit,$page = 1){
        $data = Yii::app()->cache->get('prodcut_cate_'.$cat_id);
        if($data === false || $page > 0){
            $offset = $page*$limit-$limit;
            $criteria = new CDbCriteria;
            $criteria->addCondition('active=1');
            
            $list_cat_chidren = array($cat_id);
            $sql = "SELECT id FROM category WHERE parent_id =:parent_id";
            $result = Yii::app()->db->createCommand($sql)->bindParam(':parent_id',$cat_id)->queryAll();
            if(count($result) > 0){
                foreach($result as $value){
                    $list_cat_chidren[] = $value['id'];
                }
            }
            $criteria->addInCondition('cat_id',$list_cat_chidren);
            $criteria->order = 'id DESC';
            $criteria->offset = $offset;
            $criteria->limit = $limit;
            
            $data = Product::model()->findAll($criteria);
            Yii::app()->cache->set('prodcut_cate_'.$cat_id,$data,3600);
        }
        //CVarDumper::dump($data,10,true);die;
        $sliced_array = array_slice($data, 0, $limit);
        return $sliced_array;
    }
}
