<?php

namespace Structural\Adapter\Payment;

class PayPalAdapter implements PaymentInterface
{
    /**
     * @var Paypal
     */
    private $payPalPayment;

    public function __construct(Paypal $paypal)
    {
        $this->payPalPayment = $paypal;
    }

    public function pay(float $value): void
    {
        $this->payPalPayment->createPayment($value);
    }

    public function getTransactions(): array
    {
        return $this->payPalPayment->getHistory();
    }
}
