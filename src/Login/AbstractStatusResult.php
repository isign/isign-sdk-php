<?php
namespace Isign\Login;

use Isign\StatusResultInterface;

/**
 * Result object for login status response.
 */
abstract class AbstractStatusResult implements StatusResultInterface
{
    /** @var string response status */
    protected $status;

    /**
     * Set status
     * @param string $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
