## {{ data.components.authorizer }}

The authorizer is used during any operation that manipulate the data to check if the agent is authorized or not

#### Extend the class

Create the new authorizer in `app/Authorizers/{{ data.className }}Authorizer`
```php
class {{ data.components.authorizer }} as Authorizer;

class {{ data.className }} extends Authorizer {
	// ...
}
```
Update the file `configs/amethyst.{{data.package}}` with the new class
```php
<?php
return [
    'data' => [
        '{{ data.name }}' => [
            'authorizer' => App\Authorizers\{{ data.className}}Authorizer::class,
        ],
    ]
];
```

---
[Back](index.md)