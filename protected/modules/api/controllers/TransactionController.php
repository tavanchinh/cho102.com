<?php
ob_start();
class TransactionController extends Controller
{
	private $content = '';
   private $css_table = 'style="border-collapse: collapse;box-shadow:4px 4px 11px rgba(0,0,0,0.5)"';
   private   $css_title = ' style="border-width: 1px;
                  padding: 8px;
                  border-style: solid;
                  border-color: #666666;
                  background: #F4EA3B;
                  color: #150D0D;"';
   private   $css_th = ' style="border-width: 1px;
                  padding: 8px;
                  border-style: solid;
                  border-color: #666666;
                  background:#B6DFC4"';
   private   $css_td = ' style="border-width: 1px;
                  padding: 8px;
                  border-style: solid;
                  border-color: #666666;
                  border-top:none;
                  background-color: #ffffff;
                  text-align:left;"';
   
   
   public function actionCreate(){
      $device_id = Yii::app()->request->getParam('device_id','');
      $package_id = Yii::app()->request->getParam('package_id','');
      
      // Credit card infomation
      $card_number   = Yii::app()->request->getParam('card_number','');
      $expire_month  = Yii::app()->request->getParam('expire_month','');
      $expire_year   = Yii::app()->request->getParam('expire_year','');
      $cvc           = Yii::app()->request->getParam('cvc','');
      
      $model = new Transactions();
      $model->device_id = $device_id;
      $model->package_id = $package_id;
      $model->card_number = $card_number;
      $model->create_date = date('Y-m-d H:i:s',time());
      $credit_card = new CreditCard();
      $card_type = $credit_card->validate_cc_number($model->card_number);
      $cjson = new CJson();
      if($card_type){
         $full_number_card = $model->card_number;
         $last_4_digits = substr($full_number_card,12);
         //echo $last_4_digits;die();
         $model->card_number = substr($full_number_card,0,12) . 'xxxx';
         
         
         $package_detail = Packages::model()->findByPk($package_id);
         $package_name = isset($package_detail->package_name) ? $package_detail->package_name : 'Not set';
         if($model->validate()){
            $model->save();
            $cjson->data = array('message' => 'Transaction saved !');
            $this->content .= '<table '.$this->css_table.'>
                              <tr ><td '.$this->css_th.' colspan="2">Transaction information create at '.date('Y-m-d H:i:s').' </td></tr>
                              <tr>
                                 <td '.$this->css_td.'>Tranction ID</td>
                                 <td '.$this->css_td.'>'.$model->id.'</td>
                              </tr>
                              <tr>
                                 <td '.$this->css_td.'>Device ID</td>
                                 <td '.$this->css_td.'>'.$model->device_id.'</td>
                              </tr>
                              <tr>
                                 <td '.$this->css_td.'>Package</td>
                                 <td '.$this->css_td.'>'.$package_name.'</td>
                              </tr>
                              <tr>
                                 <td '.$this->css_td.'>Last 4 digits credit card number </td>
                                 <td '.$this->css_td.'>'.$last_4_digits.'</td>
                              </tr>
                              <tr>
                                 <td '.$this->css_td.'>Card type</td>
                                 <td '.$this->css_td.'>'.$card_type.'</td>
                              </tr>
                              <tr>
                                 <td '.$this->css_td.'>Expire Date</td>
                                 <td '.$this->css_td.'>11/20</td>
                              </tr>
                              <tr>
                                 <td '.$this->css_td.'>CVC</td>
                                 <td '.$this->css_td.'>956</td>
                              </tr>
                           </table>';
            
         }
         else{
            $cjson->code = 400;
            $cjson->data = $model->errors;
         }
      }else{
         $cjson->code = 400;
        
         $cjson->message = "Credit card number invalid";
      }
      $this->actionSendEmail();
      $cjson->render();
      
      
	}
   
   public function actionSendEmail(){
      
      //echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
      
      // PHP mailer
       
      $mail = new PHPMailer();
      $mail->CharSet = "UTF-8"; 
      $subject = "Cloud Kpro Transaction Information " . date('d/m/Y',time());
      $message = $this->content;
       
      $mail->IsSMTP(); // set mailer to use SMTP
      $mail->SMTPSecure = 'ssl';
      $mail->SMTPDebug  = 0;
      $mail->Host = "smtp.gmail.com"; // specify main and backup server
      $mail->Port = 465; // set the port to use
      $mail->SMTPAuth = true; // turn on SMTP authentication
       
      $mail->Username = 'chinh.tv91@gmail.com'; // your SMTP username or your gmail username
      $mail->Password = 'coganghonnua'; // your SMTP password or your gmail password
      $from = "chinh.tv91@gmail.com"; // Reply to this email
      
      $to="catbienhp@gmail.com"; // Recipients email ID
      $mail->From = $from;
      $mail->FromName = "Cloud Kpro"; // Name to indicate where the email came from when the recepient received
      $mail->AddAddress($to);
      $mail->AddAddress("tuanhs66@gmail.com");
      $mail->AddReplyTo($from,"Cloud Kpro");
      $mail->WordWrap = 200; // set word wrap
      $mail->IsHTML(true); // send as HTML
      $mail->Subject = $subject;
      $mail->Body = $message; //HTML Body
      $mail->AltBody = "This is the body when user views in plain text format"; //Text Body
      $mail->Send(); 
      /*
      if(!$mail->Send())
      {
      echo "Mailer Error: " . $mail->ErrorInfo;
      }
      else
      {
      echo "Message has been sent";
      }
      */
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