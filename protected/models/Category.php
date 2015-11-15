<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property string $position
 * @property integer $active
 */
class Category extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'category';
    }
    
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(
                'name',
                'required'
            ),
            array(
                'parent_id, active',
                'numerical',
                'integerOnly' => true
            ),
            array(
                'name, position',
                'length',
                'max' => 255
            ),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array(
                'id, name, parent_id, position, active',
                'safe',
                'on' => 'search'
            )
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
            'name' => 'Tên danh mục',
            'parent_id' => 'Danh mục cha',
            'position' => 'Vị trí',
            'active' => 'Hiển thị'
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
        $criteria->compare('parent_id', $this->parent_id);
        $criteria->compare('position', $this->position, true);
        $criteria->compare('active', $this->active);
        
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'parent_id ASC, position ASC, name ASC'
            )
        ));
    }
    
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Category the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    
    /**
     * Get all category
     */
    public function getAll()
    {
        $return = array();
        $object = $this->findAll();
        if (count($object)>0) {
            foreach ($object as $item) {
                $return[$item['id']] = $item->attributes;
            }
        }
        return $return;
    }
    /**
     * Lay danh sach cat dang cay. Su dung de quy
     */
    public function getTree($all_cate, $parent_id = 0, $trees = array(0 => 'Không chọn'), $delimiter = '')
    {
        if (!$trees) {
            $trees = array();
        }
        foreach ($all_cate as $key => $value) {
            if ($value['parent_id'] == $parent_id) {
                $trees[$value['id']] = $delimiter . $value['name'];
                $trees               = $this->getTree($all_cate, $value['id'], $trees, $delimiter . '--');
            }
            
        }
        return $trees;
    }
    
    public function getLink($id, $title, $parent = null)
    {
        if ($parent != null)
            $prefix = CVietnameseTools::makeUrlFriendly($parent) . '/';
        else
            $prefix = '';
        return Yii::app()->request->baseUrl . '/chuyen-muc/' . $prefix . CVietnameseTools::makeUrlFriendly($title) . '-c' . $id;
    }
    
    
    public function getSub($parent_id){
        $cache = Yii::app()->cache->get('sub_cat_id_'.$parent_id);
        if($cache !== false){
            return $cache;
        }else{
            $criteria = new CDbCriteria;
            $criteria->addCondition('parent_id ='. $parent_id);
            $criteria->addCondition('active=1');
            $criteria->order = 'position ASC';
            $data = Category::model()->findAll($criteria);
            Yii::app()->cache->set('sub_cat_id_'.$parent_id,$data,3600);
        }
        
        return $data;
        
    }
    
    //Tra ve danh sach tat ca cac cate co parent_id = 0
    public function getAllParent(){
        $categories = Yii::app()->cache->get('categories');
        if($categories === false){ 
            $criteria = new CDbCriteria();
            $criteria->order = 'position';
            $criteria->addCondition('parent_id = 0');
            $categories = Category::model()->findAll($criteria);
            Yii::app()->cache->set('categories',$categories,86400);
        }
        
        return $categories;
    }
    
    
    //Tra ve thong tin cua cate co su dung cache
    public function getInfoById($id){
        $data = Yii::app()->cache->get('info_cat_'.$id);
        if($data === false){
            $data = Category::model()->findByPk($id);
            Yii::app()->cache->set('info_cat_'.$id,$data,3600);
        }
        return $data;
    }
}
