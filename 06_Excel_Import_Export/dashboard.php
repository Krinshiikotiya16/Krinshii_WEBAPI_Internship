<?php
session_start();
$server="localhost";
$user="root";
$pass="";

$conn =mysqli_connect($server,$user,$pass);

if(!$conn){
    die("Oops!sorry".mysqli_connect_error());
}
mysqli_select_db($conn,"internshiip");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
    <style>

        button{
            background:green;
            size:20px;
            border-radius:25px;
    
    
    font-size:13px;
    font-weight:bold;
    padding:12px 40px;
    text-transform:uppercase;
    cursor:pointer;
    margin-top:12px;
    transition:.3s;
        }
    </style>
</head>
<body>

<form action="logout.php" method="POST">
<div class="nav">
    <button type="submit">Log out</button>
</div>
</form>

<?php

  echo" WELCOME!".$_SESSION['slogin'];

?>

</body>
</html>
