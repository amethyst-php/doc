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

Check the result of the operation

```php
if ($result->ok()) {
	// All ok
} else {
	// Something goes wrong
}
```

Retrieve the resource created

```php
$resource = $result->getResource();
```

Throw an exception immediately if the operation fails

```php

use Railken\Laravel\Manager\Exceptions\Exception;

try {
	$result = $manager->createOrFail({{ manager.parameters_formatted | raw }});
} catch (Exception $e) {
	// ...
}
```


Links:
* [Attributes](attributes.md)
* [Errors](errors.md)
* [Handle the result](result.md)

---
[Back](index.md)