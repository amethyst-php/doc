## Update 

Define a new instance of the [Manager](manager.md)

```php
use {{ manager.class }};

$manager = new {{ manager.instance_shortname }}();
```

Retrieve an [entity](model.md) using the [repository](repository.md)


```php
$entity = $manager->getRepository()->findOneById(1);
```

Update an existent [entity](model.md)

```php
$result = $manager->update({{ manager.parameters_formatted | raw }});
```

* [Attributes](attributes.md)
* [Errors](errors.md)
* [Performing queries with the Repository](repository.md)
* [Handle the result](result.md)

---
[Back](index.md)