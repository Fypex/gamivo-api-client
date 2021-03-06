<?php

namespace Fypex\GamivoClient\Models;

class OfferResponseModel
{

    private $id;
    private $product_id;
    private $seller_name;
    private $completed_orders;
    private $rating;
    private $retail_price;
    private $wholesale_price_tier_one;
    private $wholesale_price_tier_two;
    private $stock_available;
    private $invoiceable;
    private $status;
    private $seller_price;
    private $wholesale_seller_price_tier_one;
    private $wholesale_seller_price_tier_two;
    private $product;

    public function __construct($offer)
    {

        $this->id = $offer['id'];
        $this->product_id = $offer['product_id'];
        $this->seller_name = $offer['seller_name'];
        $this->completed_orders = $offer['completed_orders'];
        $this->rating = $offer['rating'];
        $this->retail_price = $offer['retail_price'];
        $this->wholesale_price_tier_one = $offer['wholesale_price_tier_one'];
        $this->wholesale_price_tier_two = $offer['wholesale_price_tier_two'];
        $this->stock_available = $offer['stock_available'];
        $this->invoiceable = $offer['invoicable'];
        $this->status = $offer['status'];
        $this->seller_price = $offer['seller_price'];
        $this->wholesale_seller_price_tier_one = $offer['wholesale_seller_price_tier_one'] ?? 0;
        $this->wholesale_seller_price_tier_two = $offer['wholesale_seller_price_tier_two'] ?? 0;


    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getProductId(): int
    {
        return $this->product_id;
    }

    public function getSellerName(): string
    {
        return $this->seller_name;
    }

    public function getCompletedOrders(): int
    {
        return $this->completed_orders;
    }

    public function getRating(): float
    {
        return $this->rating;
    }

    public function getRetailPrice(): float
    {
        return $this->retail_price;
    }

    public function getWholesalePriceTierOne(): float
    {
        return $this->wholesale_price_tier_one;
    }

    public function getWholesalePriceTierTwo(): float
    {
        return $this->wholesale_price_tier_two;
    }

    public function getStockAvailable(): int
    {
        return $this->stock_available;
    }

    public function getInvoiceable(): bool
    {
        return $this->invoiceable;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getSellerPrice(): float
    {
        return $this->seller_price;
    }

    public function getWholesaleSellerPriceTierOne(): float
    {
        return $this->wholesale_seller_price_tier_one;
    }

    public function getWholesaleSellerPriceTierTwo(): float
    {
        return $this->wholesale_seller_price_tier_two;
    }

    public function setProduct(ProductResponseModel $product){
        $this->product = $product;
    }

    public function getProduct(): ProductResponseModel
    {
        return $this->product;
    }

}
