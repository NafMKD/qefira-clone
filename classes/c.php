<?php 
include 'db.class.php';

include 'fetch.class.php';
include 'register.class.php';
include 'login.class.php';



$obk_fe = new fetch;
$obk_re = new register;
$obk_lo = new login;



//$msg=$obk_re->registerItemDetail(12000, "most this", 0, "Arada", "Addis Ababa");

//echo $msg;

 $date = "06/13/2019 5:35 PM";  
    //converts date and time to seconds  
    $sec = strtotime($date);  
    //converts seconds into a specific format  
    $newdate = date ("d M,Y", $sec);  
    //Appends seconds with the time  
   //	 $newdate = $newdate . ":00";  
    // display converted date and time  
    echo "New date time format is: ".$newdate;  