<?php

namespace UserFrosting\Message;

class UserMessage
{
    public $message;
    public $parameters = [];
    
    /**
     * Public constructor.
     */
    public function __construct($message, $parameters = [])
    {
        $this->message = $message;
        $this->parameters = $parameters;
    }

}
