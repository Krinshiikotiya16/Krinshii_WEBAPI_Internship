<?php

$conn=mysqli_connect("localhost","root","","ajaxdemo");

$q = trim($_GET['q'] ?? '');

if ($q == '')
{
    exit;
}

$q = mysqli_real_escape_string($conn, $q);

$sql = "
SELECT student_id,student_name,course,city FROM students
WHERE student_name LIKE '$q%'
ORDER BY student_name
LIMIT 10
";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{
    while ($row = mysqli_fetch_assoc($result))
    {
        echo "
        <div class='item'
             onclick=\"selectStudent('".$row['student_name']."')\">

            <strong>".$row['student_name']."</strong><br>

            Course : ".$row['course']."<br>

            City : ".$row['city']."

        </div>
        ";
    }
}
else
{
    echo "<div class='item'>No Student Found</div>";
}

mysqli_close($conn);

?>