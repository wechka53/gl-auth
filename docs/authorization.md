Authorization API:
====================

**Endpoint**: POST /login

**Available fields**:

  
`"email": "required|email"`   
`"password": "required|min:8"`  
  


**Request Format**:
```json
{
    "email": "artsem.vasileivch@itechart-group.com",
    "password": "secret12345"
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
        "updated_at": "2018-03-21 16:45:05",
        "activated": 1,
        "roles": [
            "user"
        ]
    },
    "meta": {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2dpblwvXC9sb2dpbiIsImlhdCI6MTUyMTY1MTI0MCwiZXhwIjoxNTIxNjU0ODQwLCJuYmYiOjE1MjE2NTEyNDAsImp0aSI6IkxCMTZrWGltY3RLanpZR0wiLCJzdWIiOiJlNjEwNWUxZC0wYjcyLTQxMzUtODg4NS0xMDQ2Y2Y5ODFiMjgiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.CrUkjgxc5giC7dqOXCKBhEDmKSsJvxDbwfDgLJ73FTm1HzNOJnS-PFl_TV5s7AhWEf_0hEbPnjv7jAxJBfSxqnpiQuAMnN7Axud4XFjhibT7yt8Y6zyYRFf60nZJAjS4BM52UYL4BxJRL0kX07OnFjozr9dBcrPZs7N_1BeeCcG-ABEqhlHeeMH5Ky75dSasMKSkmkLCwMlReCWwOlgjh49V4QMoSG8LpCejkVvxKsNCZMJP6LNlrnmFFLwd6uU9rM0m-jRrry5XmX5lKKcjfPdC7OY-wIthiQrA1zhuPKbdN72f2dJ75AzyzNB8b-aYUsC8lpqK1MpCsKiVISgsNzONRG0J-UH_k39UBfa8pgKKbkgkFNELXAUVA66BTD9p7880WyRXmFFrK7Dy7djIyAqKlriDKsU8ONMB9ipZQf1LZiZSkntHT_sB0I8z3z-qrJt2ZOux78gn8ZGDvNHeg_s8Tf-JmwWLO8eB_dKEZUM7zkfgtk1Cz3For5G99qvMg-e5tTLV6CR4JUX_3PmqC9qo5QETaSx_DKmJZo84_yaQwlGaGi8cUXsq6lmWDnGH5gCLCOoJUcUzouNczTRtMQ6LwCXVyQAzuTtmwdwm_acmvDstP-4GlOGOSxmwxxBDThcUgeEQjkQiuloCyPA6juiFZcqVmT9ITaR6SaThd0o"
    }
}
```