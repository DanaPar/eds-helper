<?php

namespace Currency;

class DividendValidator
{
    private function validateFields(string $data): void{
        if(empty($data)){
            die("$data empty field");
        }
    }

    //checks if ticker and currency is upper case, if not, then change it to uppercase
    private function upperCase(string $data): string{
        return strtoupper($data);
    }
    //checks if date is past or today, if not then user must change  date

    //tax can't be bigger than dividend
    public function checkTax(Dividend $dividend){
        if($dividend->getTax() >= $dividend->getDividend()){
            die("Check again. Looks like you entered incorrect withholding tax");
        }
    }
    //dividend-tax=received
    public function checkReceived(Dividend $dividend){
        if($dividend->getDividend() - $dividend->getTax() != $dividend->getReceived()){
            die("Check again. Looks like you entered incorrect dividend, tax or received amount values");
        }
    }
}