<?php

namespace Isign\Login;

use Isign\QueryInterface;
use Isign\ResultInterface;
use Isign\Validator\Constraints\Code;
use Isign\Validator\Constraints\Phone;
use Symfony\Component\Validator\Constraints as Assert;

class MobileCertificate implements QueryInterface
{
    /** @var string user phone number */
    private $phone;

    /** @var string user personal code */
    private $code;

    /**
     * @param string $phone user phone number
     * @param string $code user personal code
     */
    public function __construct($phone, $code)
    {
        $this->phone = $phone;
        $this->code = $code;
    }

    /**
     * API action name, part of full API request url
     * @return string
     */
    public function getAction()
    {
        return 'mobile/certificate';
    }

    /**
     * Field and values association used in query
     * @return array
     */
    public function getFields()
    {
        return [
            'phone' => $this->phone,
            'code' => $this->code,
        ];
    }

    /**
     * Result object for this query result
     * @return ResultInterface
     */
    public function createResult()
    {
        return new MobileCertificateResult();
    }

    /**
     * Validation constraints for fields
     * @return Assert\Collection
     */
    public function getValidationConstraints()
    {
        return new Assert\Collection([
            'phone' => new Assert\Required([
                new Assert\NotBlank(),
                new Phone(),
            ]),
            'code' => new Assert\Required([
                new Assert\NotBlank(),
                new Code()
            ])
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
