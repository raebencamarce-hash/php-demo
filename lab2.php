<!DOCTYPE html>
<html>
<head>
    
    <title>Lab 2- Temperature Converter</title>
</head>
<style>
    .navbar {
        background-color: lightblue;
        padding: 15px;
        text-align: center;
    }

    .navbar a {
        display: inline-block;
        margin: 5px;
        padding: 10px 15px;
        background-color: #5c53e0;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        transition: 0.3s;
    }

    .navbar a:hover {
        background-color: #4d5a88;
        transform: scale(1.05);
    }
    body {
        background-color: lightblue;
        font-family: Arial, sans-serif;
        text-align: center;
    }

    input[type="number"] {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 6px;
        width: 200px;
        text-align: center;
    }

    button[type="submit"] {
        background-color: #5c53e0;
        color: white;
        padding: 10px 18px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 14px;
        transition: 0.3s;
        margin-top: 10px;
    }

    button[type="submit"]:hover {
        background-color: #4d5a88;
        transform: scale(1.05);
    }

    button[type="submit"]:active {
        transform: scale(0.98);
    }

    .result {
        margin: 20px auto;
        padding: 15px;
        border: 2px solid #9baee4;
        border-radius: 10px;
        background-color: #ecf3f5;
        width: 300px;
        box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        font-size: 18px;
        font-weight: bold;
    }
</style>
<body>
<?php include 'index.php'; ?>
    <h1>Temperature Converter</h1>

    <form method="post">
        <label>Enter Celsius:</label>
        <input type="number" name="celsius" step="any" required>
        <button type="submit">Convert to Fahrenheit</button>
    </form>

    <?php

        function celsiusToFahrenheit($celsius) {
            return ($celsius * 9/5) + 32;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $celsius = $_POST["celsius"];

            $fahrenheit = celsiusToFahrenheit($celsius);

            echo "<div class='result'>";
            echo "{$celsius}°C = {$fahrenheit}°F";
            echo "</div>";
        }
    ?>

</body>
</html>