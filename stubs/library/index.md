# {{ composer.name() }}

- [Installation](installation.md)
- Data
{% for entity in data %}
    - [{{ entity.manager.getName() }}](entity/{{ entity.manager.getName() }}/index.md)
{% endfor %}