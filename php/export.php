<?php
require('../fpdf186/fpdf.php');
include 'config.php';

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Employee Data Export', 0, 1, 'C');
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}


$pdf = new PDF('L', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

$sql = "SELECT * FROM employees";
$result = $conn->query($sql);


$widths = array(5, 50, 40, 70, 60, 30, 20, 30);

$pdf->Cell($widths[0], 10, 'ID', 1);
$pdf->Cell($widths[1], 10, 'Name', 1);
$pdf->Cell($widths[2], 10, 'Phone', 1);
$pdf->Cell($widths[3], 10, 'Email', 1);
$pdf->Cell($widths[4], 10, 'Address', 1);
$pdf->Cell($widths[5], 10, 'Salary', 1);
$pdf->Cell($widths[6], 10, 'Age', 1);
$pdf->Cell($widths[7], 10, 'Role', 1);
$pdf->Ln();

while ($row = $result->fetch_assoc()) {
    $pdf->Cell($widths[0], 10, $row['id'], 1);
    $pdf->Cell($widths[1], 10, $row['name'], 1);
    $pdf->Cell($widths[2], 10, $row['phone'], 1);
    $pdf->Cell($widths[3], 10, $row['email'], 1);
    $pdf->Cell($widths[4], 10, $row['address'], 1);
    $pdf->Cell($widths[5], 10, $row['salary'], 1);
    $pdf->Cell($widths[6], 10, $row['age'], 1);
    $pdf->Cell($widths[7], 10, $row['role'], 1);
    $pdf->Ln();
}

$pdf->Output('D', 'employee_data.pdf');
?>
