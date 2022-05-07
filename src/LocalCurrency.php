<?php

namespace Currency;

class LocalCurrency
{

    public static function toLocal($dividend, $rate): float{
        return number_format($dividend/$rate, 2);
    }
}