<?php
namespace Isign\Validator\Constraints;

use Symfony\Component\Validator\Constraints\Regex;

/**
 * Class Code
 * @package IsignApiBundle
 */
class Code extends Regex
{
    /**
     * Base validation pattern which includes + char only,
     * all other parts are built on the fly
     */
    const VALIDATION_PATTERN = '/^(%s)$/';

    /**
     * @var string
     */
    public $message = 'Code format is not valid';

    /**
     * @param mixed $options
     * @return self
     */
    public function __construct($options = null)
    {
        $options['pattern'] = sprintf(
            self::VALIDATION_PATTERN,
            $this->buildPattern($this->getCountryPatterns())
        );
        parent::__construct($options);
    }

    /**
     * Build one regexp pattern from given list of patterns
     * @param array $patterns
     * @return string built regexp
     */
    private function buildPattern(array $patterns)
    {
        $parts = [];
        foreach ($patterns as $pattern) {
            $parts[] = sprintf('(%s)', $pattern);
        }

        return implode('|', $parts);
    }

    /**
     * Regexp patterns by country
     * IMPORTANT!
     * DO NOT FORGET TO UPDATE REGULAR EXPRESSION VALIDATOR IN JAVASCRIPT!
     * @return array
     */
    private function getCountryPatterns()
    {
        return [
            'test' => '11412090004',
            'lt,ee' => '[3456]{1}[0-9]{2}(0[1-9]|1[0-2])\d{6}',
            'fi' => '[0-9]{2}(0[1-9]|1[0-2])[0-9]{2}[\+-A]\d{4}'
        ];
    }
}
