<?php
namespace Isign\Tests\Sign;

use Isign\QueryInterface;
use Isign\Sign\MobileHash;
use Isign\Tests\TestCase;

class MobileHashTest extends TestCase
{
    private $method;

    public function setUp()
    {
        $this->method = new MobileHash(
            '+370xxxxxxxx',
            'xxxxxxxxxxx',
            'd04b98f48e8f8bcc15c6ae5ac050801cd6dcfd428fb5f9e65c4e16e7807340fa',
            'SHA256',
            'RSA',
            'Test message',
            'EN'
        );
    }
    
    public function testGetFields()
    {
        $result = $this->method->getFields();

        $this->assertSame('+370xxxxxxxx', $result['phone']);
        $this->assertSame('xxxxxxxxxxx', $result['code']);
        $this->assertSame('d04b98f48e8f8bcc15c6ae5ac050801cd6dcfd428fb5f9e65c4e16e7807340fa', $result['hash']);
        $this->assertSame('SHA256', $result['hash_algorithm']);
        $this->assertSame('RSA', $result['encryption']);
        $this->assertSame('Test message', $result['message']);
        $this->assertSame('EN', $result['language']);
    }

    public function testGetAction()
    {
        $this->assertSame('mobile/sign/hash', $this->method->getAction());
    }

    public function testGetMethod()
    {
        $this->assertSame(QueryInterface::POST, $this->method->getMethod());
    }

    public function testCreateResult()
    {
        $this->assertInstanceOf('Isign\Sign\MobileHashResult', $this->method->createResult());
    }

    public function testHasValidationConstraints()
    {
        $collection = $this->method->getValidationConstraints();

        $this->assertInstanceOf(
            'Symfony\Component\Validator\Constraints\Collection',
            $collection
        );
    }
}
