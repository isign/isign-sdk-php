<?php
namespace Isign\Tests\Sign;

use Isign\QueryInterface;
use Isign\Sign\MobileHashStatusResult;
use Isign\Tests\TestCase;
use Isign\Tests\TestResultFieldsTrait;

class MobileHashStatusResultTest extends TestCase
{
    private $method;
    
    public function setUp()
    {
        $this->method = new MobileHashStatusResult();
    }

    use TestResultFieldsTrait;

    public function expectedFields()
    {
        return [
            ['status'],
            ['signature_value'],
        ];
    }
}
