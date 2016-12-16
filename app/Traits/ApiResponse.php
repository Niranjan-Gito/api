<?php
namespace GitoAPI\Traits;

trait ApiResponse
{
    /**
     * Get a Response instance
     *
     * @return \GitoAPI\Response\Response
     */
    public function response()
    {
        return app(\GitoAPI\Response\Response::class);
    }
    /**
     * Get a Response instance
     *
     * @return \GitoAPI\Response\Response
     */
    public function respond()
    {
        return app(\GitoAPI\Response\Response::class);
    }
}