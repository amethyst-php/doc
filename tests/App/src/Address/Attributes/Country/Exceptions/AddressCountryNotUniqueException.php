<?php

namespace Railken\LaraOre\Tests\App\Address\Attributes\Country\Exceptions;

use Railken\LaraOre\Tests\App\Address\Exceptions\AddressAttributeException;

class AddressCountryNotUniqueException extends AddressAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'country';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'ADDRESS_COUNTRY_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}