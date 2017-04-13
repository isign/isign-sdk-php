<?php
namespace Isign\Login;

/**
 * Login using SmartId.
 */
class SmartId extends AbstractSmartIdQuery
{
    /**
     * Result object for this query result
     * 
     * @return SmartIdResult
     */
    public function createResult()
    {
        return new SmartIdResult();
    }

    /**
     * API action name, part of full API request url
     * @return string
     */
    public function getAction()
    {
        return 'smartid/login';
    }
}
