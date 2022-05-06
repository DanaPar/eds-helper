<?php
require ("vendor/autoload.php");

use Currency\DividendRepository;
use Currency\Rate;


$date1 = $_POST["date1"];
$date2 =$_POST["date2"];

//outputs result from database
    $db = new DividendRepository();
    $data = $db->getDividends($date1, $date2);
    $rows = count($data);
    echo "There is " . $rows. " rows";
    echo "</br>";

    foreach ($data as $dividend){
        echo $dividend->getTicker() . " " . $dividend->getDate() . " " . $dividend->getDividend() . " " . $dividend->getCurrency();
        $rate = new Rate(date("Ymd", strtotime($dividend->getDate())), $dividend->getCurrency());
        echo " ". $rate->getRate();
        echo "<br>";
    }










