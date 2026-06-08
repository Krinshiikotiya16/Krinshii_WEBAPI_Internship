<?php

$conn =mysqli_connect("localhost","root","", "internshiip");

if(!$conn){
	die("sorry".mysqli_connect_error());
}

$mode = $_GET['Mode'] ?? '';

if($mode == '')
{
    exit;
}

$sql= "Select * from student where Mode ='$mode'";

$res=mysqli_query($conn,$sql);


if(mysqli_num_rows($res)>0)
    {
        echo"<table>";

        echo"<tr>
                <th> Student Name </th>
                <th> Student Email</th>
                <th> Student contact</th>
                <th> Student mode of Learning</th>
            </tr>";
            
        while($row=mysqli_fetch_assoc($res))
            {
               echo"<tr>";

                echo"<td>" .$row ['Stud_name'] ."</td>";
                echo"<td>" .$row ['Email']."</td>";
                echo"<td>" .$row ['Contact']."</td>";
                echo"<td>" .$row ['Mode']."</td>";
                
                echo"</tr>"; 
            }    

        echo"</table>";         
    }
else{
    echo "<h3 style='text-align:center;color:red;'>No Records Found!</h3>";
}    

mysqli_close($conn);

?>