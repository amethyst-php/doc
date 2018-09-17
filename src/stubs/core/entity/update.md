## Update 

Define a new instance of the [Manager](https://github.com/{{ manager.package }}/blob/master/src/{{ manager.instance.getName() }}/{{ manager.instance.getName() }}Manager.php)

```php
use {{ manager.class }};

$manager = new {{ manager.instance_shortname }}();
```

Retrieve an [entity](https://github.com/{{ manager.package }}/blob/master/src/{{ manager.instance.getName() }}/{{ manager.instance.getName() }}.php) using the [repository](https://github.com/{{ manager.package }}/blob/master/src/{{ manager.instance.getName() }}/{{ manager.instance.getName() }}Repository.php))


```php
$entity = $manager->getRepository()->findOneById(1);
```

Update an existent [resource](https://github.com/{{ manager.package }}/blob/master/src/{{ manager.instance.getName() }}/{{ manager.instance.getName() }}.php))

```php
$result = $manager->update({{ manager.parameters_formatted | raw }});
```

* [Attributes](attributes.md)
* [Errors](errors.md)
* [Performing queries with the Repository](repository.md)
* [Handle the result](result.md)

---
[Back](index.md)