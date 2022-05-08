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

$validator = new DividendValidator();
$validator->validate($entry);
echo $entry->getTicker();
echo "<br>";
echo $entry->getDate();
echo "<br>";
echo $entry->getDividend();
echo "<br>";
echo $entry->getTax();
echo "<br>";
echo $entry->getReceived();
echo "<br>";
echo $entry->getCurrency();
echo "<br>";
echo "<br>";

