<?php

namespace Railken\LaraOre\Tests\App\Address\Attributes\Country;

use Railken\LaraOre\Tests\App\Address\Attributes\Country\Exceptions as Exceptions;
use Railken\Laravel\Manager\Attributes\BaseAttribute;
use Railken\Laravel\Manager\Contracts\EntityContract;
use Railken\Laravel\Manager\Tokens;

class CountryAttribute extends BaseAttribute
{
    /**
     * Name attribute.
     *
     * @var string
     */
    protected $name = 'country';

    /**
     * Is the attribute required
     * This will throw not_defined exception for non defined value and non existent model.
     *
     * @var bool
     */
    protected $required = true;

    /**
     * Is the attribute unique.
     *
     * @var bool
     */
    protected $unique = false;

    /**
     * List of all exceptions used in validation.
     *
     * @var array
     */
    protected $exceptions = [
        Tokens::NOT_DEFINED    => Exceptions\AddressCountryNotDefinedException::class,
        Tokens::NOT_VALID      => Exceptions\AddressCountryNotValidException::class,
        Tokens::NOT_AUTHORIZED => Exceptions\AddressCountryNotAuthorizedException::class,
    ];

    /**
     * List of all permissions.
     */
    protected $permissions = [
        Tokens::PERMISSION_FILL => 'address.attributes.country.fill',
        Tokens::PERMISSION_SHOW => 'address.attributes.country.show',
    ];

    /**
     * Is a value valid ?
     *
     * @param EntityContract $entity
     * @param mixed          $value
     *
     * @return bool
     */
    public function valid(EntityContract $entity, $value)
    {
        return true;
    }
}