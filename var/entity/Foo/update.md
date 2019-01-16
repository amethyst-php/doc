## Update 


Define a new instance of the [Manager](manager.md)

```php
use Railken\Amethyst\Managers\FooManager;

$manager = new FooManager();
```

Retrieve an [entity](model.md) using the [repository](repository.md)


```php
$entity = $manager->getRepository()->findOneById(1);
```

Update an existent [entity](model.md)

```php
$params = [
    "name" => "Dr. Bertrand Zieme",
    "description" => "Delectus quis nisi qui qui laborum sint neque. Consequatur optio eveniet sunt iusto assumenda sit. Ut voluptatem quia necessitatibus. Ipsa ea ut minima fuga."
];

$result = $manager->update($params);
```

* [Attributes](attributes.md)
* [Errors](errors.md)
* [Performing queries with the Repository](repository.md)
* [Handle the result](result.md)

---
[Back](index.md)