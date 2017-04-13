<?php
namespace Isign\Sign;

use Isign\DocumentTypeProvider;
use Isign\FileFieldsTrait;
use Isign\QueryInterface;
use Isign\Validator\Constraints\Code;
use Isign\Validator\Constraints\Phone;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Sign document using mobile ID hash.
 */
class MobileHash implements QueryInterface
{
    /** @var string user phone number */
    private $phone;

    /** @var string user personal code */
    private $code;
    
    /** @var string Hash to sign */
    private $hash;
    
    /** @var string Hash algorithm */
    private $hashAlgorithm;
    
    /** @var string Signature encryption type. */
    private $encryption;
    
    /** @var string Message displayed on the phone screen. Attention: UTF-8 symbols are not allowed */
    private $message;

    /** @var string Language for messages displayed on the phone screen */
    private $language;

    /**
     * @param string $phone
     * @param string $code
     * @param string $hash
     * @param string $hashAlgorithm
     * @param string $encryption
     * @param string $message
     * @param string $language
     */
    public function __construct(
        $phone,
        $code,
        $hash,
        $hashAlgorithm,
        $encryption,
        $message,
        $language
    ) {
        $this->phone = $phone;
        $this->code = $code;
        $this->hash = $hash;
        $this->hashAlgorithm = $hashAlgorithm;
        $this->encryption = $encryption;
        $this->message = $message;
        $this->language = $language;
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
            'hash' => $this->hash,
            'hash_algorithm' => $this->hashAlgorithm,
            'encryption' => $this->encryption,
            'message' => $this->message,
            'language' => $this->language,
        ];
    }

    /**
     * Validation constraints for request data validation
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
            ]),
            'hash' => new Assert\NotBlank(),
            'hash_algorithm' => new Assert\NotBlank(),
            'encryption' => new Assert\NotBlank(),
            'message' => new Assert\NotBlank(),
            'language' => new Assert\NotBlank(),
        ]);
    }

    /**
     * Result object for this query result
     * @return MobileHashResult
     */
    public function createResult()
    {
        return new MobileHashResult();
    }

    /**
     * API action name, part of full API request url
     * @return string
     */
    public function getAction()
    {
        return 'mobile/sign/hash';
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
