<?php
namespace Isign\Login;

use Isign\QueryInterface;
use Isign\TokenizedQueryInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Login status for mobile ID.
 */
class MobileStatus extends AbstractStatus
{
    /**
     * Result object for this query result
     * @return MobileStatusResult
     */
    public function createResult()
    {
        return new MobileStatusResult();
    }

    /**
     * API action name, part of full url
     * @return string
     */
    public function getAction()
    {
        return 'mobile/login/status';
    }
}
