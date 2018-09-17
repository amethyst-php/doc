### Errors

| Code                           | Message                                      |
|--------------------------------|----------------------------------------------|
{% for error in manager.errors %}| {{ error.code }} | {{ error.message | raw }} |
{% endfor %}