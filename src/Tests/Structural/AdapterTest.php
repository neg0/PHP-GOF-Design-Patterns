<?php

namespace Tests\Structural;

use PHPUnit\Framework\TestCase;
use Structural\Adapter\Payment\Payment;
use Structural\Adapter\Payment\PaymentInterface;
use Structural\Adapter\Payment\Paypal;
use Structural\Adapter\Payment\PayPalAdapter;
use Structural\Adapter\Payment\Skrill;
use Structural\Adapter\Payment\SkrillAdapter;

class AdapterTest extends TestCase
{
    private const PAYMENT_AMOUNT = 10.5;

    /**
     * @var Payment
     */
    private $sut;

    /**
     * @var Paypal
     */
    private $payPalPayment;

    /**
     * @var Skrill
     */
    private $skrillPayment;

    public function setUp()
    {
        $this->sut = new Payment();
        $this->payPalPayment = new Paypal();
        $this->skrillPayment = new Skrill();
    }

    public function tearDown()
    {
        unset(
            $this->sut,
            $this->skrillPayment,
            $this->payPalPayment
        );
    }

    public function testShouldPayAndGetTransaction(): void
    {
        $this->sut->pay(self::PAYMENT_AMOUNT);

        foreach ($this->sut->getTransactions() as $transaction) {
            $this->assertInstanceOf(\DateTime::class, $transaction[PaymentInterface::FIELD_PAYMENT_DATE]);
            $this->assertTrue(is_numeric($transaction[PaymentInterface::FIELD_AMOUNT]));
        }
    }

    public function testShouldPayAndGetTransactionWithPayPal(): void
    {
        $paymentProvider = new PayPalAdapter($this->payPalPayment);
        $paymentProvider->pay(self::PAYMENT_AMOUNT);

        foreach ($paymentProvider->getTransactions() as $transaction) {
            $this->assertInstanceOf(\DateTime::class, $transaction[Paypal::FIELD_PAYMENT_DATE]);
            $this->assertTrue(is_numeric($transaction[Paypal::FIELD_AMOUNT]));
            $this->assertTrue(is_string($transaction[Paypal::FIELD_PAYMENT_ID]));
        }
    }

    public function testShouldPayAndGetTransactionWithSkrill(): void
    {
        $paymentProvider = new SkrillAdapter($this->skrillPayment);
        $paymentProvider->pay(self::PAYMENT_AMOUNT);

        foreach ($paymentProvider->getTransactions() as $transaction) {
            $this->assertInstanceOf(\DateTime::class, $transaction[Skrill::FIELD_PAYMENT_DATE]);
            $this->assertTrue(is_numeric($transaction[Skrill::FIELD_AMOUNT]));
        }
    }
}
