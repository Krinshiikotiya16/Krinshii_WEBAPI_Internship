<?php
session_start();

if(!isset($_SESSION['captcha']))
{
    $_SESSION['captcha'] = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZ123456789"),0,5);
}

$server="localhost";
$user="root";
$pass="";

$conn =mysqli_connect($server,$user,$pass);

if(!$conn){
    die("Oops!sorry".mysqli_connect_error());
}
mysqli_select_db($conn,"internshiip");

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if($_POST['captcha'] != $_SESSION['captcha'])
    {
        echo "<script>alert('Invalid Captcha!')</script>";
    }
    else{

    
    $name=$_POST["Username"];
    $pass=$_POST["Password"];

    $sql="Select * from usercapcha where Username= '$name' and Password='$pass'";
    $res=mysqli_query($conn,$sql);

    if(mysqli_num_rows($res)>0){

        $row = mysqli_fetch_assoc($res);
        $_SESSION['slogin'] = $row['Name'];
        header("location:dashboard.php");
    }
    else{
        echo "<script>alert ('Invalid UserID and Password!')</script>";
    }
    }
    $_SESSION['captcha'] = substr(str_shuffle("ABCDEFGHJKLMNPQRSTUVWXYZ123456789"),0,5);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #aecbf7 0%, #c3cfe2 100%);
        }
        .login-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        .login-container h2 {
            margin-bottom: 24px;
            color: #333333;
            text-align: center;
            font-size: 28px;
        }
        .input-group {
            margin-bottom: 20px;
        }
        .input-group label {
            display: block;
            margin-bottom: 8px;
            color: #666666;
            font-size: 14px;
        }
        .input-group input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #cccccc;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            outline: none;
        }
        .input-group input:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
        }
        .login-btn {
            width: 100%;
            padding: 12px;
            background-color: #4a90e2;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }
        .login-btn:hover {
            background-color: #357abd;
        }
        
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Captcha code</h2>
        <form action="#" method="POST">
            <div class="input-group">
                <label for="text">UserName</label>
                <input type="text" id="username" name="Username">
            </div>
            
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="Password">
            </div>

            <div class="input-group">
    <label>Captcha</label>

    <div style="
        background:#eee;
        padding:10px;
        font-size:25px;
        letter-spacing:5px;
        text-align:center;
        margin-bottom:10px;">
        <?php echo $_SESSION['captcha']; ?>
    </div>

    <input type="text" name="captcha" placeholder="Enter captcha">
    </div>

            <button type="submit" class="login-btn">Sign In</button>
        </form>

       
    </div>

</body>
</html>