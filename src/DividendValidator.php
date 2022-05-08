<?php

namespace Currency;

class DividendValidator
{
    private function validateFields(string $data): void
    {
        if(empty($data)){
            die("$data empty field");
        }
    }

    //Changes data to uppercase
    private function upperCase(string $data): string
    {
        return strtoupper($data);
    }

    private function validateTicker(Dividend $dividend): void
    {
        $this->validateFields($dividend->getTicker());
        $dividend->setTicker($this->upperCase($dividend->getTicker()));
    }
//checks if date is past or today, if not then user must change  date
    private function validateDate(Dividend $dividend): void
    {
        $this->validateFields($dividend->getDate());
        if($dividend->getDate() > date("Y-m-d")){
            die("check date! Date can't be in future");
        }
    }

    private function validateDividend(Dividend $dividend): void
    {
        $this->validateFields($dividend->getDividend());
    }

    //tax can't be bigger than dividend
    private function validateTax(Dividend $dividend)
    {
        if($dividend->getTax() >= $dividend->getDividend()){
            die("Check again. Looks like you entered incorrect withholding tax");
        }
    }
//checks if true -> dividend-tax=received
    private function validateReceived(Dividend $dividend): void
    {
        $this->validateFields($dividend->getReceived());
        if(($dividend->getDividend() - $dividend->getTax()) != $dividend->getReceived()){
            die("Check again. Looks like you entered incorrect dividend, tax or received amount values");
        }
    }

    private function validateCurrency(Dividend $dividend): void
    {
        $this->validateFields($dividend->getCurrency());
        $dividend->setCurrency($this->upperCase($dividend->getCurrency()));
    }

    public function validate(Dividend $dividend)
    {
        $this->validateTicker($dividend);
        $this->validateDate($dividend);
        $this->validateDividend($dividend);
        $this->validateTax($dividend);
        $this->validateReceived($dividend);
        $this->validateCurrency($dividend);
    }

}