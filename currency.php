<?php
require ("vendor/autoload.php");

use Currency\Dividend;
use Currency\DividendRepository;
use Currency\LocalCurrency;
use Currency\Rate;
use Currency\DividendService;


$date1 = $_POST["date1"];
$date2 =$_POST["date2"];

echo "Dividends received between $date1 and $date2:" . "<br>";

//outputs result from database
    $db = new DividendRepository();
    $data = $db->getDividends($date1, $date2);
    $rows = count($data);
    echo "There is " . $rows. " rows";
    echo "<br>";


$service = new DividendService();
$service->returnDividend($date1, $date2);

foreach ($service->returnDividend($date1, $date2) as $rate){
   echo $rate->getTicker() . " ";
   echo $rate->getDate() . " ";
   echo $rate->getReceived() . " ";
   echo $rate->getRate() . " ";
   echo LocalCurrency::toLocal($rate->getReceived(), $rate->getRate());

   echo "<br>";
}
















