<?php
namespace Isign\Sign;

use Isign\ResultInterface;

/**
 * Result object for mobile ID login status response.
 */
class MobileHashStatusResult implements ResultInterface
{
    /** @var string response status */
    private $status;

    /** @var string signature value */
    private $signatureValue = null;

    /**
     * Fields expected in response
     * @return array
     */
    public function getFields()
    {
        return [
            'status',
            'signature_value',
        ];
    }

    /**
     * Set status
     * @param string $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
 
    /**
     * Gets the value of signatureValue.
     * @return string|null
     */
    public function getSignatureValue()
    {
        return $this->signatureValue;
    }
 
    /**
     * Sets the value of signatureValue.
     * @param string|null $signatureValue the signature value
     */
    public function setSignatureValue($signatureValue)
    {
        $this->signatureValue = $signatureValue;
    }
}
