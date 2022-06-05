<?php


namespace Fypex\GamivoClient\Models;


class OrderResponseModel
{

    private $id;
    private $total;
    private $status;
    private $external_id;

    public static function create($id, float $total, string $status, string $external_id): OrderResponseModel
    {
        return new static($id, $total, $status, $external_id);
    }

    public function __construct($id, float $total, string $status, string $external_id)
    {

        $this->id = $id;
        $this->total = $total;
        $this->status = $status;
        $this->external_id = $external_id;

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getExternalId(): string
    {
        return $this->external_id;
    }


}
