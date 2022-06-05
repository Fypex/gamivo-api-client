<?php


namespace Fypex\GamivoClient\Models;


class OrderKeyModel
{

    private $type;
    private $key;
    private $extension;

    public static function key(string $type, string $key, string $extension = null): OrderKeyModel
    {
        return new static($type, $key, $extension);
    }

    public function __construct(string $type, string $key, string $extension = null)
    {

        $this->type = $type;
        $this->key = $key;
        $this->extension = $extension;

    }

    /**
     * @return mixed
     */
    public function getExtension(): ?string
    {
        return $this->extension;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

}
