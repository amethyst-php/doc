## Faker

[View source](https://github.com/{{ manager.package }}/blob/master/src/{{ manager.instance.getName() }}/{{ manager.instance.getName() }}Faker.php)

The faker can be used for testing or seeding.

Create a new entity using the faker

```php

use Railken\LaraOre\Core\{{ manager.instance.getName() }}\{{ manager.instance.getName() }}Faker;

$result = $manager->create({{ manager.instance.getName() }}Faker::make()->parameters());
```

---
[Back](index.md)