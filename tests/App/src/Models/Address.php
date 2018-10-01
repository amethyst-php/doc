<?php

namespace Railken\Amethyst\Tests\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;
use Railken\Amethyst\Tests\App\Schemas\AddressSchema;
use Railken\Lem\Contracts\EntityContract;

class Address extends Model implements EntityContract
{
    use SoftDeletes;

    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = Config::get('amethyst.address.managers.address.table');
        $this->fillable = (new AddressSchema())->getNameFillableAttributes();
    }
}
