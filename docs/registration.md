Registration Documentation:
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
    "email": "hui@huil.com",
    "password": "secret12345",
    "role": "admin"
}
```

**Response Format**:
```json
{
    "success": true,
    "data": {
        "id": "bb52bf34-6140-4061-b9b4-8d8583fb8cc0",
        "name": "asd",
        "email": "hui@huil.com",
        "created_at": "2017-11-30 10:04:19",
        "updated_at": "2017-11-30 10:04:20",
        "role": "admin"
    },
    "meta": null
}
```