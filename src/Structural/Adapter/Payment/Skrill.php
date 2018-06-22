<?php

namespace Structural\Adapter\Payment;

class Skrill
{
    public const FIELD_AMOUNT = 'amount_paid';
    public const FIELD_PAYMENT_DATE = 'issue_date';

    /**
     * @var array
     */
    private $invoices = [];

    public function __construct()
    {
    }

    public function makePayment(float $amount): void
    {
        $payment = [
            self::FIELD_AMOUNT => $amount,
            self::FIELD_PAYMENT_DATE => new \DateTime()
        ];

        array_push($this->invoices, $payment);
    }

    public function getInvoices(): array
    {
        return $this->invoices;
    }
}