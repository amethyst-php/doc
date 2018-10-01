<?php

namespace Railken\Amethyst\Tests\App\Schemas;

use Railken\Lem\Attributes;
use Railken\Lem\Schema;

class AddressSchema extends Schema
{
    /**
     * Get all the attributes.
     *
     * @var array
     */
    public function getAttributes()
    {
        return [
            Attributes\IdAttribute::make(),
            Attributes\TextAttribute::make('name'),
            Attributes\TextAttribute::make('country'),
            Attributes\TextAttribute::make('zip_code'),
            Attributes\TextAttribute::make('street'),
            Attributes\TextAttribute::make('province'),
            Attributes\TextAttribute::make('city'),
            Attributes\CreatedAtAttribute::make(),
            Attributes\UpdatedAtAttribute::make(),
            Attributes\DeletedAtAttribute::make(),
        ];
    }
}
