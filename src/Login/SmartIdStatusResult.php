<?php
namespace Isign\Login;

use Isign\StatusResultInterface;

/**
 * Result object for smart ID login status response.
 */
class SmartIdStatusResult extends AbstractStatusResult
{
    /** @var string user's login certificate */
    private $certificate;
    
    /** @var string personal code */
    private $code;
    
    /** @var string Country code */
    private $country;
    
    /** @var string name */
    private $name;
    
    /** @var string surname */
    private $surname;
    
    /**
     * Fields expected in response
     * @return array
     */
    public function getFields()
    {
        return [
            'status',
            'certificate',
            'code',
            'country',
            'name',
            'surname',    
        ];
    }
    
    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
    
    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
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
     * Set code
     * @param string $code
     * @return void
     */
    public function setCode($code)
    {
        $this->code = $code;
    }
    
    /**
     * Set country
     * @param string $country
     * @return void
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }
    
    /**
     * Set name
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * Set surname
     * @param string $surname
     * @return void
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }
    
    /**
     * @return string
     */
    public function getCertificate()
    {
        return $this->certificate;
    }

    /**
     * @param string $certificate
     */
    public function setCertificate($certificate)
    {
        $this->certificate = $certificate;
    }
}
