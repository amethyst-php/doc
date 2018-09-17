<?php

namespace Railken\LaraOre\Tests\App\Address\Attributes\Street\Exceptions;

use Railken\LaraOre\Tests\App\Address\Exceptions\AddressAttributeException;

class AddressStreetNotDefinedException extends AddressAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'street';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'ADDRESS_STREET_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}