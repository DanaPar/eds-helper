<?php
require ("vendor/autoload.php");

use Currency\Dividend;
use Currency\DividendValidator;

$ticker = $_POST["ticker"];
$date = $_POST["date"];
$dividend = $_POST["dividend"];
$tax = $_POST["tax"];
$received = $_POST["received"];
$currency = $_POST["currency"];

$entry = new Dividend($ticker, $date, $dividend, $tax, $received, $currency);



