<?php
namespace Isign\Tests\Login;

use Isign\Login\SmartIdResult;
use Isign\QueryInterface;
use Isign\Tests\TestCase;
use Isign\Tests\TestResultFieldsTrait;

class SmartIdResultTest extends TestCase
{
    private $method;

    public function setUp()
    {
        $this->method = new SmartIdResult();
    }

    use TestResultFieldsTrait;

    public function expectedFields()
    {
        return [
            ['status'],
            ['token'],
            ['control_code'],
        ];
    }
}
