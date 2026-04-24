<!DOCTYPE html>
<html>
<head>

    <title>Lab 1 - Favorite Fruits</title>

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
        input[type="submit"] {
            background-color: #5c53e0;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #4d5a88;
            transform: scale(1.05);
        }

        input[type="submit"]:active {
            transform: scale(0.98);
        }

        ul {
            list-style-type: none; 
            padding: 0;
            margin: 0;
        }

        .fruit-result {
            margin: 20px auto;
            padding: 15px;
            border: 2px solid #9baee4;
            border-radius: 10px;
            background-color: #ecf3f5;
            width: 300px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>
  <?php include 'index.php'; ?>
<h2>My Favorite Fruits</h2>

<form method="post">
    Fruit 1: <input type="text" name="fruits[]"><br><br>
    Fruit 2: <input type="text" name="fruits[]"><br><br>
    Fruit 3: <input type="text" name="fruits[]"><br><br>
    Fruit 4: <input type="text" name="fruits[]"><br><br>
    Fruit 5: <input type="text" name="fruits[]"><br><br>

    <input type="submit" value="Submit">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fruits = $_POST['fruits'];

    echo "<div class='fruit-result'>";

    echo "<h3>Your Favorite Fruits:</h3>";
    echo "<ul>";

    foreach ($fruits as $fruit) {
        echo "<li>$fruit</li>";
    }

    echo "</ul>";

    echo "<h3>Your favorite fruit is: $fruits[0]</h3>";

    echo "</div>";
}
?>

</body>
</html>