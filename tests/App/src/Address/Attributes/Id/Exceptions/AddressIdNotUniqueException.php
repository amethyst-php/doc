<?php

namespace Railken\LaraOre\Tests\App\Address\Attributes\Id\Exceptions;

use Railken\LaraOre\Tests\App\Address\Exceptions\AddressAttributeException;

class AddressIdNotUniqueException extends AddressAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'id';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'ADDRESS_ID_NOT_UNIQUE';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is not unique';
}
