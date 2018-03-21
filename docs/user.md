User API:
====================

**Endpoint**: GET /users (Auth required)

**Available get params**:

`"limit": "number"`  
`"offset": "number"`

**Response Format**:
```json
{
    "success": true,
    "data": [
        {
            "id": "00050389-2924-42d2-8dbe-1723acec98fd",
            "name": "Dr. Chanel Dicki II",
            "email": "tomasa38@example.com",
            "created_at": "2018-03-21 16:01:42",
            "updated_at": "2018-03-21 16:01:42",
            "activated": 1,
            "roles": [
                "driver"
            ]
        },
        {
            "id": "0005cadc-b1de-4936-a574-99a3f8052877",
            "name": "Myrtie Hand",
            "email": "gerard20@example.net",
            "created_at": "2018-03-21 16:03:13",
            "updated_at": "2018-03-21 16:03:13",
            "activated": 1,
            "roles": [
                "driver"
            ]
        },
        {
            "id": "000b90df-a99d-436c-b1a2-a6305b1c1189",
            "name": "Pasquale Renner",
            "email": "eichmann.asia@example.net",
            "created_at": "2018-03-21 16:02:28",
            "updated_at": "2018-03-21 16:02:28",
            "activated": 1,
            "roles": [
                "driver"
            ]
        },
        {
            "id": "001103ee-ccee-422e-be12-5d2eef88d579",
            "name": "Sven Murray Sr.",
            "email": "yvolkman@example.net",
            "created_at": "2018-03-21 16:03:01",
            "updated_at": "2018-03-21 16:03:01",
            "activated": 1,
            "roles": [
                "user"
            ]
        },
        {
            "id": "00123e69-5c28-4de6-b04b-b5378e306b12",
            "name": "Dana Witting DDS",
            "email": "marcella68@example.net",
            "created_at": "2018-03-21 16:01:40",
            "updated_at": "2018-03-21 16:01:40",
            "activated": 1,
            "roles": [
                "user"
            ]
        }
    ],
    "meta": {
        "results": 5,
        "total": 15017,
        "limit": "5",
        "offset": "0"
    }
}
```