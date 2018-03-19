Authorization Documentation:
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
    "data": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjFcL2xvZ2luIiwiaWF0IjoxNTE3NTAzMzY2LCJleHAiOjE1MTc1MDY5NjYsIm5iZiI6MTUxNzUwMzM2NiwianRpIjoiQk1pcVU5b2t2ZFhhOGthdSIsInN1YiI6ImIwZGQ0YTlhLTA1MjEtNDU5OC1iMmFiLTg1NTAwMDQxNDU2NSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.D2CFd2_pv3CjrBxt38NeQlw8DLKg0QfSQzLkNVDhXnrXtEBWx_yWfhEg-GiBtYS5CaAMclVquOb-BzUiL95KJOr3p-580Yg95twoi_8hwFiZfBQBBvnM4J4HwA5cIEm6_a7D8KUdOETzUlD2-yMeoSA1A1NSJ2oOfvzjolEaOEtjeWioHr14lBjb9l1PF7doya-aFjhw_rNoOtdBnYjqSFeMcBR49kpQLwdBe_6jyx0cOYgThZPO2keW7wja9pL_PKI9csJm-z0mRDodbVXi05JQuPPxwmN3nNFx5wa8jenQk8vENZnrOpiHWmyD9vAflk71piG8RWzCsWQlHTGr9AzCu7fFu69xiompw-4D7U9gL8FTIQg0QvfWlACvPuj28FGGp4xMTIQRscdZm2rmXoHkN-0oVyCs-n1MMxhy0Ps9cPKElsXE8RLbuIgJU2j_4lK878s92YGXZ5oz0wL0sYLtYqi8_zilJgRRZg57YM77C9CQ-VRD18mJ2yb7FHSfiG6yUOy-xpOqK6Xlop2srrIde-5yvcrK5DCrttX-_a2x2Tb4XWszxvw8qpwAiEnc0t5Lpt-wKQ2NML-KT5dA3OPsfn6L9wbbt33D1jzZR92cLNHLMGdycbCtizt1vjdaz3vV5BU7AA1G5OMqAjnTdKz1-dAOgJQyB3jxu_HcUTY",
    "meta": null
}
```