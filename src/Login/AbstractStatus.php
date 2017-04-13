<?php
namespace Isign\Login;

use Isign\QueryInterface;
use Isign\TokenizedQueryInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Login status for MobileId, SmartId, etc.
 */
abstract class AbstractStatus implements TokenizedQueryInterface
{
    /** @var string unique resource identifier, received from mobile login request */
    protected $token;

    /**
     * @param string $token unique resource identifier, received from mobile login request
     * @return self
     */
    public function __construct($token)
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
     * Get fields
     * @return array
     */
    public function getFields()
    {
        return [
            'token' => $this->token,
        ];
    }

    /**
     * Validation constraints for request data validation
     * @return Assert\Collection
     */
    public function getValidationConstraints()
    {
        return new Assert\Collection([
            'token' => new Assert\Required(
                [new Assert\NotBlank()]
            )
        ]);
    }

    /**
     * HTTP method to use
     * @return string
     */
    public function getMethod()
    {
        return QueryInterface::GET;
    }
}
