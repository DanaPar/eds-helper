<?php

namespace Currency;

class dividend
{
    private string $ticker;
    private string $date;
    private float $dividend;
    private string $tax;
    private float $received;
    private string $currency;

    public function __construct( $ticker, $date, $dividend, $tax, $received, $currency)
    {
        $this->ticker = $ticker;
        $this->date = $date;
        $this->dividend = $dividend;
        $this->tax = $tax;
        $this->received = $received;
        $this->currency = $currency;
    }


    public function getTicker(): string
    {
        return $this->ticker;
    }

    public function getDate(): string{
        return $this->date;
    }

    public function getDividend(): float
    {
        return $this->dividend;
    }

    public function getTax(): string
    {
        return $this->tax;
    }

    public function getReceived(): float
    {
        return $this->received;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }


}