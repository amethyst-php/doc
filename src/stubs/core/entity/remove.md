## Remove

```php

use {{ manager.class }};

$manager = new {{ manager.instance_shortname }}();

$resource = $manager->getRepository()->findOneById(1);

$result = $manager->remove($resource);
```

---
[Back](index.md)