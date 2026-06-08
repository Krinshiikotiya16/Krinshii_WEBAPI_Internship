<?php

$conn = mysqli_connect("localhost","root","","user");

if(!$conn)
{
    die("Connection Failed");
}

$xml = simplexml_load_file("students.xml");

foreach($xml->student as $student)
{
    $id     = $student->id;
    $name   = $student->name;
    $course = $student->course;
    $city   = $student->city;

    $sql = "INSERT INTO students(id,name,course,city)
            VALUES('$id','$name','$course','$city')";

    mysqli_query($conn,$sql);
}

echo "Records Imported Successfully";

?>