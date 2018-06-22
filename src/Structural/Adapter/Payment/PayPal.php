<?php

namespace Structural\Adapter\Payment;

class PayPal
{
    public const FIELD_AMOUNT = 'money_value';
    public const FIELD_PAYMENT_DATE = 'payment_date';
    public const FIELD_PAYMENT_ID = 'payment_id';

    /**
     * @var array
     */
    private $history = [];

    public function __construct()
    {
    }

    public function createPayment(float $value): void
    {
        $payment = [
            self::FIELD_AMOUNT => $value,
            self::FIELD_PAYMENT_DATE => new \DateTime(),
            self::FIELD_PAYMENT_ID => md5($value . time()),

        ];
        array_push($this->history, $payment);
    }

    public function getHistory(): array
    {
        return $this->history;
    }
}
