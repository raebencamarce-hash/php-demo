<!DOCTYPE html>
<html>
<head>
    <title>Lab 3 - ATM Machine Simulation</title>
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

    input[type="text"],
    input[type="number"],
    select {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 6px;
        width: 200px;
        text-align: center;
        margin: 5px 0;
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
        width: 320px;
        box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        font-size: 18px;
        font-weight: bold;
    }

    h1 {
        color: #333;
    }

    h2, h3 {
        color: #222;
    }
</style>
</head>
<body>
<?php include 'index.php'; ?>
<h1>ATM Machine Simulation</h1>

<!-- FORM -->
<form method="post">
    <label>Account Name:</label><br>
    <input type="text" name="account_name" required><br><br>

    <label>Initial Balance:</label><br>
    <input type="number" name="initial_balance" required><br><br>

    <label>Action:</label><br>
    <select name="action" required>
        <option value="check">Check Balance</option>
        <option value="deposit">Deposit</option>
        <option value="withdraw">Withdraw</option>
    </select><br><br>

    <label>Amount (for Deposit/Withdraw):</label><br>
    <input type="number" name="amount"><br><br>

    <button type="submit" name="submit">Submit</button>
</form>

<hr>

<?php

class ATM {
    private $accountName;
    private $balance;

    public function __construct($accountName, $balance) {
        $this->accountName = $accountName;
        $this->balance = $balance;
    }

    public function getAccountName() {
        return $this->accountName;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function deposit($amount) {
        $this->balance += $amount;
    }

    public function withdraw($amount) {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
            return true;
        }
        return false;
    }
}

if (isset($_POST['submit'])) {

    $name = $_POST['account_name'];
    $balance = (float)$_POST['initial_balance'];
    $action = $_POST['action'];
    $amount = isset($_POST['amount']) ? (float)$_POST['amount'] : 0;

    $atm = new ATM($name, $balance);

echo "<div class='result'>";

echo "<h2>TRANSACTION RESULT</h2>";

// ACCOUNT
echo "<h3>Account: " . $atm->getAccountName() . "</h3>";

// ACTION
if ($action == "deposit") {
    echo "<h3>Action: Deposit of $" . $amount . "</h3>";
} elseif ($action == "withdraw") {
    echo "<h3>Action: Withdrawal of $" . $amount . "</h3>";
} else {
    echo "<h3>Action: Check Balance</h3>";
}

// RESULT
if ($action == "check") {
    echo "<h3>Current Balance: $" . $atm->getBalance() . "</h3>";
} elseif ($action == "deposit") {
    $atm->deposit($amount);
    echo "<h3>New Balance: $" . $atm->getBalance() . "</h3>";
} elseif ($action == "withdraw") {
    if ($atm->withdraw($amount)) {
        echo "<h3>New Balance: $" . $atm->getBalance() . "</h3>";
    } else {
        echo "<h3>Insufficient Balance!</h3>";
        echo "<h3>Current Balance: $" . $atm->getBalance() . "</h3>";
    }
}

echo "</div>";
}

?>

</body>
</html>