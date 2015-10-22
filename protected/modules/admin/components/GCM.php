<?php
 
class GCM {
 
   //put your code here
   // constructor
   private $google_api_key;
   
   public $debug = false;
   function __construct() {
      $this->google_api_key = 'AIzaSyDCw0Z_YtKdcCjsAO_L8DkkvFDV4GVonrI';
   }
   
   /**
   * Sending Push Notification
   */
   public function send_notification($device_token, $message) {
      // include config
      
      // Set POST variables
      $url = 'https://android.googleapis.com/gcm/send';
      
      $fields = array(
      'registration_ids' => array($device_token),
      'data' => array("alert" => $message),
      );
      
      $headers = array(
      'Authorization: key=' . $this->google_api_key,
      'Content-Type: application/json'
      );
      // Open connection
      $ch = curl_init();
      
      // Set the url, number of POST vars, POST data
      curl_setopt($ch, CURLOPT_URL, $url);
      
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      
      // Disabling SSL Certificate support temporarly
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
      
      // Execute post
      $result = curl_exec($ch);
      if ($result === FALSE) {
         die('Curl failed: ' . curl_error($ch));
      }
      
      // Close connection
      curl_close($ch);
      if($this->debug){
         echo '<pre>';
         print_r(json_decode($result));
      }
   
   }
 
}
 
?>