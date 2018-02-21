<?php
include 'core/init.php';
// protect_page();
require('fpdf/fpdf.php');
$obj = json_decode($_GET["resp"], true);

if($obj['data']['data']['status'] == 'successful')
{
	class PDF extends FPDF
	{
		// Page header
		function Header()
		{
		    // Logo
		    $this->Image('admin/img/oaulogo.png',10,6,20);
		    // Arial bold 15
		    $this->SetFont('Arial','B',15);
		    // Move to the right
		    $this->Cell(40);
		    // Title
		    $this->Cell(150,10,'Obafemi Awolowo University Postgraduate Transcript',0,'C');
		    $this->Ln(7);

		    // // Line break
		    // $this->Ln(20);
		}


		// Page footer
		function Footer()
		{
		    // Position at 1.5 cm from bottom
		    $this->SetY(-25);
		    // Arial italic 8
		    $this->SetFont('Arial','I',8);
		    // Page number
		    $this->Cell(0,10,'Dean, Student Affairs | DSA: 0124387453 ',0,1,'C');
		    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}
	}

	// Instanciation of inherited class
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',10);
	$pdf->Cell(40);
	$pdf->Cell(1,10, 'Copyright Obafemi Awolowo University. Obafemi Awolowo University, Ile-Ife, P.M.B. 13',0,1);
	$pdf->Ln(1);
	// for($i=1;$i<=40;$i++)
	$pdf->Cell(40);
		$pdf->Cell(1,10, 'Name:',0,0);
		// $pdf->Ln(2);
	$pdf->Cell(10);
	    $pdf->Cell(5,10,$fetch_student_data["first_name"],0,0);
	$pdf->Cell(10);
	    $pdf->Cell(5,10,$fetch_student_data["last_name"],0,0);
	$pdf->Cell(10);
	    $pdf->Cell(5,10,$fetch_student_data["other_name"],0,1);
	$pdf->Cell(40);
		$pdf->Cell(1,10, 'General Demography:',0,0);
	$pdf->Cell(33);
	    $pdf->Cell(5,10,$fetch_student_data["registration"],0,0);
	$pdf->Cell(35);
	    $pdf->Cell(5,10,$award_Identity["title"],0,0);
	$pdf->Cell(7);
	    $pdf->Cell(5,10,$department_Identity["title"],0,0);
	$pdf->Cell(7);
	    $pdf->Cell(5,10,$fetch_student_data["year"],0,0);
	$pdf->Cell(7);
	    $pdf->Cell(5,10,$fetch_student_data["email"],0,1);

	$pdf->Ln(15);
	$pdf->Cell(10);
			$pdf->Cell(1,10, 'Student Registration No',0,0);
	$pdf->Cell(40);
			$pdf->Cell(1,10, 'Course Code',0,0);
	$pdf->Cell(25);
			$pdf->Cell(1,10, 'Course Title',0,0);
	$pdf->Cell(40);
			$pdf->Cell(1,10, 'Remarks Unit',0,0);
	$pdf->Cell(20);
			$pdf->Cell(1,10, 'Grades',0,0);
	$pdf->Cell(15);
			$pdf->Cell(1,10, 'Awards',0,0);
	$pdf->Cell(15);
			$pdf->Cell(1,10, 'Department',0,1);
	$registration = $fetch_student_data["registration"];
	$query = "SELECT * FROM `transcript` WHERE `registration` = '$registration'";
	$run_query = mysqli_query($Oau_auth, $query);
	if(mysqli_num_rows($run_query) > 0)
	{
	  while($rows = mysqli_fetch_assoc($run_query))
	  {
	     $registration      = $rows['registration'];
	     $department_Idn    = $rows['department_Idn'];
	     $course_code       = $rows['course_code'];
	     $course_title      = $rows['course_title'];
	     $remarks_unit      = $rows['remarks_unit'];
	     $grade             = $rows['grade'];
	     $award             = $rows['award'];
	     $department        = $rows['department'];



		$pdf->Cell(10);
	    	$pdf->Cell(5,10,$registration,0,0);
	    $pdf->Cell(40);
	    	$pdf->Cell(5,10,$course_code,0,0);
	    $pdf->Cell(15);
	    	$pdf->Cell(5,10,$course_title,0,0);
	    $pdf->Cell(45);
	    	$pdf->Cell(5,10,$remarks_unit,0,0);
	    $pdf->Cell(10);
	    	$pdf->Cell(5,10,$grade,0,0);
	    $pdf->Cell(10);
	    	$pdf->Cell(5,10,$award,0,0);
	    $pdf->Cell(15);
	    	$pdf->Cell(5,10,$department,0,1);

	  }
	}
	$pdf->Output();

	$email_user = $fetch_student_data["email"];
	$to = "$email_user";
	$from = "oau-pgtranscript@senttrigg.com";
	$subject = "send email with pdf attachment";
	$message = "<p>Please see the attachment.</p>";

	// a random hash will be necessary to send mixed content
	$separator = md5(time());

	// carriage return type (we use a PHP end of line constant)
	$eol = PHP_EOL;

	// attachment name
	$filename = "test.pdf";

	// encode data (puts attachment in proper format)
	$doc = $pdf->Output("test.pdf", "S");
	$attachment = chunk_split(base64_encode($doc));

	// main header
	$headers  = "From: ".$from.$eol;
	$headers .= "MIME-Version: 1.0".$eol;
	$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

	// no more headers after this, we start the body! //

	$body = "--".$separator.$eol;
	$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
	$body .= "This is a MIME encoded message.".$eol;

	// message
	$body .= "--".$separator.$eol;
	$body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
	$body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
	$body .= $message.$eol;

	// attachment
	$body .= "--".$separator.$eol;
	$body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol;
	$body .= "Content-Transfer-Encoding: base64".$eol;
	$body .= "Content-Disposition: attachment".$eol.$eol;
	$body .= $attachment.$eol;
	$body .= "--".$separator."--";

	// send message
	mail($to, $subject, $body, $headers);
}


?>
