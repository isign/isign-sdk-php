<?php
namespace Isign;

/**
 * Query interface for building queries for API.
 */
interface QueryInterface
{
    /**
     * HTTP method POST
     */
    const POST = 'POST';
    
    /**
     * HTTP method GET
     */
    const GET = 'GET';
    
    /**
     * API action name, part of full API request url
     * @return string
     */
    public function getAction();

    /**
     * Field and values association used in query
     * @return array
     */
    public function getFields();

    /**
     * Result object for this query result
     * @return ResultInterface
     */
    public function createResult();
    
    /**
     * Validation constraints for fields
     * @return Symfony\Component\Validator\Constraints\Collection
     */
    public function getValidationConstraints();

    /**
     * HTTP method to use
     * @return string
     */
    public function getMethod();
}
