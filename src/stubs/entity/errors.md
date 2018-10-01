### Errors

List of all errors.

| Code                           | Message                                      |
|--------------------------------|----------------------------------------------|
{% for error in manager.errors %}| {{ error.code }} | {{ error.message | raw }} |
{% endfor %}

---
[Back](index.md)