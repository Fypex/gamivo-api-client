<?php

namespace Fypex\GamivoClient\Models;

class ErrorModel
{

    private $code;
    private $message;
    private $reason;

    public function __construct($error)
    {

        $this->code = $error['code'];
        $this->message = $error['message'];
        $this->reason = $error['reason'] ?? '';

    }

    public function getCode()
    {
        return $this->code;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getReason()
    {
        return $this->reason;
    }

}
