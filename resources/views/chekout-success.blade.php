<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Success</title>
</head>
<body class="antialiased">
    <h1>Success</h1>
    @if(isset($customer))
        <p>Customer Name: {{ $customer->name }}</p>
    @else
        <p>Customer information not available.</p>
    @endif
</body>
</html>
