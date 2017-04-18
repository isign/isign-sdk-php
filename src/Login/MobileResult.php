<?php
namespace Isign\Login;

use Isign\ResultInterface;

/**
 * Result object for mobile ID login response.
 */
class MobileResult implements ResultInterface
{
    /** @var string response status */
    private $status;

    /** @var string control code to display for user */
    private $controlCode;

    /** @var string token for mobile status query */
    private $token;

    /** @var string user's first name */
    private $name;

    /** @var string user's last name */
    private $surname;

    /** @var string user's personal code */
    private $code;

    /** @var string user's country */
    private $country;

    /** @var string user's login certificate */
    private $certificate;

    /**
     * Fields expected in response
     * @return array
     */
    public function getFields()
    {
        return [
            'status',
            'control_code',
            'token',
            'name',
            'surname',
            'code',
            'country',
            'certificate'
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

    /**
     * Gets the value of name.
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     * @param string $name the name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Gets the value of surname.
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Sets the value of surname.
     * @param string $surname the surname
     * @return void
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * Gets the value of code.
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets the value of code.
     * @param string $code the code
     * @return void
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Gets the value of country.
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Sets the value of country.
     *
     * @param string $country the country
     * @return void
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * Gets the value of certificate.
     * @return string
     */
    public function getCertificate()
    {
        return $this->certificate;
    }

    /**
     * Sets the value of certificate.
     * @param string $certificate the certificate
     * @return void
     */
    public function setCertificate($certificate)
    {
        $this->certificate = $certificate;
    }
}
