## Remove 

Define a new instance of the [Manager](manager.md)

```php
use {{ manager.class }};

$manager = new {{ manager.instance_shortname }}();
```

```php
$entity = $manager->getRepository()->findOneById(1);

$result = $manager->remove($entity);
```

Links:
* [Errors](errors.md)
* [Performing queries with the Repository](repository.md)
* [Handle the result](result.md)

---
[Back](index.md)