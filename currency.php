<?php
require ("vendor/autoload.php");

use Currency\DividendRepository;
use Currency\Rate;



$date = "20220422";
$currency = "USD";
$date1 = $_POST["date1"];
$date2 =$_POST["date2"];

//checks what dates was choosen
echo "Date 1 is: " . $date1;
echo "</br>";
echo "Date 2 is: " . $date2;
echo "</br>";

//outputs result from database
    $db = new DividendRepository();
    print_r($db->getDividends($date1, $date2));


/*
$rate = new Rate($date, $currency);
echo $rate->getRate();
*/





