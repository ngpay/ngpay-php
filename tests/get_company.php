<?php

use ngpay\NgPay;

require __DIR__ . '/../vendor/autoload.php';


$apiKey = "b72bcbea-15b5-48cc-8c9b-8fa82ba31a61";
NgPay::setApiKey($apiKey);


$company = \ngpay\Company::get();

var_dump($company);

