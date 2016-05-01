<?php
/**
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @author    Alexander Weissman
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/licenses/UserFrosting.md (MIT License)
 */
namespace UserFrosting\Exception;

use UserFrosting\Message\UserMessage as UserMessage;

class HttpException extends \Exception
{

    /**
     * @var integer
     * Every exception that inherits from this class should have a hardcoded http error code.
     */    
    protected $http_error_code = 500;
    
    /**
     * @var array[UserMessage]
     */
    protected $messages = [];
    
    protected $default_message = "SERVER_ERROR";
    
    public function getHttpErrorCode()
    {
        return $this->http_error_code;
    }
    
    public function getUserMessages()
    {
        if (empty($this->messages)){
           $this->addUserMessage($this->default_message);
        }
        
        return $this->messages;
    }
    
    public function addUserMessage($message, $parameters = []){
        if ($message instanceof UserMessage){
            $this->messages[] = $message;
        } else {
            // Tight coupling is probably OK here
            $this->messages[] = new UserMessage($message, $parameters);
        }
    }
}
