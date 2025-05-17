<?php

// Пример использования и обработка исключений
try {
    echo "Тест 1: Создание счета с начальным балансом 500\n";
    $account = new BankAccount(500.0);
    echo "Баланс: " . $account->getBalance() . "\n";

    echo "\nТест 2: Пополнение на 200\n";
    $account->deposit(200);
    echo "Баланс: " . $account->getBalance() . "\n";

    echo "\nТест 3: Снятие 100\n";
    $account->withdraw(100);
    echo "Баланс: " . $account->getBalance() . "\n";

    echo "\nТест 4: Снятие 600 (ожидается InsufficientFundsException)\n";
    $account->withdraw(600);
} catch (InsufficientFundsException $e) {
    echo "Ошибка: " . $e->getMessage() . "\n";
} catch (InvalidAmountException $e) {
    echo "Ошибка: " . $e->getMessage() . "\n";

}

echo "\nТест 5: Счет с отрицательным начальным балансом (ожидается InvalidAmountException)\n";
try {
    $badAccount = new BankAccount(-100);
} catch (InvalidAmountException $e) {
    echo "Ошибка: " . $e->getMessage() . "\n";
}

echo "\nТест 6: Попытка внести ноль (ожидается InvalidAmountException)\n";
try {
    $account->deposit(0);
} catch (InvalidAmountException $e) {
    echo "Ошибка: " . $e->getMessage() . "\n";
}

echo "\nТест 7: Попытка снять отрицательную сумму (ожидается InvalidAmountException)\n";
try {
    $account->withdraw(-50);
} catch (InvalidAmountException $e) {
    echo "Ошибка: " . $e->getMessage() . "\n";
}
