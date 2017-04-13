<?php
namespace Isign\Login;

use Isign\QueryInterface;
use Isign\Validator\Constraints\Code;
use Isign\Validator\Constraints\Phone;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Absctract smartId query.
 */
abstract class AbstractSmartIdQuery implements QueryInterface
{
    /** @var string user personal code */
    private $code;

    /** @var string Country related to personal code. Example EE */
    private $country;

    /**
     * @param string $code
     * @param string $country
     * @return self
     */
    public function __construct(
        $code,
        $country
    ) {
        $this->code = $code;
        $this->country = $country;
    }

    /**
     * Field and values association used in query
     * @return array
     */
    public function getFields()
    {
        $return = [
            'code' => $this->code,
            'country' => $this->country,
        ];

        return $return;
    }

    /**
     * Validation constraints for request data validation
     * @return Assert\Collection
     */
    public function getValidationConstraints()
    {
        return new Assert\Collection([
            'code' => new Assert\Required([
                new Assert\NotBlank(),
                new Code()
            ]),
            'country' => new Assert\Required([
                new Assert\NotBlank(),
            ]),
        ]);
    }

    /**
     * HTTP method to use
     * @return string
     */
    public function getMethod()
    {
        return QueryInterface::POST;
    }
}
