<?php

use ngpay\NgPay;

require __DIR__ . '/../vendor/autoload.php';


$apiKey = "b72bcbea-15b5-48cc-8c9b-8fa82ba31a61";
NgPay::setApiKey($apiKey);


$transactionReference = "TEST-2019-03-16-8331041";

$transaction = \ngpay\Transaction::get($transactionReference);

var_dump($transaction);
