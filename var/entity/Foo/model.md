## Railken\Amethyst\Models\Foo

The model extends ```Illuminate\Database\Eloquent\Model``` class.

#### Update the table name
You have to go in the file `configs/amethyst.foo` in order to change the table name.

#### Extend the class

Create the new model in `app/Models/Foo`
```php
namespace App\Models;

use Railken\Amethyst\Models\Foo as Model;

class Foo extends Model {
	// ...
}
```
Update the file `configs/amethyst.foo` with the new class
```php
return [
    'data' => [
        'foo' => [
            'model' => App\Models\Foo::class,
        ],
    ]
];
```

---
[Back](index.md)