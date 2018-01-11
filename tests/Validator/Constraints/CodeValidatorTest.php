<?php

namespace Isign\Tests\Validator\Constraints;

use Isign\Validator\Constraints\Code;
use Isign\Validator\Constraints\CodeValidator;
use Symfony\Component\Validator\Tests\Constraints\AbstractConstraintValidatorTest;
use Symfony\Component\Validator\Validation;

class CodeValidatorTest extends AbstractConstraintValidatorTest
{
    protected function getApiVersion()
    {
        return Validation::API_VERSION_2_5;
    }

    protected function createValidator()
    {
        return new CodeValidator(false);
    }

    public function testNullIsValid()
    {
        $this->validator->validate(null, new Code());

        $this->assertNoViolation();
    }

    public function testEmptyStringIsValid()
    {
        $this->validator->validate('', new Code());

        $this->assertNoViolation();
    }

    /**
     * @expectedException \Symfony\Component\Validator\Exception\UnexpectedTypeException
     */
    public function testExpectsStringCompatibleType()
    {
        $this->validator->validate(new \stdClass(), new Code());
    }

    /**
     * @dataProvider getValidCodes
     */
    public function testValidCodes($code)
    {
        $this->validator->validate($code, new Code());
        
        $this->assertNoViolation();
    }

    public function getValidCodes()
    {
        return array(
            // Test
            array('11412090004'),
            // Lithuania, Estonia
            array('39009090909'),
            array('39009090909'),
            array('49009090909'),
            array('59009090909'),
            array('69009090909'),
            // Finland
            array('060606+1234'),
            array('060606-1234'),
            array('060606A1234'),
        );
    }

    /**
     * @dataProvider getInvalidCodes
     */
    public function testInvalidCodes($code)
    {
        $constraint = new Code(array(
            'message' => 'myMessage',
        ));

        $this->validator->validate($code, $constraint);

        $this->buildViolation('myMessage')
            ->setParameter('{{ value }}', '"'.$code.'"')
            ->setCode(defined('Isign\Validator\Constraints\Code::REGEX_FAILED_ERROR')?Code::REGEX_FAILED_ERROR:null)
            ->assertRaised();
    }

    public function getInvalidCodes()
    {
        return array(
            // Test
            array('1'), // too short
            array('personal_cde'), // random crap
            // Lithuania, Estonia
            array('30000000000'), // invalid
            array('36513040898'), // invalid month 13
            array('96512040898'), // invalid month 13
            array('900909090909'), // too long
            // Finland
            array('060606B1234'), // invalid century char
            array('061306B1234'), // invalid month
            array('060606A12344'), // too long
            array('060606A123'), // too short
        );
    }
}
