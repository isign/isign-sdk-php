<?php
namespace Isign\Login;

/**
 * Login status for smartID.
 */
class SmartIdStatus extends AbstractStatus
{
    /**
     * Result object for this query result
     * @return SmartIdStatusResult
     */
    public function createResult()
    {
        return new SmartIdStatusResult();
    }

    /**
     * API action name, part of full url
     * @return string
     */
    public function getAction()
    {
        return 'smartid/login/status';
    }
}
