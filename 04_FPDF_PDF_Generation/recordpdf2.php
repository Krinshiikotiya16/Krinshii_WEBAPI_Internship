<?php
require('fpdf.php');


// Database connection
$conn = mysqli_connect("localhost","root","","user");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM receipt ORDER BY amt DESC"; 
$res = mysqli_query($conn,$sql);

//pdf creation
$pdf = new FPDF('P','mm','A4');
$pdf->SetAutoPageBreak(true,10);
$pdf->AddPage('P');



$pdf->SetFont('Times','U',20);
$pdf->Cell(0,10,'Student Receipt Report',0,1,'C');
$pdf->Image('image/title.jpg', 10, 12, 55, 12);
$pdf->Ln(10);


function HeaderTable($pdf)
{

//add header
        //cc true for color
        $pdf->SetFont('Arial','B',6);
        $pdf->SetFillColor(0,0,0);     
        $pdf->SetTextColor(255,255,255); 
        $pdf->SetDrawColor(170,200,170);
        

        $pdf->Cell(20,3,"Receipt No",1,0,'C',true);
        $pdf->Cell(20,3,"Receipt Date",1,0,'C',true);
        $pdf->Cell(25,3,"Student ID",1,0,'C',true);
        $pdf->Cell(40,3,"Student Name",1,0,'C',true);
        $pdf->Cell(20,3,"Course Code",1,0,'C',true);
        $pdf->Cell(45,3,"Course Name",1,0,'C',true);
        $pdf->Cell(20,3,"Amount",1,0,'C',true);
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
            $pdf->SetFont('Arial','',6);
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

            

            $pdf->Cell(20,4,$row['rno'],1,0,'C',true);
            $pdf->Cell(20,4,$row['rdate'],1,0,'C',true);
            $pdf->Cell(25,4,$row['stud_id'],1,0,'C',true);
            $pdf->SetFont('Arial','B',6);
            $pdf->Cell(40,4,$row['stud_nm'],1,0,'C',true);
            $pdf->SetFont('Arial','',6);
            $pdf->Cell(20,4,$row['ccode'],1,0,'C',true);
            $pdf->Cell(45,4,$row['cname'],1,0,'C',true);
            $pdf->Cell(20,4,$row['amt'],1,0,'C',true);
            $pdf->Ln();

            $i++;
        }
    }

    $pdf->Ln(30);
    $pdf->SetFont('Arial','I',20);
    $pdf->Cell(0,10,'******** End of Report ********',0,1,'C');
//output
$pdf->Output();
?>
 