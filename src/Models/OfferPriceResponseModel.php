<?php

namespace Fypex\GamivoClient\Models;

class OfferPriceResponseModel
{

    /**
     * @var Price
     */
    private $customer_price;
    /**
     * @var Price
     */
    private $wholesale_price_tier_one;
    /**
     * @var Price
     */
    private $seller_price;
    /**
     * @var Price
     */
    private $wholesale_seller_price_tier_one;
    /**
     * @var Price
     */
    private $wholesale_price_tier_two;
    /**
     * @var Price
     */
    private $wholesale_seller_price_tier_two;

    public function __construct($data)
    {

        echo '<pre>';
        var_dump($data);
        exit;



        $this->customer_price = new Price($data['customer_price']);
        $this->seller_price = new Price($data['seller_price']);
        $this->wholesale_price_tier_one = new Price($data['wholesale_price_tier_one']);
        $this->wholesale_seller_price_tier_one = new Price($data['wholesale_seller_price_tier_one']);
        $this->wholesale_price_tier_two = new Price($data['wholesale_price_tier_two']);
        $this->wholesale_seller_price_tier_two = new Price($data['wholesale_seller_price_tier_two']);

    }

    public function getCustomerPrice(): Price
    {
        return $this->customer_price;
    }

    /**
     * @return Price
     */
    public function getWholesalePriceTierOne(): Price
    {
        return $this->wholesale_price_tier_one;
    }

    /**
     * @return Price
     */
    public function getSellerPrice(): Price
    {
        return $this->seller_price;
    }

    /**
     * @return Price
     */
    public function getWholesaleSellerPriceTierOne(): Price
    {
        return $this->wholesale_seller_price_tier_one;
    }

    /**
     * @return Price
     */
    public function getWholesalePriceTierTwo(): Price
    {
        return $this->wholesale_price_tier_two;
    }

    /**
     * @return Price
     */
    public function getWholesaleSellerPriceTierTwo(): Price
    {
        return $this->wholesale_seller_price_tier_two;
    }

}
