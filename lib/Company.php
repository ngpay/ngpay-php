<?php
namespace ngpay;

class Company extends NgPayObject
{
    /** @var string $identifier */
    public $identifier;

    /** @var string $name */
    public $name;

    /** @var string $callback_url */
    public $callback_url;

    /** @var string $balance */
    public $balance;

    /** @var string $pending_balance */
    public $pending_balance;

    /** @var string $total_balance */
    public $total_balance;

    /** @var string $api_secret */
    public $api_secret;

    /** @var string $base_currency */
    public $base_currency;

    public static function get()
    {
        $response = NgPay::get("company");
        $mapper = new JsonMapper();
        $company = new self();
        $mapper->map($response["company"], $company);
        return $company;
    }
}