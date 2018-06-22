<?php

namespace Structural\Adapter\Payment;

class SkrillAdapter implements PaymentInterface
{
    /**
     * @var Skrill
     */
    private $skrillPayment;

    public function __construct(Skrill $skrill)
    {
        $this->skrillPayment = $skrill;
    }

    public function pay(float $value): void
    {
        $this->skrillPayment->makePayment($value);
    }

    public function getTransactions(): array
    {
        return $this->skrillPayment->getInvoices();
    }
}
