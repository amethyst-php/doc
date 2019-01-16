## Create

Define a new instance of the [Manager](manager.md)

```php
use Railken\Amethyst\Managers\FooManager;

$manager = new FooManager();
```

Create a new [entity](model.md)

```php
$params = [
    "name" => "Dr. Bertrand Zieme",
    "description" => "Delectus quis nisi qui qui laborum sint neque. Consequatur optio eveniet sunt iusto assumenda sit. Ut voluptatem quia necessitatibus. Ipsa ea ut minima fuga."
];

$result = $manager->create($params);
```

Check the result of the operation

```php
if ($result->ok()) {
    // All ok
} else {
    // Something goes wrong
}
```

Retrieve the [entity](model.md) from the [result](result.md)

```php
$entity = $result->getResource();
```

Throw an exception immediately if the operation fails

```php
use Railken\Lem\Exceptions\Exception;

$params = [
    "name" => "Dr. Bertrand Zieme",
    "description" => "Delectus quis nisi qui qui laborum sint neque. Consequatur optio eveniet sunt iusto assumenda sit. Ut voluptatem quia necessitatibus. Ipsa ea ut minima fuga."
];
   
try {
    $result = $manager->createOrFail($params);
} catch (Exception $e) {
    // ...
}
```

### Links
* [Attributes](attributes.md)
* [Errors](errors.md)
* [Handle the result](result.md)

---
[Back](index.md)