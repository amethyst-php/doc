## Faker

[View source]()

The faker can be used for testing or seeding.

Create a new entity using the faker

```php
use {{ data.components.faker }};

$result = $manager->create({{ data.manager.getName() }}Faker::make()->parameters());
```

---
[Back](index.md)