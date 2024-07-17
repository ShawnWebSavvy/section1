<!DOCTYPE html>
<html>
<head>
    <title>Phone Number Generator</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { margin: 20px 0; }
        label { display: block; margin: 10px 0 5px; }
        input { padding: 5px; width: 200px; }
        button { padding: 10px 20px; margin-top: 10px; }
    </style>
</head>
<body>
    <h1>Generate Random Phone Numbers</h1>
    <form action="generate.php" method="POST">
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required><br><br>
        <label for="countryCode">Country Code:</label>
        <input type="text" id="countryCode" name="countryCode" required><br><br>
        <button type="submit">Generate</button>
    </form>
</body>
</html>
