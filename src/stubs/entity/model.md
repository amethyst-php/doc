## {{ data.components.model }}

The model extends ```Illuminate\Database\Eloquent\Model``` class.

#### Extend the class

Create the new model in `app/Models/{{ data.className }}`
```php
class {{ data.components.model }} as Model;

class {{ data.className }} extends Model {
	// ...
}
```
Update the file `configs/amethyst.{{data.package}}` with the new class
```php
<?php
return [
    'data' => [
        '{{ data.name }}' => [
            'model' => App\Models\{{ data.className}}::class,
        ],
    ]
];
```

---
[Back](index.md)