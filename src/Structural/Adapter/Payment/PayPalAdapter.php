<?php

namespace Structural\Adapter\Payment;

class PayPalAdapter implements PaymentInterface
{
    /**
     * @var PayPal
     */
    private $payPal;

    public function __construct(PayPal $payPal)
    {
        $this->payPal = $payPal;
    }

    public function pay(float $value): void
    {
        $this->payPal->createPayment($value);
    }

    public function getTransactions(): array
    {
        return $this->payPal->getHistory();
    }
}
