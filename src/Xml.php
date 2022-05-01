<?php

namespace Currency;

use SimpleXMLElement;

class Xml
{
 private string $date;
 private accessBankLV $url;

 public function __construct(string $date){
     $this->date = $date;
     $this->url = new accessBankLV($this->date);
 }

 public function getXml(): SimpleXMLElement {
     return simplexml_load_file($this->url->link());
 }

}