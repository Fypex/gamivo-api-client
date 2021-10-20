<?php

namespace Fypex\GamivoClient\Filters;

class OffersFilter
{
    private $offset = 0;
    private $limit = 100;

    public function setOffset(int $offset)
    {
        $this->offset = $offset;
    }

    public function setLimit(int $limit)
    {
        $this->limit = $limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

}
