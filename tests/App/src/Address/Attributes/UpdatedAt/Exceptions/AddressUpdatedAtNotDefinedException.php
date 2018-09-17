<?php

namespace Railken\LaraOre\Tests\App\Address\Attributes\UpdatedAt\Exceptions;

use Railken\LaraOre\Tests\App\Address\Exceptions\AddressAttributeException;

class AddressUpdatedAtNotDefinedException extends AddressAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'updated_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'ADDRESS_UPDATED_AT_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}
