# {{ data.manager.getName() }}

* [Introduction](#introduction)
* [Attributes](#attributes)
* [Model](#model)
* [Create a new entity](#create)
* [Update an entity](#update)
* [Remove an entity](#remove)
* [Handle the result](#result)
* [Querying](#repository)
* [Authorization](#authorization)
* [Schema](#schema)
* [Validator](#validator)
* [Authorizer](#authorizer)
* [Serializer](#serializer)
* [Faker](#faker)
* [Errors](#errors)
* [Permissions](#permissions)

## <a name="introduction"></a>Introduction

To access the data, you can either use the [manager](#manager) or directly the [Eloquent model](#model). 

If you wish to extend any class, remember to update the configuration. 
You can publish the configuration through the command ```php artisan vendor:publish```

Let's first check the list of all attributes

## <a name="attributes"></a>Attributes

| Name | Fillable | Required | Unique | Default | Comment |
|------|----------|----------|--------|---------|---------|
{% for attribute in data.manager.getAttributes() %}{% set default = attribute.getDefault(data.entity)|json_encode %}| {{ attribute.getName() }} | {{ attribute.getFillable() ? "Yes" : "No" }} | {{ attribute.getRequired() ? "Yes" : "No" }} | {{ attribute.getUnique() ? "Yes" : "No" }} | {{ attribute.getFillable() and default ? default : "/" }} | {{ attribute.getComment() | raw }}
{% endfor %}

## <a name="model"></a>Model

Base class ```{{ data.components.model }}```

You can extends the class like the following example in  `app/Models/{{ data.className }}`

```php
namespace App\Models;

use {{ data.components.model }} as Model;

class {{ data.className }} extends Model {
	// ...
}
```
Remember to update the configuration with new class.

## <a name="manager"></a>Manager

Base class ```{{ data.components.manager }}```

The manager is the main class to access and manipulate your model.

Why use the manager instead of the model? Because the manager handle all the boring stuff like validation and authorization for you.
Remember that the manager return always a [Result](#result).

You can extends the class like the following example in `app/Managers/{{ data.className }}Manager`
```php
namespace App\Managers;

use {{ data.components.manager }} as Manager;

class {{ data.className }}Manager extends Manager {
	// ...
}
```
Remember to update the configuration with new class.

## <a name="create"></a>Create a new entity

First you have to define a new instance of the [Manager](#manager)

```php
use {{ data.components.manager }};

$manager = new {{ data.instance_shortname }}();
```
Now you can use the method `create` to create a new a new [entity](#model)

```php
$params = {{ data.parameters_formatted | raw }};

$result = $manager->create($params);
```

Check the result of the operation

```php
if ($result->ok()) {
    // All ok
} else {
    // Something goes wrong
}
```

Retrieve the [entity](#model) from the [result](#result)

```php
$entity = $result->getResource();
```

Throw an exception immediately if the operation fails

```php
use Railken\Lem\Exceptions\Exception;

$params = {{ data.parameters_formatted | raw }};
   
try {
    $result = $manager->createOrFail($params);
} catch (Exception $e) {
    // ...
}
```

## <a name="update"></a>Update 

Define a new instance of the [Manager](#manager)

```php
use {{ data.components.manager }};

$manager = new {{ data.instance_shortname }}();
```

Retrieve an [entity](#model) using the [repository](#repository)


```php
$entity = $manager->getRepository()->findOneById(1);
```

Update an existent [entity](#model)

```php
$params = {{ data.parameters_formatted | raw }};

$result = $manager->update($entity, $params);
```

## <a name="remove"></a>Remove 

Define a new instance of the [Manager](#manager)

```php
use {{ data.components.manager }};

$manager = new {{ data.instance_shortname }}();
```

```php
$entity = $manager->getRepository()->findOneById(1);

$result = $manager->remove($entity);
```

## <a name="result"></a>Result

Once you've got the result you should always check if an error has occurred, if not, retrieve the resource.

```php
use {{ data.components.manager }};

$manager = new {{ data.instance_shortname }}();

$result = $manager->create({{ data.parameters_formatted | raw }});

if ($result->ok()) {

    $resource = $result->getResource();

} else {

    // Loop through all errors
    $result->getErrors()->map(function($error) {
        return $error->toArray();
    }))

    // Retrieve an array of all errors
    $result->getSimpleErrors();

    /* The result is something like this:

        [0] => Array
            (
                [code] => FIELD_NOT_DEFINED
                [label] => field
                [message] => The field is required
                [value] =>
            )
    */

}
```

## <a name="schema"></a>Schema

Base class ```{{ data.components.schema }}```

The schema is used to define the structure of the attributes. All the $attributes in the [model](#model) and in the [manager](#manager) are initialized by the schema.

You can extends the class like the following example in  `app/Schemas/{{ data.className }}Schema`
```php
namespace App\Schemas;

use {{ data.components.schema }} as Schema;

class {{ data.className }}Schema extends Schema {
	// ...
}
```
Remember to update the configuration with new class.

## <a name="repository"></a>Repository

Base class ```{{ data.components.repository }}```

The repository is the class used to perform queries.

```php
use {{ data.components.manager }};

$manager = new {{ data.instance_shortname }}();

$repository = $manager->getRepository();

```

Retrieving an entity

```php
$repository->findOneBy(['id' => 1]);
$repository->findOneById(1);
```

Retrieving all entities

```php
$repository->findAll();
```

Performing a query using \Illuminate\DataBase\Eloquent\Builder

```php
$repository->newQuery()->where('id', 1)->first();
```

You can extends the class like the following example in `app/Repositories/{{ data.className }}Repository`
```php
namespace App\Repositories;

use {{ data.components.repository }} as Repository;

class {{ data.className }}Repository extends Repository {
	// ...
}
```
Remember to update the configuration with new class.

## <a name="serializer"></a>Serializer

Base class ```{{ data.components.serializer }}```

The serializer is used to serialize an entity, you can retrieve it from the data.

```php
use {{ data.components.manager }};

$manager = new {{ data.instance_shortname }}();

$serializer = $manager->getSerializer();
```

And use it so serialize an entity
Retrieving an entity

```php
$entity = $repository->findOneById(1);
$serializer->serialize($entity)->toArray(); // Returns an array
```
You can extends the class like the following example in `app/Serializers/{{ data.className }}Serializer`
```php
namespace App\Serializers;

use {{ data.components.serializer }} as Serializer;

class {{ data.className }}Serializer extends Serializer {
	// ...
}
```
Remember to update the configuration with new class.

## <a name="faker"></a>Faker

Base class ```{{ data.components.faker }}```

The faker can be used for testing or seeding.

Create a new entity using the faker

```php
use {{ data.components.faker }};

$result = $manager->create({{ data.manager.getName() }}Faker::make()->parameters());
```

You can extends the class like the following example in `app/Fakers/{{ data.className }}Faker`
```php
namespace App\Fakers;

use {{ data.components.faker }} as Faker;

class {{ data.className }}Faker extends Faker {
	// ...
}
```
Remember to update the configuration with new class.

## <a name="permissions"></a>Permissions

List of all permissions.

| Code                           |
|--------------------------------|
{% for permission in data.permissions %}| {{ permission }} |
{% endfor %}

## <a name="errors"></a>Errors

List of all errors.

| Code                           | Message                                      |
|--------------------------------|----------------------------------------------|
{% for error in data.errors %}| {{ error.code }} | {{ error.message | raw }} |
{% endfor %}


[Back](../../index.md)