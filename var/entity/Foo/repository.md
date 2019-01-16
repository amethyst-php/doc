## Railken\Amethyst\Repositories\FooRepository

The repository is the class to perform queries.

```php
use Railken\Amethyst\Managers\FooManager;

$manager = new FooManager();

$repository = $manager->getRepository();

```

Retrieving an entity

```php
$repository->findOneBy(['id' => 1]);
$repository->findOneById(1);

```

Retrieving all entities

```php
$repository->findAll();
```

Performing a query using \Illuminate\DataBase\Eloquent\Builder

```php
$repository->newQuery()->where('id', 1)->first();

```

#### Extend the class

Create the new repository in `app/Repositories/FooRepository`
```php
namespace App\Repositories;

use Railken\Amethyst\Repositories\FooRepository as Repository;

class FooRepository extends Repository {
	// ...
}
```
Update the file `configs/amethyst.foo` with the new class
```php
return [
    'data' => [
        'foo' => [
            'repository' => App\Repositories\FooRepository::class,
        ],
    ]
];
```

---
[Back](index.md)