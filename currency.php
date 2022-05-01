<?php
require ("vendor/autoload.php");

use Currency\Rate;



$date = "20220422";
$currency = "USD";




$rate = new Rate($date, $currency);
echo $rate->getRate();





