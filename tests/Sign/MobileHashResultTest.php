<?php
namespace Isign\Tests\Sign;

use Isign\QueryInterface;
use Isign\Sign\MobileHashResult;
use Isign\Tests\TestCase;
use Isign\Tests\TestResultFieldsTrait;

class MobileHashResultTest extends TestCase
{
    private $method;

    public function setUp()
    {
        $this->method = new MobileHashResult();
    }
    
    public function testItExtendsMobileResult()
    {
        $this->assertInstanceOf('Isign\Sign\MobileResult', $this->method);
    }

    use TestResultFieldsTrait;

    public function expectedFields()
    {
        return [
            ['status'],
            ['control_code'],
            ['token']
        ];
    }
}
