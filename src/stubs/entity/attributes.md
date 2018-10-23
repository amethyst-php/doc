## Attributes

List of all attributes

| Name | Fillable | Required | Unique | Default | Comment |
|------|----------|----------|--------|---------|---------|
{% for attribute in data.manager.getAttributes() %}| {{ attribute.getName() }} | {{ attribute.getFillable() ? "Yes" : "No" }} | {{ attribute.getRequired() ? "Yes" : "No" }} | {{ attribute.getUnique() ? "Yes" : "No" }} | {{ attribute.getDefault(data.manager.repository.newEntity() ) }} | {{ attribute.getComment() | raw }} |
{% endfor %}

---
[Back](index.md)