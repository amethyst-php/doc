### Configuration

This is a sample configuration.

If you wish to add some extra attributes please consider using the 'attributes' key config. A database migration would still be required.

```php
return [
    /*
    |--------------------------------------------------------------------------
    | Table Name
    |--------------------------------------------------------------------------
    |
    | This is the table name used while interacting with the database
    |
    */
    'table' => '{{ manager.entity.getTable() }}',

    /*
    |--------------------------------------------------------------------------
    | Class Entity
    |--------------------------------------------------------------------------
    |
    | The class of the model used by the manager.
    | Change this if you have to add more relations or custom logic.
    | The attribute $fillable is already updated by the config 'attributes'.
    |
    */
    'entity' => Railken\LaraOre\Core\{{ manager.instance.getName() }}\{{ manager.instance.getName() }}::class,

    /*
    |--------------------------------------------------------------------------
    | Class Manager
    |--------------------------------------------------------------------------
    |
    | The class of the manager used to perform all actions by the Controller.
    | Change this if you have to add more complex actions (.e.g. ::create).
    | The attribute $attributes is already updated by the config 'attributes'.
    |
    */
    'manager' => Railken\LaraOre\Core\{{ manager.instance.getName() }}\{{ manager.instance.getName() }}Manager::class,

    /*
    |--------------------------------------------------------------------------
    | Class Repository
    |--------------------------------------------------------------------------
    |
    | The class of the repository used to perform all queries.
    | Change this if you have to add more complex queries (e.g. ::findOneBy).
    |
    */
    'repository' => Railken\LaraOre\Core\{{ manager.instance.getName() }}\{{ manager.instance.getName() }}Repository::class,

    /*
    |--------------------------------------------------------------------------
    | Class Serializer
    |--------------------------------------------------------------------------
    |
    | The class of the serializer used to serialize the model.
    | Change this if you have to add more data while serializing.
    | All the attributes of the manager are already included in the serializer.
    |
    */
    'serializer' => Railken\LaraOre\Core\{{ manager.instance.getName() }}\{{ manager.instance.getName() }}Serializer::class,

    /*
    |--------------------------------------------------------------------------
    | Class Validator
    |--------------------------------------------------------------------------
    |
    | The class of the validator used to validate the parameters.
    | Change this if you have to add more complex validation.
    | A validation handled by the single attributes is always preferred to this.
    |
    */
    'validator' => Railken\LaraOre\Core\{{ manager.instance.getName() }}\{{ manager.instance.getName() }}Validator::class,

    /*
    |--------------------------------------------------------------------------
    | Class Authorizer
    |--------------------------------------------------------------------------
    |
    | The class of the authorizer used to authorize the user.
    | Change this if you have to add more complex authorization.
    |
    */
    'authorizer' => Railken\LaraOre\Core\{{ manager.instance.getName() }}\{{ manager.instance.getName() }}Authorizer::class,
    
    /*
    |--------------------------------------------------------------------------
    | Extra Attributes
    |--------------------------------------------------------------------------
    |
    | Here you may add all the extra attributes needed.
    | Theese attributes will be added in the Model, Manager and Controller.
    | A new migration is still required to update the database.
    |
    */
    'attributes' => [
    ],
];
```

---
[Back](index.md)