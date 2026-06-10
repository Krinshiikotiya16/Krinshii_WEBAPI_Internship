<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;


$conn =mysqli_connect("localhost","root","","internshiip");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$InputDataFile="userdata.xlsx";
$spreedsheet =IOFactory::load($InputDataFile);
$sheet = $spreedsheet->getActiveSheet();
$rows = $sheet->toArray();

array_shift($rows);

foreach($rows as $row)
    {
        

        $Name =$conn->real_escape_string($row[0]);
        $Username =$conn->real_escape_string($row[1]);
        $Password =$conn->real_escape_string($row[2]);

        $sql= "INSERT INTO usercapcha (`Name`, `Username`, `Password`) VALUES ('$Name','$Username','$Password')
        ON DUPLICATE KEY UPDATE
            Name='$Name', Username ='$Username', Password='$Password'";

        $res=mysqli_query($conn,$sql);
        if(!$res)
            {
                echo"some error";
            }
    }

    echo"Imported succeessfully!";

?>