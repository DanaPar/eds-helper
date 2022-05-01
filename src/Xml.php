<?php

namespace Currency;


class Xml
{
 private string $date;
 private accessBankLV $url;

 public function __construct($date){
     $this->date = $date;
     $this->url = new accessBankLV($this->date);
 }

 public function getXml(){
     return simplexml_load_file($this->url->link());
 }

}