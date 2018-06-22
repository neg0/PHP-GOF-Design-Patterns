<?php

namespace Structural\Adapter\Payment;

class WorldPayAdapter implements PaymentInterface
{
    /**
     * @var WorldPay
     */
    private $worldPay;

    public function __construct(WorldPay $worldPay)
    {
        $this->worldPay = $worldPay;
    }

    public function pay(float $value): void
    {
        $this->worldPay->transferMoney($value);
    }

    public function getTransactions(): array
    {
        $this->worldPay->getHistory();
    }
}
