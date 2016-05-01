<?php

/**
 * UserFrosting (http://www.userfrosting.com)
 *
 * @link      https://github.com/userfrosting/UserFrosting
 * @author    Alexander Weissman
 * @license   https://github.com/userfrosting/UserFrosting/blob/master/licenses/UserFrosting.md (MIT License)
 */
namespace UserFrosting\Exception;

class InvalidAccessTokenException extends UserFrostingException
{
    
    protected $http_error_code = 400;
    protected $default_message = "We were unable to retrieve your customized survey using the specified link.  However, you may still participate as an anonymous user.";
    
}
