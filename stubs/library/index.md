
# {{ composer.name() }}

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin non dui nec ante elementum luctus. Pellentesque tempus ex eget auctor convallis. Fusce vehicula ac nibh a malesuada. Aenean facilisis ultricies dolor, in euismod ante rhoncus eget. Vivamus interdum nibh in nibh luctus ornare. Vestibulum quis imperdiet magna, vel imperdiet sem. Nunc id ligula lorem. Etiam eleifend nisl in lobortis placerat. Donec ac sem nec mi accumsan lacinia. Vestibulum feugiat leo justo, ac placerat lorem placerat et. Vestibulum lobortis nibh diam, eu aliquam nisi dignissim et. Donec at metus pharetra, lacinia nisi vel, euismod nibh. 

# Installation

You can install it via [Composer](https://getcomposer.org/) by typing the following command:

```bash
composer require {{ composer.name() }}
```

# Data

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin non dui nec ante elementum luctus. Pellentesque tempus ex eget auctor convallis. Fusce vehicula ac nibh a malesuada. Aenean facilisis ultricies dolor, in euismod ante rhoncus eget. Vivamus interdum nibh in nibh luctus ornare. Vestibulum quis imperdiet magna, vel imperdiet sem. Nunc id ligula lorem. Etiam eleifend nisl in lobortis placerat. Donec ac sem nec mi accumsan lacinia. Vestibulum feugiat leo justo, ac placerat lorem placerat et. Vestibulum lobortis nibh diam, eu aliquam nisi dignissim et. Donec at metus pharetra, lacinia nisi vel, euismod nibh. 

{% for entity in data %}
   <img src="https://image.flaticon.com/icons/svg/1055/1055646.svg" width='150' align='top'>

   [{{ entity.manager.getName() }}](entity/{{ entity.manager.getName() }}/index.md)

{% endfor %}

# Api

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin non dui nec ante elementum luctus. Pellentesque tempus ex eget auctor convallis. Fusce vehicula ac nibh a malesuada. Aenean facilisis ultricies dolor, in euismod ante rhoncus eget. Vivamus interdum nibh in nibh luctus ornare. Vestibulum quis imperdiet magna, vel imperdiet sem. Nunc id ligula lorem. Etiam eleifend nisl in lobortis placerat. Donec ac sem nec mi accumsan lacinia. Vestibulum feugiat leo justo, ac placerat lorem placerat et. Vestibulum lobortis nibh diam, eu aliquam nisi dignissim et. Donec at metus pharetra, lacinia nisi vel, euismod nibh. 

{% for entity in data %}
   - [{{ entity.manager.getName() }}](entity/{{ entity.manager.getName() }}/index.md)
{% endfor %}