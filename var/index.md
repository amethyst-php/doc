# Documentation

- [Installation](installation.md)
- Data
    - [Foo](entity/Foo/index.md)

Test with phpunit:

    ./vendor/bin/phpunit

Install the application:

    php artisan migrate
    php artisan install

Test the index endpoint

    curl -X GET http://localhost:8000/api