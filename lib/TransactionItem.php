<?php
namespace ngpay;

class TransactionItem extends NgPayObject
{
    /** @var string $description */
    public $description;

    /** @var float $cost */
    public $cost;

    /** @var int $quantity */
    public $quantity;

    /**
     * TransactionItem constructor.
     * @param string $description
     * @param int $quantity
     * @param float $cost
     */
    public function __construct($description, $cost, $quantity = 1)
    {
        $this->description = $description;
        $this->cost = $cost;
        $this->quantity = $quantity;
    }


}