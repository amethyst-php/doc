## Railken\Amethyst\Serializers\FooSerializer

The serializer is used to serialize an entity, you can retrieve it from the data.

```php
use Railken\Amethyst\Managers\FooManager;

$manager = new FooManager();

$serializer = $manager->getSerializer();

```

And use it so serialize an entity
Retrieving an entity

```php
$entity = $repository->findOneById(1);
$serializer->serialize($entity)->toArray(); // Returns an array

```
#### Extend the class

Create the new serializer in `app/Serializers/FooSerializer`
```php
namespace App\Serializers;

use Railken\Amethyst\Serializers\FooSerializer as Serializer;

class FooSerializer extends Serializer {
	// ...
}
```
Update the file `configs/amethyst.foo` with the new class
```php
return [
    'data' => [
        'foo' => [
            'serializer' => App\Serializers\FooSerializer::class,
        ],
    ]
];
```

---
[Back](index.md)