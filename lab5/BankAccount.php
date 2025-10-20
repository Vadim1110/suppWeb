<?php
require_once 'AccountInterface.php';

class BankAccount implements AccountInterface
{
    const MIN_BALANCE = 0;

    protected float $balance;
    protected string $currency;

    public function __construct(float $balance, string $currency = "USD")
    {
        if ($balance < self::MIN_BALANCE) {
            throw new Exception("Balance cannot be less than the minimum allowed value");
        }
        $this->balance = $balance;
        $this->currency = $currency;
    }

    public function deposit(float $amount)
    {
        if ($amount <= 0) {
            throw new Exception("Deposit amount must be greater than 0");
        }
        $this->balance += $amount;
    }

    public function withdraw(float $amount)
    {
        if ($amount <= 0) {
            throw new Exception("Withdrawal amount must be greater than 0");
        }

        if ($amount > $this->balance) {
            throw new Exception("Insufficient funds");
        }

        $this->balance -= $amount;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function __toString(): string
    {
        return "Balance: {$this->balance} {$this->currency}";
    }
}
