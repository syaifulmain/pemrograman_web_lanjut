<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
</head>

<body>
    <h1>User Page</h1>
    <h1>Name   : {{$name}}</h1>
    <h1>ID     : {{$id}}</h1>
</body>
