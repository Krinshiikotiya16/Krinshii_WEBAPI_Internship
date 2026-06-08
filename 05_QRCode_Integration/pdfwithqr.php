<?php
require('fpdf.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "phpqrcode/qrlib.php";


// Database connection
$conn = mysqli_connect("localhost","root","","user");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM receipt ORDER BY amt DESC"; 
$res = mysqli_query($conn,$sql);

$top = mysqli_fetch_assoc($res);

$data =
"Receipt No: ".$top['rno'].
"\nStudent ID: ".$top['stud_id'].
"\nStudent Name: ".$top['stud_nm'].
"\nCourse Code: ".$top['ccode'].
"\nCourse Name: ".$top['cname'].
"\nAmount: ".$top['amt'];

QRcode::png($data, "topstudent.png");

mysqli_data_seek($res,0);

//pdf creation
$pdf = new FPDF('L','mm','A4');
$pdf->SetAutoPageBreak(true,10);
$pdf->AddPage('L');

$pdf->Image("topstudent.png", 240, 5, 30, 30);
$pdf->Ln(10);



$pdf->SetFont('Times','U',25);
$pdf->Cell(0,10,'Student Receipt Report',0,1,'C');
$pdf->Image('image/title.jpg', 10, 12, 55, 12);
$pdf->Ln(10);


function HeaderTable($pdf)
{

//add header
        //cc true for color
        $pdf->SetFont('Arial','B',10);
        $pdf->SetFillColor(0,0,0);     
        $pdf->SetTextColor(255,255,255); 
        $pdf->SetDrawColor(170,200,170);
        

        $pdf->Cell(28,20,"Receipt No",1,0,'C',true);
        $pdf->Cell(28,20,"Receipt Date",1,0,'C',true);
        $pdf->Cell(30,20,"Student ID",1,0,'C',true);
        $pdf->Cell(55,20,"Student Name",1,0,'C',true);
        $pdf->Cell(30,20,"Course Code",1,0,'C',true);
        $pdf->Cell(60,20,"Course Name",1,0,'C',true);
        $pdf->Cell(30,20,"Amount",1,0,'C',true);
        $pdf->Ln();
}
HeaderTable($pdf);        


//data fetch
    if ($res->num_rows > 0) {
         $i=1;
        while($row = mysqli_fetch_assoc($res))
        {
             if($pdf->GetY() > 180)
            {
                $pdf->AddPage();
                HeaderTable($pdf);
            
            }    
            $pdf->SetTextColor(0,0,0);

    
            //css
            $pdf->SetFont('Arial','',10);
            if($i % 2 == 0)
            {
                // Even row = light grey
                $pdf->SetFillColor(230,230,230);
            }
            else
            {
                // Odd row = white
                $pdf->SetFillColor(255,255,255);
            }

            

            $pdf->Cell(28,10,$row['rno'],1,0,'C',true);
            $pdf->Cell(28,10,$row['rdate'],1,0,'C',true);
            $pdf->Cell(30,10,$row['stud_id'],1,0,'C',true);
            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(55,10,$row['stud_nm'],1,0,'C',true);
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(30,10,$row['ccode'],1,0,'C',true);
            $pdf->Cell(60,10,$row['cname'],1,0,'C',true);
            $pdf->Cell(30,10,$row['amt'],1,0,'C',true);
            $pdf->Ln();

            $i++;
        }
    }

    $pdf->Ln(30);
    $pdf->SetFont('Arial','I',25);
    $pdf->Cell(0,10,'******** End of Report ********',0,1,'C');
//output
$pdf->Output();
?>
 