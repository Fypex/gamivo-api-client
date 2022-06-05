<?php


namespace Fypex\GamivoClient\Models;


class CreateOrderModel
{

    private $offer_id;
    private $quantity;
    private $max_price;
    private $external_id;

    public static function create(int $offer_id, int $quantity, float $max_price, string $external_id): CreateOrderModel
    {
        return new static($offer_id, $quantity, $max_price, $external_id);
    }

    public function __construct(int $offer_id, int $quantity, float $max_price, string $external_id)
    {

        $this->offer_id = $offer_id;
        $this->quantity = $quantity;
        $this->max_price = $max_price;
        $this->external_id = $external_id;

    }

    /**
     * @return int
     */
    public function getOfferId(): int
    {
        return $this->offer_id;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return float
     */
    public function getMaxPrice(): float
    {
        return $this->max_price;
    }

    /**
     * @return string
     */
    public function getExternalId(): string
    {
        return $this->external_id;
    }

}
