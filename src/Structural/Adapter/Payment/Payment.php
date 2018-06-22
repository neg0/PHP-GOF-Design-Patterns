<?php

namespace Structural\Adapter\Payment;

class Payment implements PaymentInterface
{
    /**
     * @var array
     */
    private $transactions = [];

    public function __construct()
    {
    }

    public function pay(float $value): void
    {
        $payment = [
            PaymentInterface::FIELD_AMOUNT => $value,
            PaymentInterface::FIELD_PAYMENT_DATE => new \DateTime(),
        ];
        array_push($this->transactions, $payment);
    }

    public function getTransactions(): array
    {
        return $this->transactions;
    }
}
