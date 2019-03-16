<?php
namespace ngpay;

class TransactionPayment extends NgPayObject
{
    /** @var string $transaction */
    public $transaction;

    /** @var string $operator */
    public $operator;

    /** @var string $operator_ref */
    public $operator_ref;

    /** @var string $method */
    public $method;

    /** @var string $currency */
    public $currency;

    /** @var float $amount */
    public $amount;

    /** @var string $timestamp */
    public $timestamp;

    /** @var float $operator_fee */
    public $operator_fee;

    /** @var float $operator_tax */
    public $operator_tax;

    /** @var float $ng_fee */
    public $ng_fee;

    /** @var string $bill_descriptor */
    public $bill_descriptor;


}