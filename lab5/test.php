<?php
require_once 'BankAccount.php';
require_once 'SavingsAccount.php';

echo "=== TESTING BANK ACCOUNTS ===\n";

try {
    $account1 = new BankAccount(1000, "USD");
    echo "Account created: {$account1}\n";

    $account1->deposit(500);
    echo "After deposit: {$account1}\n";

    $account1->withdraw(300);
    echo "After withdrawal: {$account1}\n";

    echo "Trying to withdraw 2000...\n";
    $account1->withdraw(2000);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n=== TESTING SAVINGS ACCOUNT ===\n";

try {
    $savings = new SavingsAccount(2000, "EUR");
    echo "Savings account created: {$savings}\n";

    $savings->deposit(1000);
    echo "After deposit: {$savings}\n";

    $savings->applyInterest();
    echo "After applying interest (" . (SavingsAccount::$interestRate * 100) . "%): {$savings}\n";

    echo "Trying to deposit -500...\n";
    $savings->deposit(-500);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n=== END OF TEST ===\n";
