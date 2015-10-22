<?php

class DistrictController extends Controller
{
	public function actionloadDistrictByCity(){
      $city_id = Yii::app()->request->getParam('city_id',0);
      $list_district = Province::model()->findAllByAttributes(array('city_id' => $city_id),array('order' => 'name ASC'));
      if(count($list_district) > 0){
         foreach($list_district as $value){
            echo '<option value="'.$value->id.'">'.$value->name.'</option>';
         }
      }
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