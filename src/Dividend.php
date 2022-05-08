<?php

namespace Currency;

class Dividend
{
    private string $ticker;
    private string $date;
    private float $dividend;
    private string $tax;
    private float $received;
    private string $currency;
    private float $rate;

    public function __construct(string $ticker, string $date, float $dividend, string $tax, float $received, string $currency)
    {
        $this->ticker = $ticker;
        $this->date = $date;
        $this->dividend = $dividend;
        $this->tax = $tax;
        $this->received = $received;
        $this->currency = $currency;
    }


    public function setRate(float $rate): void
    {
        $this->rate = $rate;
    }

    public function getRate(): float
    {
        return $this->rate;
    }

    public function setTicker(string $ticker): void
    {
        $this->ticker = $ticker;
    }

    public function setCurrency(string $currency): void
    {
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