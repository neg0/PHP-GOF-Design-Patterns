<?php

namespace Structural\Adapter\Payment;

class SkrillAdapter implements PaymentInterface
{
    /**
     * @var Skrill
     */
    private $skrill;

    public function __construct(Skrill $skrill)
    {
        $this->skrill = $skrill;
    }

    public function pay(float $value): void
    {
        $this->skrill->makePayment($value);
    }

    public function getTransactions(): array
    {
        return $this->skrill->getInvoices();
    }
}
