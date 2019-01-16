## Railken\Amethyst\Validators\FooValidator

The validator is used during any operation that manipulate the data to check if the parameters are correct. Remember that each attribute has is own validation.

#### Extend the class

Create the new validator in `app/Validators/FooValidator`
```php
namespace App\Validators;

use Railken\Amethyst\Validators\FooValidator as Validator;

class FooValidator extends Validator {
	// ...
}
```
Update the file `configs/amethyst.foo` with the new class
```php
return [
    'data' => [
        'foo' => [
            'validator' => App\Validators\FooValidator::class,
        ],
    ]
];
```

---
[Back](index.md)