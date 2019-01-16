## Railken\Amethyst\Fakers\FooFaker

The faker can be used for testing or seeding.

Create a new entity using the faker

```php
use Railken\Amethyst\Fakers\FooFaker;

$result = $manager->create(FooFaker::make()->parameters());
```

#### Extend the class

Create the new faker in `app/Fakers/FooFaker`
```php
namespace App\Fakers;

use Railken\Amethyst\Fakers\FooFaker as Faker;

class FooFaker extends Faker {
	// ...
}
```
Update the file `configs/amethyst.foo` with the new class
```php
return [
    'data' => [
        'foo' => [
            'faker' => App\Fakers\FooFaker::class,
        ],
    ]
];
```


---
[Back](index.md)