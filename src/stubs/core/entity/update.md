### Update

```php
use {{ manager.class }};

$manager = new {{ manager.instance_shortname }}();

$address = $dm->getRepository()->findOneById(1);

$result = $dm->update({{ manager.parameters_formatted | raw }}
);


```