<?php
require_once "../../fpdf/fpdf.php";
require_once "../../db_connect.php";

class myPDF extends FPDF
{
	function header()
	{
		$this->Image('../../images/logo1.png', 115, 5);
		$this->SetFont('Arial', 'B', 14);
		$this->Cell(276, 50, 'REPORT FEES BY MONTH', 0, 0, 'C');
		$this->Ln();
		$this->SetFont('Times', '', 12);
		$this->Ln(1);

		// $this->Cell(276, 10, 'Fees Type : '.$feesType , 0, 0, 'C');
	}
	function footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial', '', 8);
		$this->Cell(0, 10, 'Page' . $this->PageNo() . '/{nb}', 0, 0, 'C');
	}
	function headerTable()
	{

		$this->SetFont('Times', 'B', 12);
		$this->Cell(10, 10, 'No', 1, 0, 'C');
		$this->Cell(60, 10, 'Matric No', 1, 0, 'C');
		$this->Cell(130, 10, 'Name', 1, 0, 'C');
		$this->Cell(30, 10, 'Amount', 1, 0, 'C');
		$this->Cell(50, 10, 'Paid Date', 1, 0, 'C');
		$this->Ln();
	}
	function viewTable($conn)
	{
		$this->SetFont('Times', '', 12);
		$sql = "SELECT fees.feesEvidence,fees.feesType,fees.feesAmount,fees.feesDate,member.memberName,member.memberMatricID,member.dateJoined FROM fees INNER JOIN member ON fees.memberMatricID=member.memberMatricID";
		$query = mysqli_query($conn, $sql);
		$i = 1;

		$month = $_GET['month'];
		$type = $_GET['fees'];
		$year = $_GET['year'];
		foreach ($query as $row) {
			$dateComps = date_parse($row['feesDate']);
			$year2 = $dateComps['year'];
			$month2 = $dateComps['month'];

			if ($type == $row['feesType'] && $year == $year2 && $month == $month2) {
				$this->Cell(10, 10, $i, 1, 0, 'C');
				$this->Cell(60, 10, $row['memberMatricID'], 1, 0, 'C');
				$this->Cell(130, 10, $row['memberName'], 1, 0, 'C');
				$this->Cell(30, 10, $row['feesAmount'], 1, 0, 'C');
				$this->Cell(50, 10, $row['feesDate'], 1, 0, 'C');
				$this->Ln();
				$i++;
			}
		}
	}
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
$pdf->Ln(10);
$pdf->Cell(276, -30, $_GET['fees'], 0, 0, 'C');
$pdf->Ln(0);
$pdf->headerTable();
$pdf->viewTable($conn);
$pdf->Ln(10);
$pdf->Output();
