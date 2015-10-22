<?php

/**
 * @author Ta Van Chinh
 * @copyright 2015
 */

class Maps{
   
   /**
    * Tinh khoang cach giua 2 toa do
    * @param int $lat1,$lon1,$lat2,$lon2
    * @return int Km
   */
   public static function getDistanceFromLatLonInKm($lat1,$lon1,$lat2,$lon2){
      $R = 6371;
      $dLat = deg2rad($lat2-$lat1);  // deg2rad below
      $dLon = deg2rad($lon2-$lon1); 
      $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon/2) * sin($dLon/2);
      $c = 2 * atan2(sqrt($a),sqrt(1-$a));
      $d = $R * $c;
      return $d;
   }
   
   /**
    * Lay toa do lat lng dua vao dia chi
    * @param string address 
   */
   public static function getLatLngFromAddress($address){
      $data = array('lat' => 0,'lng' => 0);
      $url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($address); 
      $respone = json_decode(self::file_get_contents_curl($url));
      if($respone != null){
         
         if($respone->status == 'OK'){
            $results = $respone->results;
            //CVarDumper::dump($results,10,true);
            $data['lat'] = isset($results[0]->geometry->location->lat) ? $results[0]->geometry->location->lat : 0;
            $data['lng'] = isset($results[0]->geometry->location->lng) ? $results[0]->geometry->location->lng : 0;
         }
      }
      return $data;
   }
   
   /**
    * Get address by Lat Lng
    * @param int $lat
    * @param int $lng
   */
   public static function getAddressFromLatLng($lat,$lng){
      $formatted_address  = '';
      $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.$lat.','.$lng.'&sensor=false';
      $data = self::getContentByUrl($url);
      $status = $data->status;
      if($status == 'OK'){
         $result = isset($data->results[0]) ? $data->results[0] : null;
         if(!is_null($result)){
            $formatted_address = isset($result->formatted_address) ? $result->formatted_address : '';
         }
         
      }
      return $formatted_address;
   }
   
   private static function getContentByUrl($url){
      $curl = curl_init();
      curl_setopt($curl,CURLOPT_URL,$url);
      curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
      curl_setopt($curl,CURLOPT_HEADER,false);
      $data = json_decode(curl_exec($curl),false);
      curl_close($curl);
      return $data;
   }
   
   private static function file_get_contents_curl($url) {
       $ch = curl_init();
   
       curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
       curl_setopt($ch, CURLOPT_HEADER, 0);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       
   
       $data = curl_exec($ch);
       curl_close($ch);
   
       return $data;
   }
   
}

?>