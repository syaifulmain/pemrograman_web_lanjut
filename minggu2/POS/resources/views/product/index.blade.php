<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
</head>

<body>
    <h1>Product Page</h1>
    <h2>Product Category : </h2>
    <ul>
        <li><a href="{{ route('product.food-beverage')}}">Food & Beverage</a></li>
        <li><a href="{{ route('product.beauty-health')}}">Beauty & Health</a></li>
        <li><a href="{{ route('product.home-care')}}">Home Care</a></li>
        <li><a href="{{ route('product.baby-kid')}}">Baby & Kid</a></li>
    </ul>
</body>
