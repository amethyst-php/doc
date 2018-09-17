## Update 

Define a new instance of the manager

```php
use {{ manager.class }};

$manager = new {{ manager.instance_shortname }}();
```

Retrieve a resource using the repository

```php
$resource = $manager->getRepository()->findOneById(1);
```

Update an existent resource

```php
$result = $manager->update({{ manager.parameters_formatted | raw }});
```

* [Attributes](attributes.md)
* [Errors](errors.md)
* [Performing queries with the Repository](repository.md)
* [Handle the result](result.md)

---
[Back](index.md)