<?php
require ("vendor/autoload.php");
use Currency\Xml;


$date = "20220422";
$currency = "USD";
$xml = new Xml($date);

//test if xml loads and gets data
if(!$xml->getXml()){
    echo "fail to load data";
}
else {
    foreach($xml->getXml()->Currencies->Currency as $rate){
        echo $rate->ID . "</br>";
        echo $rate->Rate . "</br>";
    }
}




