Registration API:
====================

**Endpoint**: POST /register

**Available fields**:

`"name": "required|max:100"`  
`"email": "required|unique"`  
`"password": "required|min:8"`  
`"role": "admin|user|driver"`  


**Request Format**:
```json
{
  "name": "asd",
  "email": "artsem.vasileivch@itechart-group.com",
  "password": "secret12345",
  "role": "user"
}
```

**Response Format**:
```json
{
    "success": true,
    "data": {
        "id": "38069332-7b98-44ba-b2b0-ab384d0eb92c",
        "name": "asd",
        "email": "artsem.vasileivch@itechart-group.com",
        "created_at": "2018-03-19 12:47:15",
        "updated_at": "2018-03-19 12:47:15",
        "activated": 0,
        "roles": [
            "user"
        ]
    },
    "meta": []
}
```