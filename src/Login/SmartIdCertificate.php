<?php

namespace Isign\Login;

use Isign\ResultInterface;

class SmartIdCertificate extends AbstractSmartIdQuery
{
    /**
     * API action name, part of full API request url
     * @return string
     */
    public function getAction()
    {
        return 'smartid/certificate';
    }

    /**
     * Result object for this query result
     * @return ResultInterface
     */
    public function createResult()
    {
        return new SmartIdCertificateResult();
    }
}
