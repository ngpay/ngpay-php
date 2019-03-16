<?php
namespace ngpay;

class TransactionReturn extends NgPayObject
{
    /** @var string $transaction */
    public $transaction;

    /** @var string $operator */
    public $operator;

    /** @var string $operator_ref */
    public $operator_ref;

    /** @var string $currency */
    public $currency;

    /** @var float $amount */
    public $amount;

    /** @var string $timestamp */
    public $timestamp;

    /** @var string $method */
    public $method;

    /** @var bool $is_chargeback */
    public $is_chargeback;

}