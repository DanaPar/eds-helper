<?php

namespace Currency;

class AccessBankLV
{
    private string $date;


    public function __construct(string $date){
        $this->date = $date;
    }
//gets date input and returns link for xml file from bank.lv
    public function link(): string{
        return "https://www.bank.lv/vk/ecb.xml?date=$this->date";
    }


}