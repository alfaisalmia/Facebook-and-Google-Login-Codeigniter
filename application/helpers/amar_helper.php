<?php

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function Paymentmethod($data){
   if($data == 1){
      return "<span class='label label-success'>Cash</span>";
   }
   else if($data == 2){
      return "<span class='label label-success'>Bank</span>";
   }
   else if($data == 3){
      return "<span class='label label-success'>BKash</span>";
   }
   else if($data == 4){
      return "<span class='label label-success'>Rocket</span>";
   }
   else if($data == 5){
      return "<span class='label label-success'>Referral</span>";
   }
}

function Activation($data){
   if($data == 1){
      return "<span class='label label-success'>Active</span>";
   }
   else if($data == 2){
      return "<span class='label label-danger'>Suspended</span>";
   }
   else{
      return "<span class='label label-warning'>Pending</span>";
   }
}

function Package($data, $allPackage) {
   if($data == 0){
      return "<span class='label label-danger'>Package not avaliable</span>";
   }
   else{
      foreach ($allPackage as $value){
         if($value->id == $data){
            return "<span class='label label-success'>" . $value->name . " Package</span";
         }
      }
   }
}

function RandStr($num) {
   $arr = array_merge(range("A", "Z"), range("a", "z"), range("0", "9"));
   $str = "";
   for ($i = 1; $i <= $num; $i++) {
      $str .= $arr[rand(0, count($arr) - 1)];
   }
   return $str;
}

function DateConverter($date) {
   $time = strtotime($date);
   return $myFormatForView = date("M d, Y", $time);
}

function Picture_Extension($data) {
   if ($data['name'] != "") {
      $ext = pathinfo($data['name']);
      $ext = strtolower($ext['extension']);
      if ($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "gif") {
         return "";
      }
      return $ext;
   }
   return "";
}

function ReplaceTitle($data) {
   $data = trim($data);
   $data = str_replace("'", "", $data);
   $data = str_replace("!", "", $data);
   $data = str_replace("@", "", $data);
   $data = str_replace("#", "", $data);
   $data = str_replace("$", "", $data);
   $data = str_replace("%", "", $data);
   $data = str_replace("^", "", $data);
   $data = str_replace("&", "", $data);
   $data = str_replace("*", "", $data);
   $data = str_replace("(", "", $data);
   $data = str_replace(")", "", $data);
   $data = str_replace("+", "", $data);
   $data = str_replace("=", "", $data);
   $data = str_replace(",", "", $data);
   $data = str_replace(":", "", $data);
   $data = str_replace(";", "", $data);
   $data = str_replace("|", "", $data);
   $data = str_replace("'", "", $data);
   $data = str_replace('"', "", $data);
   $data = str_replace("?", "", $data);
   $data = str_replace("'", "", $data);
   $data = str_replace(".", "-", $data);
   $data = str_replace("  ", "-", $data);
   $data = str_replace(" ", "-", $data);
   $data = str_replace("__", "-", $data);
   $data = str_replace("_", "-", $data);
   $data = str_replace("--", "-", $data);
   $data = str_replace("অ", "", $data);
   return $data;
}

function Replace($data) {
   $data = trim($data);
   $data = str_replace("'", "", $data);
   $data = str_replace("!", "", $data);
   $data = str_replace("@", "", $data);
   $data = str_replace("#", "", $data);
   $data = str_replace("$", "", $data);
   $data = str_replace("%", "", $data);
   $data = str_replace("^", "", $data);
   $data = str_replace("&", "", $data);
   $data = str_replace("*", "", $data);
   $data = str_replace("(", "", $data);
   $data = str_replace(")", "", $data);
   $data = str_replace("+", "", $data);
   $data = str_replace("=", "", $data);
   $data = str_replace(",", "", $data);
   $data = str_replace(":", "", $data);
   $data = str_replace(";", "", $data);
   $data = str_replace("|", "", $data);
   $data = str_replace("'", "", $data);
   $data = str_replace('"', "", $data);
   $data = str_replace("?", "", $data);
   $data = str_replace("'", "", $data);
   $data = str_replace(".", "-", $data);
   $data = str_replace("  ", "-", $data);
   $data = str_replace(" ", "-", $data);
   $data = str_replace("__", "-", $data);
   $data = str_replace("_", "-", $data);
   $data = strtolower(str_replace("--", "-", $data));
   return $data;
}

function filter($data) {
   return xss_clean(trim(strip_tags($data)));
}

function My_WordCount($file, $count) {
   $t = $data = strip_tags($file);
   $str = "";
   for ($i = 0; $i < strlen($data); $i++) {
      if (substr($t, 0, 1) == " ") {
         $str .= " ";
         $t = substr($t, 1);
         $count--;
         if ($count == 0) {
            break;
         }
      } else {
         $str .= substr($t, 0, 1);
         $t = substr($t, 1);
      }
   }
   return $str;
}

function My_date($data) {
   $data = date_format(date_create($data), "d M Y");
   $engDATE = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Saturday',
       'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
   $bangDATE = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', 'জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর',
       'নভেম্বর', 'ডিসেম্বর', 'শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার');
   return str_replace($engDATE, $bangDATE, $data);
}

function My_day($data) {
   $engDATE = array('Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
   $bangDATE = array('শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার');
   return str_replace($engDATE, $bangDATE, $data);
}

function My_Bangla_Num($data) {
   $engDATE = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
   $bangDATE = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
   return str_replace($engDATE, $bangDATE, $data);
}

?>
