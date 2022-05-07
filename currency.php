<?php
require ("vendor/autoload.php");

use Currency\Dividend;
use Currency\DividendRepository;
use Currency\LocalCurrency;
use Currency\Rate;


$date1 = $_POST["date1"];
$date2 =$_POST["date2"];

echo "Dividends received between $date1 and $date2:" . "<br>";

//outputs result from database
    $db = new DividendRepository();
    $data = $db->getDividends($date1, $date2);
    $rows = count($data);
    echo "There is " . $rows. " rows";
    echo "<br>";
/*
    foreach ($data as $dividend){
        echo $dividend->getTicker() . " " . $dividend->getDate() . " " . $dividend->getDividend() . " " . $dividend->getReceived() . " ". $dividend->getCurrency();
        $rate = new Rate(date("Ymd", strtotime($dividend->getDate())), $dividend->getCurrency());
        echo " ". $rate->getRate();
        echo " " . number_format($dividend->getReceived() / $rate->getRate(), 2) . "EUR";
        echo "<br>";
    }
*/

foreach ($data as $dividend){
    $rate = new Rate(date("Ymd", strtotime($dividend->getDate())), $dividend->getCurrency());
    $dividendRecord = new Dividend($dividend->getTicker(), $dividend->getDate(), $dividend->getDividend(), $dividend->getTax(), $dividend->getReceived(), $dividend->getCurrency());
    $dividendRecord->setRate($rate->getRate());
    echo $dividendRecord->getDate() . " " . $dividendRecord->getTicker() ." " . $dividendRecord->getRate() .  " ";
    echo LocalCurrency::toLocal($dividendRecord->getReceived(), $dividendRecord->getRate()) . "<br>";
}









