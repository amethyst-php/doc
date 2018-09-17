<?php

namespace Railken\LaraOre\Tests\App\Address\Attributes\ZipCode\Exceptions;

use Railken\LaraOre\Tests\App\Address\Exceptions\AddressAttributeException;

class AddressZipCodeNotDefinedException extends AddressAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'zip_code';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'ADDRESS_ZIP_CODE_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}