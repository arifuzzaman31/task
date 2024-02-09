<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product Notification</title>
</head>

<body>
    <h1>New Product Notification</h1>
    <p>A new product has been created:</p>
    <ul>
        <li><strong>Name:</strong> {{ $product->name }}</li>
        <li><strong>Price:</strong> {{ $product->price }}</li>
        <li><strong>Quantity:</strong> {{ $product->quantity }}</li>
        <!-- Add more product details as needed -->
    </ul>
</body>

</html>