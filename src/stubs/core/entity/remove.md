## Remove 

Sample code

```php

use {{ manager.class }};

$manager = new {{ manager.instance_shortname }}();

$resource = $manager->getRepository()->findOneById(1);

$result = $manager->remove($resource);
```

Links:
* [Errors](errors.md)
* [Performing queries with the Repository](repository.md)
* [Handle the result](result.md)

---
[Back](index.md)