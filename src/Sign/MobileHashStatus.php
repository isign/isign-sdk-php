<?php
namespace Isign\Sign;

use Isign\Login\AbstractStatus;

/**
 * Document sign status for mobile ID.
 */
class MobileHashStatus extends AbstractStatus
{
    /**
     * Result object for this query result
     * @return MobileStatusResult
     */
    public function createResult()
    {
        return new MobileHashStatusResult();
    }

    /**
     * API action name, part of full url
     * @return string
     */
    public function getAction()
    {
        return 'mobile/sign/hash/status';
    }
}
