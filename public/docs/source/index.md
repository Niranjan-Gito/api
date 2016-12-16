---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)
<!-- END_INFO -->

#Address

Get the Address details
<!-- START_ea841e9c1e43263fd23c992e6bc674b2 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl "http://api.gito-me.app/v1/address" \
-H "Accept: application/json" \
    -d "alpha_street"="at" \
    -d "beta_street"="at" \
    -d "city"="at" \
    -d "state"="at" \
    -d "country"="at" \
    -d "zipcode"="90067344" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.gito-me.app/v1/address",
    "method": "POST",
    "data": {
        "alpha_street": "at",
        "beta_street": "at",
        "city": "at",
        "state": "at",
        "country": "at",
        "zipcode": 90067344
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST v1/address`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    alpha_street | string |  required  | Allowed: alpha-numeric characters, as well as dashes and underscores.
    beta_street | string |  required  | Allowed: alpha-numeric characters, as well as dashes and underscores.
    city | string |  required  | Only alphabetic characters allowed
    state | string |  required  | Only alphabetic characters allowed
    country | string |  required  | Only alphabetic characters allowed
    zipcode | numeric |  required  | 

<!-- END_ea841e9c1e43263fd23c992e6bc674b2 -->
<!-- START_648dc48929a14e28ca012fd55cdce810 -->
## Display the specified resource.

> Example request:

```bash
curl "http://api.gito-me.app/v1/address/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.gito-me.app/v1/address/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "message": "Unauthenticated.",
    "status": 400
}
```

### HTTP Request
`GET v1/address/{id}`

`HEAD v1/address/{id}`


<!-- END_648dc48929a14e28ca012fd55cdce810 -->
<!-- START_79445901be23cff5d35a21b931ef75c5 -->
## Display a listing of the resource.

> Example request:

```bash
curl "http://api.gito-me.app/v1/address" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.gito-me.app/v1/address",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "message": "Unauthenticated.",
    "status": 400
}
```

### HTTP Request
`GET v1/address`

`HEAD v1/address`


<!-- END_79445901be23cff5d35a21b931ef75c5 -->
#Page

Get the All the static pages details
<!-- START_04e74c42684357345fa298e5e6daea68 -->
## Get the all the pages details

This can be an optional longer description of your API call, used within the documentation.

> Example request:

```bash
curl "http://api.gito-me.app/v1/pages" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.gito-me.app/v1/pages",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": "client_missing",
    "status": 404,
    "title": "The server cannot or will not process the request due to something that is perceived to be a client error.",
    "detail": "Your request had an error. Please try again with 'clint_id' and 'client_secret'."
}
```

### HTTP Request
`GET v1/pages`

`HEAD v1/pages`


<!-- END_04e74c42684357345fa298e5e6daea68 -->
<!-- START_ea912065f947a873cd9a5c02fdaa8c71 -->
## Get the single page by passing the page slug

This can be an optional longer description of your API call, used within the documentation.

> Example request:

```bash
curl "http://api.gito-me.app/v1/pages/{slug}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.gito-me.app/v1/pages/{slug}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": "client_missing",
    "status": 404,
    "title": "The server cannot or will not process the request due to something that is perceived to be a client error.",
    "detail": "Your request had an error. Please try again with 'clint_id' and 'client_secret'."
}
```

### HTTP Request
`GET v1/pages/{slug}`

`HEAD v1/pages/{slug}`


<!-- END_ea912065f947a873cd9a5c02fdaa8c71 -->
#User

Get the user details

?include=address:limit(5|1):order(created_at|desc)
<!-- START_7bd54b11841f8fc6b89028e1879145bc -->
## Display a listing of the resource.

is can be an optional longer description of your API call, used within the documentation.

> Example request:

```bash
curl "http://api.gito-me.app/v1/user" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.gito-me.app/v1/user",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "name": "admin",
        "email": "dileep@costprize.com",
        "phone": "9535029409",
        "gravatar": "http:\/\/www.gravatar.com\/avatar\/b5b0e8a6f95c551d18151ae9e2fab5cd?d=identicon&s=40",
        "created": "17\/06\/13 14:25:56",
        "updated": "17\/06\/13 14:25:56"
    }
}
```

### HTTP Request
`GET v1/user`

`HEAD v1/user`


<!-- END_7bd54b11841f8fc6b89028e1879145bc -->
<!-- START_7b31d0c9ab1ff57a8c35ae26a90a16d3 -->
## Update the specified resource in storage.

> Example request:

```bash
curl "http://api.gito-me.app/v1/user" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.gito-me.app/v1/user",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST v1/user`


<!-- END_7b31d0c9ab1ff57a8c35ae26a90a16d3 -->
#general
<!-- START_5190332d9ef1237235978358b20394c2 -->
## Display a listing of the resource.

> Example request:

```bash
curl "http://api.gito-me.app/v1/vendors" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.gito-me.app/v1/vendors",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": "client_missing",
    "status": 404,
    "title": "The server cannot or will not process the request due to something that is perceived to be a client error.",
    "detail": "Your request had an error. Please try again with 'clint_id' and 'client_secret'."
}
```

### HTTP Request
`GET v1/vendors`

`HEAD v1/vendors`


<!-- END_5190332d9ef1237235978358b20394c2 -->
<!-- START_3c678dd194c3cd5a059205daeaa2fdad -->
## Display a vendor by slug of the resource.

> Example request:

```bash
curl "http://api.gito-me.app/v1/vendors/{slug}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://api.gito-me.app/v1/vendors/{slug}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "id": "client_missing",
    "status": 404,
    "title": "The server cannot or will not process the request due to something that is perceived to be a client error.",
    "detail": "Your request had an error. Please try again with 'clint_id' and 'client_secret'."
}
```

### HTTP Request
`GET v1/vendors/{slug}`

`HEAD v1/vendors/{slug}`


<!-- END_3c678dd194c3cd5a059205daeaa2fdad -->
