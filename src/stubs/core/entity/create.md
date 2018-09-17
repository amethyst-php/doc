## Create


```php
use {{ manager.class }};

$manager = new {{ manager.instance_shortname }}();

$result = $manager->create({{ manager.parameters_formatted | raw }}
);
```

---
[Back](index.md)