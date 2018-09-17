## Serializer

[View source](https://github.com/{{ manager.package }}/blob/master/src/{{ manager.instance.getName() }}/{{ manager.instance.getName() }}Serializer.php))

The serializer is used to serialize an entity, you can retrieve it from the manager.

```php
use {{ manager.class }};

$manager = new {{ manager.instance_shortname }}();

$serializer = $manager->getSerializer();

```

And use it so serialize an entity
Retrieving an entity

```php
$entity = $repository->findOneById(1);
$serializer->serialize($entity)->toArray(); // Returns an array

```

If you wish to update the serializer, use the config file.
---
[Back](index.md)