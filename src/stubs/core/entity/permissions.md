### Permissions

| Code                           |
|--------------------------------|
{% for permission in manager.permissions %}| {{ permission }} |
{% endfor %}