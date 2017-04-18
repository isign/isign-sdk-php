<?php
namespace Isign\Login;

use Isign\ResultInterface;

/**
 * Result object for Smart ID login response.
 */
class SmartIdResult implements ResultInterface
{
    /** @var string response status */
    private $status;

    /** @var string control code to display for user */
    private $controlCode;

    /** @var string token for mobile status query */
    private $token;

    /**
     * Fields expected in response
     * @return array
     */
    public function getFields()
    {
        return [
            'status',
            'token',
            'control_code',
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
     * Set control code
     * @param string $controlCode
     * @return void
     */
    public function setControlCode($controlCode)
    {
        $this->controlCode = $controlCode;
    }

    /**
     * Get control code
     * @return string
     */
    public function getControlCode()
    {
        return $this->controlCode;
    }

    /**
     * Set token
     * @param string $token
     * @return void
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Get token
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
}
