<?php

namespace Railken\LaraOre\Tests\App\Address\Exceptions;

class AddressNotFoundException extends AddressException
{
    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'ADDRESS_NOT_FOUND';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'Not found';
}
