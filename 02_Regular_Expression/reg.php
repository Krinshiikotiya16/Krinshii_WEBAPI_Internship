<?php

$name = $email = $phone = $pan = $password = "";
$nameErr = $emailErr = $phoneErr = $panErr = $passwordErr = "";
$successMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $valid = true;

    // Name Validation
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $valid = false;
    } else {
        $name = trim($_POST["name"]);

        if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
            $nameErr = "Only letters and spaces allowed";
            $valid = false;
        }
    }

    // Email Validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $valid = false;
    } else {
        $email = trim($_POST["email"]);

        if (!preg_match("/^[\w\.-]+@[\w\.-]+\.\w+$/", $email)) {
            $emailErr = "Invalid email format";
            $valid = false;
        }
    }

    // Indian Mobile Number Validation
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
        $valid = false;
    } else {
        $phone = trim($_POST["phone"]);

        if (!preg_match("/^[6-9]\d{9}$/", $phone)) {
            $phoneErr = "Invalid Indian mobile number";
            $valid = false;
        }
    }

    // PAN Card Validation
    if (empty($_POST["pan"])) {
        $panErr = "PAN Number is required";
        $valid = false;
    } else {
        $pan = strtoupper(trim($_POST["pan"]));

        if (!preg_match("/^[A-Z]{5}[0-9]{4}[A-Z]$/", $pan)) {
            $panErr = "Invalid PAN Number";
            $valid = false;
        }
    }

    // Strong Password Validation
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
        $valid = false;
    } else {
        $password = $_POST["password"];

        $pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/";

        if (!preg_match($pattern, $password)) {
            $passwordErr = "Password must contain uppercase, lowercase, number, special character and be at least 8 characters long.";
            $valid = false;
        }
    }

    // Success
    if ($valid) {
        $successMsg = "Registration Successful!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP Regex Validation Demo</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            margin:40px;
            background:#f5f5f5;
        }

        .container{
            max-width:600px;
            margin:auto;
            background:#fff;
            padding:25px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        h2{
            text-align:center;
        }

        label{
            display:block;
            margin-top:15px;
        }

        input[type=text],
        input[type=password]{
            width:100%;
            padding:10px;
            margin-top:5px;
            box-sizing:border-box;
        }

        .error{
            color:red;
            font-size:14px;
        }

        .success{
            color:green;
            font-weight:bold;
            margin-top:15px;
        }

        input[type=submit]{
            margin-top:20px;
            padding:10px 20px;
            background:#007bff;
            color:white;
            border:none;
            cursor:pointer;
            border-radius:5px;
        }

        input[type=submit]:hover{
            background:#0056b3;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>PHP Regex Validation Form</h2>

    <form method="post">

        <!-- Name -->
        <label>
            Name:
            <input type="text"
                   name="name"
                   value="<?php echo htmlspecialchars($name); ?>">
            <span class="error"><?php echo $nameErr; ?></span>
        </label>

        <!-- Email -->
        <label>
            Email:
            <input type="text"
                   name="email"
                   value="<?php echo htmlspecialchars($email); ?>">
            <span class="error"><?php echo $emailErr; ?></span>
        </label>

        <!-- Mobile -->
        <label>
            Mobile Number:
            <input type="text"
                   name="phone"
                   maxlength="10"
                   value="<?php echo htmlspecialchars($phone); ?>">
            <span class="error"><?php echo $phoneErr; ?></span>
        </label>

        <!-- PAN -->
        <label>
            PAN Number:
            <input type="text"
                   name="pan"
                   maxlength="10"
                   style="text-transform:uppercase;"
                   value="<?php echo htmlspecialchars($pan); ?>">
            <span class="error"><?php echo $panErr; ?></span>
        </label>

        <!-- Password -->
        <label>
            Password:
            <input type="password" name="password">
            <span class="error"><?php echo $passwordErr; ?></span>
        </label>

        <input type="submit" value="Register">

    </form>

    <?php if(!empty($successMsg)) { ?>
        <p class="success"><?php echo $successMsg; ?></p>
    <?php } ?>

</div>

</body>
</html>

