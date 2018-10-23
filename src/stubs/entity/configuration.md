### Configuration

This is a sample configuration. 

Tips:
 * If you want to add some extra attributes: extends the 'schema', extend the 'faker' and add a new laravel migration

```php
return [

    'table'      => '{{ data.components.table }}',
    'comment'    => '{{ data.components.comment }}',
    'model'      => {{ data.components.model }}::class,
    'schema'     => {{ data.components.schema }}::class,
    'repository' => {{ data.components.repository }}::class,
    'serializer' => {{ data.components.serializer }}::class,
    'validator'  => {{ data.components.validator }}::class,
    'authorizer' => {{ data.components.authorizer }}::class,
    'faker'      => {{ data.components.faker }}::class,
    'manager'    => {{ data.components.manager }}::class,
];
```

---
[Back](index.md)