<?php

use ngpay\NgPay;

require __DIR__ . '/../vendor/autoload.php';


$apiKey = "b72bcbea-15b5-48cc-8c9b-8fa82ba31a61";
NgPay::setApiKey($apiKey);


$custom = "test_transaction_" . time();

$items = [];
$items[] = new \ngpay\TransactionItem("Test product", 1.99, 1);

$transaction = new \ngpay\Transaction("USD", $items, $custom);

$transaction->create();
var_dump($transaction);
