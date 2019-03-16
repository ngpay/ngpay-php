<?php
namespace ngpay;

class Transaction extends NgPayObject
{
    /** @var string $reference */
    public $reference;

    /** @var string $timestamp */
    public $timestamp;

    /** @var string $currency */
    public $currency;

    /** @var float $total */
    public $total;

    /** @var string $state */
    public $state;

    /** @var string $custom */
    public $custom;

    /** @var TransactionPayment[] */
    public $payments;

    /** @var TransactionReturn[] */
    public $returns;

    /** @var TransactionItem[] */
    public $items;

    /** @var string $customer_name */
    public $customer_name;

    /** @var string $customer_email */
    public $customer_email;

    /**
     * Transaction constructor.
     * @param string $currency
     * @param TransactionItem[] $items
     * @param string $custom
     * @param string $customer_name
     * @param string $customer_email
     */
    public function __construct($currency = null, array $items = [], $custom = null, $customer_name = null, $customer_email = null)
    {
        $this->currency = $currency;
        $this->items = $items;
        $this->custom = $custom;
        $this->customer_name = $customer_name;
        $this->customer_email = $customer_email;
    }

    public static function get($transactionReference)
    {
        $response = NgPay::get("transactions/{$transactionReference}");
        $mapper = new JsonMapper();
        $transaction = new self();
        $mapper->map($response["transaction"], $transaction);
        return $transaction;
    }

    /**
     * @return $this
     * @throws \ReflectionException
     */
    public function create() {
        $response = NgPay::post("transactions/new", $this);
        $mapper = new JsonMapper();
        $mapper->map($response["transaction"], $this);
        return $this;
    }

    /**
     * Cancels and refunds a transaction
     * @return $this
     * @throws \ReflectionException
     */
    public function cancel() {
        $response = NgPay::post("transactions/{$this->reference}", ["confirm" => true]);
        $mapper = new JsonMapper();
        $mapper->map($response["transaction"], $this);
        return $this;
    }

}