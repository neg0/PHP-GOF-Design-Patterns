<?php

namespace Structural\Adapter\Payment;

interface PaymentInterface
{
    public const FIELD_AMOUNT = 'amount';
    public const FIELD_PAYMENT_DATE = 'date';

    public function pay(float $value): void;
    public function getTransactions(): array;
}
