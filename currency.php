<?php
require ("vendor/autoload.php");
use Currency\accessBankLV;


$access = new accessBankLV("20220429");
echo $access->link();

