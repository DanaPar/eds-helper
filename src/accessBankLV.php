<?php

namespace Currency;

class accessBankLV
{
    private string $date;


    public function __construct($date){
        $this->date = $date;
    }
//gets date input and returns link for xml file from bank.lv
    public function link(): string{
        return "https://www.bank.lv/vk/ecb.xml?date=$this->date";
    }


}