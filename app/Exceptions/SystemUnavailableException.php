<?php

namespace App\Exceptions;

use Exception;

class SystemUnavailableException extends Exception
{
    protected $code = 500;
}
