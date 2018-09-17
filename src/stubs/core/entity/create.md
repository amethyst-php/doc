## Create

Define a new instance of the manager

```php
use {{ manager.class }};

$manager = new {{ manager.instance_shortname }}();
```

Create a new entity

```php
$result = $manager->create({{ manager.parameters_formatted | raw }});
```

Throw an exception if the operation fails

```php
$result = $manager->createOrFail({{ manager.parameters_formatted | raw }});
```

Retrieve the resource created

```php
$resource = $result->getResource();
```

Links:
* [Attributes](attributes.md)
* [Errors](errors.md)
* [Handle the result](result.md)

---
[Back](index.md)