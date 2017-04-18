<?php
namespace Isign\Tests\Login;

use Isign\Login\SmartIdStatusResult;
use Isign\QueryInterface;
use Isign\Tests\TestCase;
use Isign\Tests\TestResultFieldsTrait;
use Isign\Tests\Login\SmartIdStatusTest;

class SmartIdStatusResultTest extends TestCase
{
    private $method;
    
    public function setUp()
    {
        $this->method = new SmartIdStatusResult();
    }

    public function testStatusInterface()
    {
        $this->assertInstanceOf('Isign\StatusResultInterface', $this->method);
    }
    
    public function testExtendsStatusResultAbstract()
    {
        $this->assertInstanceOf('Isign\Login\AbstractStatusResult', $this->method);
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
