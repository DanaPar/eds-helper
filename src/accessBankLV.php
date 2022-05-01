<?php

namespace Currency;

class accessBankLV
{
    private string $date;


    public function __construct($date){
        $this->date = $date;
    }

    public function link(): string{
        return "https://www.bank.lv/vk/ecb.xml?date=$this->date";
    }


}