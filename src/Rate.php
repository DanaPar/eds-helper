<?php

namespace Currency;


class Rate
{
    private string $currency;
    private Xml $xml;
    private string $date;
    private float $rate;


    public function __construct(string $date, string $currency)
    {
        $this->date = $date;
        $this->xml = new Xml($this->date);
        $this->currency = $currency;

    }


    public function getRate(): float
    {
        if ($this->currency === "EUR"){
            $this->rate = 1.00;
        } else {
            foreach ($this->xml->getXml()->Currencies->Currency as $currency) {
                if ($currency->ID == $this->currency) {
                    $this->rate = (float)$currency->Rate;
                }

            }
        }
        return $this->rate;
    }
}