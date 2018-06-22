<?php

namespace Structural\Adapter\Payment;

class WorldPay
{
    /**
     * @var array
     */
    private $invoiceItems;

    public function __construct()
    {
    }

    public function transferMoney($amount): void
    {
        $payment = [
            PaymentInterface::FIELD_AMOUNT => $amount,
            PaymentInterface::FIELD_PAYMENT_DATE => new \DateTime(),
        ];
        array_push($this->invoiceItems, $payment);
    }

    public function getHistory()
    {
        return $this->invoiceItems;
    }
}
