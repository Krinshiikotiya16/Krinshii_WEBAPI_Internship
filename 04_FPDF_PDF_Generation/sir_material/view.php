
<?php

$conn = mysqli_connect("localhost", "root", "", "user");

if(!$conn)
{
    die("Connection Failed");
}

$id = $_GET['id'];

$id = mysqli_real_escape_string($conn, $id);

$sql = "SELECT * FROM receipt WHERE stud_id='$id'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

if(!$row)
{
    die("Receipt Not Found");
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Receipt Verification</title>

<style>

body{
    font-family: Arial;
    margin: 30px;
}

table{
    border-collapse: collapse;
}

td{
    border: 1px solid #cccccc;
    padding: 10px;
}

</style>

</head>

<body>

<h2>Receipt Verification</h2>

<table>

<tr>
    <td>Receipt No</td>
    <td><?php echo $row['rno']; ?></td>
</tr>

<tr>
    <td>Date</td>
    <td><?php echo $row['rdate']; ?></td>
</tr>

<tr>
    <td>Student ID</td>
    <td><?php echo $row['stud_id']; ?></td>
</tr>

<tr>
    <td>Student Name</td>
    <td><?php echo $row['stud_nm']; ?></td>
</tr>

<tr>
    <td>Course Code</td>
    <td><?php echo $row['ccode']; ?></td>
</tr>

<tr>
    <td>Course Name</td>
    <td><?php echo $row['cname']; ?></td>
</tr>

<tr>
    <td>Amount</td>
    <td>Rs. <?php echo $row['amt']; ?></td>
</tr>

</table>

</body>
</html>

<?php

mysqli_close($conn);

?>

