<?php
/**
 * Created by PhpStorm.
 * User: niranjan
 * Date: 15/12/16
 * Time: 11:28 AM
 */

namespace GitoAPI\Exceptions;


use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserNotFoundException extends NotFoundHttpException
{
    public function __construct()
    {
        parent::__construct('The user was not found.');
    }
}