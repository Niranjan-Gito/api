<?php
namespace GitoAPI\Exceptions;


class NotFoundException extends BaseException
{
    /**
     * @var string
     */
    protected $status = '404';

    /**
     * @return void
     */
    public function __construct()
    {
        $message = $this->build(func_get_args());
        parent::__construct($message);
    }
}