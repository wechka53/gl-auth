Activation API:
====================

**Endpoint**: POST /activate

**Available fields**:

  
`"id": "required|uuid"`   
`"token": "required|string"`  
  


**Request Format**:
```json
{
  "id": "f55eb250-44e4-493e-99d3-bb51c43d6f80",
  "token": "c2b34e90abc7895bea1c64c9e9a261b5f75059b0599f17804785a3300cfb785e"
}
```

**Response Format**:
```json
{
    "success": true,
    "data": {
        "id": "e6105e1d-0b72-4135-8885-1046cf981b28",
        "name": "asd",
        "email": "artsem.vasileivch@itechart-group.com",
        "created_at": "2018-03-21 16:45:04",
        "updated_at": "2018-03-21 16:59:11",
        "activated": true,
        "roles": [
            "user"
        ]
    },
    "meta": null
}
```