<?php
namespace Isign\Tests\Login;

use Isign\Login\SmartIdCertificateResult;
use Isign\Tests\TestCase;
use Isign\Tests\TestResultFieldsTrait;

class SmartIdCertificateResultTest extends TestCase
{
    private $method;
    
    public function setUp()
    {
        $this->method = new SmartIdCertificateResult();
    }

    public function testStatusInterface()
    {
        $this->assertInstanceOf('Isign\StatusResultInterface', $this->method);
    }
    
    public function testExtendsStatusResult()
    {
        $this->assertInstanceOf('Isign\Login\SmartIdStatusResult', $this->method);
    }

    use TestResultFieldsTrait;

    public function expectedFields()
    {
        return [
            ['status'],
            ['certificate'],
            ['code'],
            ['country'],
            ['name'],
            ['surname'],  
        ];
    }
}
