## Railken\Amethyst\Schemas\FooSchema

The schema is used to define the structure of the attributes. All the $attributes in the [model](model.md) and in the [manager](manager.md) are initialized by the schema.

#### Extend the class

Create the new schema in `app/Schemas/FooSchema`
```php
namespace App\Schemas;

use Railken\Amethyst\Schemas\FooSchema as Schema;

class FooSchema extends Schema {
	// ...
}
```
Update the file `configs/amethyst.foo` with the new class
```php
return [
    'data' => [
        'foo' => [
            'schema' => App\Schemas\FooSchema::class,
        ],
    ]
];
```

---
[Back](index.md)