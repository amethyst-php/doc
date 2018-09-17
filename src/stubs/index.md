# Documentation

* Managers
{% for manager in managers %}
	* [Introduction](core/{{ manager.instance.getName() }}/index.md)
	* [Create a new entity](core/{{ manager.instance.getName() }}/create.md)
	* [Update an entity](core/{{ manager.instance.getName() }}/update.md)
	* [Remove an entity](core/{{ manager.instance.getName() }}/remove.md)
	* [Performing queries with the Repository](core/{{ manager.instance.getName() }}/repository.md)
	* [Handle the result](core/{{ manager.instance.getName() }}/result.md)
	* [Permissions](core/{{ manager.instance.getName() }}/permissions.md)
	* [Attributes](core/{{ manager.instance.getName() }}/attributes.md)
	* [Errors](core/{{ manager.instance.getName() }}/errors.md)
	* [Permissions](core/{{ manager.instance.getName() }}/permissions.md)
{% endfor %}

## Managers


{% for manager in managers %}

### {{ manager.instance.getName() }}

{{ manager.comment }}


{% endfor %}




