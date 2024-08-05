<?php

// Include the main TCPDF library (search for installation path).
require_once ('../../vendor/autoload.php');



// Extend the TCPDF class to create custom Header
class MYPDF extends TCPDF
{
    // Page header
    public function Header()
    {
        // Logo
        $logo = 'http://ucsp.edu/utils/assets/img/logo.jpg';  // Update this path to the location of your logo file
        $this->Image($logo, 10, 10, 30, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);

        $lineHeight = 6 * 1.45;
        // Title
        $this->SetFont('Times', 'B', 12);
        $this->SetY(10);
        $this->Cell(0, $lineHeight, 'THE REPUBLIC OF THE UNION OF MYANMAR', 0, 1, 'C');
        $this->SetFont('Times', '', 10);
        $this->Cell(0, $lineHeight, 'MINISTRY OF SCIENCE AND TECHNOLOGY', 0, 1, 'C');
        $this->Cell(0, $lineHeight, 'DEPARTMENT OF ADVANCED SCIENCE AND TECHNOLOGY', 0, 1, 'C');
        $this->Cell(0, $lineHeight, 'UNIVERSITY OF COMPUTER STUDIES, PYAY', 0, 1, 'C');

        // Contact Information
        $this->SetFont('Times', '', 8);
        $this->SetY(10);
        $this->SetX(-45);
        $this->Cell(0, 5, 'Telephone', 0, 1, 'L');
        $this->SetX(-45);
        $this->Cell(0, 5, 'Administration -053-28586', 0, 1, 'L');
        $this->SetX(-45);
        $this->Cell(0, 5, 'Finance -053-28522', 0, 1, 'L');
        $this->SetX(-45);
        $this->Cell(0, 5, 'Student Affair -053-28639', 0, 1, 'L');
        $this->SetX(-45);
        $this->Cell(0, 5, 'Fax -053-28586', 0, 1, 'L');
        $this->SetX(-45);
        $this->Cell(0, 5, 'Email-ucspyaoffice@gmail.com', 0, 1, 'L');

        // Academic Record
        $this->SetY(50);  // Adjust this value to move the section lower or higher
        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(0, 6.5, 'Academic Record', 0, 1, 'C');

        $this->SetFont('helvetica', '', 10);
        $this->SetY(55); // Adjust this value to position the text correctly under the "Academic Record" title
        $this->SetX(10);
        $this->Cell(40, 6.5, 'Roll No', 0, 0, 'L');
        $this->Cell(0, 6.5, ': PaKaPaTa-', 0, 1, 'L');

        $this->SetX(10);
        $this->Cell(40, 6.5, 'Student Name', 0, 0, 'L');
        $this->Cell(0, 6.5, ':', 0, 1, 'L');

        $this->SetX(10);
        $this->Cell(40, 6.5, 'Degree Programme', 0, 0, 'L');
        $this->Cell(90, 6.5, ': B.C.Sc.', 0, 0, 'L');
        $this->Cell(40, 6.5, 'Specialization', 0, 0, 'L');
        $this->Cell(0, 6.5, ': CS', 0, 1, 'L');

        $this->SetX(10);
        $this->Cell(40, 6.5, 'Academic Year', 0, 0, 'L');
        $this->Cell(90, 6.5, ': 2023-2024', 0, 0, 'L');
        $this->Cell(40, 6.5, 'Semester', 0, 0, 'L');
        $this->Cell(0, 6.5, ': V', 0, 1, 'L');


    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('University of Computer Studies, Pyay');
$pdf->SetTitle('Sample Mark Sheet');
$pdf->SetSubject('Mark Sheet');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->setPrintHeader(true);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
// $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 0);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// add a page
$pdf->AddPage();

// Move the pointer to a new line for the table
$pdf->Ln(56);  // Adjust this value to position the table correctly

// Define HTML content for the table
$html = '
<html>
<style>
    table {
        font-family: helvetica;
        font-size: 10pt;
        width : 100%;
        
    }
        p
        {
        font-size: 10 pt;
        font-weight : bold;
}

    #mark_table {
    width:80%;
}
    th {
        font-weight: bold;
        background-color: #f0f0f0;
    }
    td {
        vertical-align: center;
    }
    

</style>
<table border="1" cellpadding="5">
    <tr align = "center" vertical-align = "center">
        <th width="5%">Sr</th>
        <th width="45%">Course Name</th>
        <th width="20%">Academic Credit Unit</th>
        <th width="11%">Grade Obtained</th>
        <th width="10%">Grade Score</th>
        <th width="10%">Grade Point</th>
    </tr>
    <tr align = "center">
        <td>1</td>
        <td>Computer Architecture & Organization I</td>
        <td>3</td>
        <td>A</td>
        <td>4.00</td>
        <td>12.00</td>
    </tr>
    <tr align = "center">
        <td>2</td>
        <td>Differential Equations and Numerical Analysis</td>
        <td>3</td>
        <td>B</td>
        <td>3.00</td>
        <td>9.00</td>
    </tr>
    <tr align = "center">
        <td>3</td>
        <td>Artificial Intelligence</td>
        <td>3</td>
        <td>A-</td>
        <td>3.67</td>
        <td>11.01</td>
    </tr>
    <tr align = "center">
        <td>4</td>
        <td>Software Analysis and Design</td>
        <td>3</td>
        <td>C+</td>
        <td>2.33</td>
        <td>6.99</td>
    </tr>
    <tr align = "center">
        <td>5</td>
        <td>Database System Structure</td>
        <td>3</td>
        <td>A-</td>
        <td>3.67</td>
        <td>11.01</td>
    </tr>
    <tr align = "center">
        <td>6</td>
        <td>Skill & Knowledge (II) Web Development PHP</td>
        <td>2</td>
        <td>A-</td>
        <td>3.67</td>
        <td>7.34</td>
    </tr>
    <tr align = "center">
        <td>7</td>
        <td>Skill & Knowledge (III) Financial Management & Accounting</td>
        <td>1</td>
        <td>A+</td>
        <td>4.00</td>
        <td>4.00</td>
    </tr>
    <tr align = "center">
        <td colspan="2">Total Academic Credit Unit Earned</td>
        <td>18</td>
        <td colspan="2">Total Grade Point</td>
        <td>61.35</td>
    </tr>
    <tr align = "center">
        <td colspan="5">Cumulative GPA</td>
        <td>3.41</td>
    </tr>
    <tr align = "center">
        <td colspan="5">Overall GPA (3.39+3.83+3.72+3.89+3.41)/5</td>
        <td>3.65</td>
    </tr>
</table>


<p margin-top = "4px">GRADING SCALE</p>

<table width="60%" align="left" cellpadding="1.5">

<tr>

<td> MARK </td>
<td> LETTER GRADE</td>
<td> GRADE SCORE </td>
</tr>
<tr>

<td> 90-100 </td>
<td > A+</td>
<td> 4.0 </td>
</tr>
<tr>

<td> 80-89 </td>
<td> A</td>
<td> 4.0 </td>
</tr>
<tr>

<td> 75-79 </td>
<td> A-</td>
<td> 3.67 </td>
</tr>
<tr>

<td> 70-74 </td>
<td> B+ </td>
<td> 3.33 </td>
</tr>
<tr>

<td> 65-69 </td>
<td> B </td>
<td> 3.0 </td>
</tr>
<tr>

<td> 60-64 </td>
<td> B- </td>
<td> 2.67 </td>
</tr>
<tr>

<td> 55-59 </td>
<td> C+ </td>
<td> 2.33 </td>
</tr>
<tr>

<td> 50-54 </td>
<td> C </td>
<td> 2.0 </td>
</tr>
<tr>

<td> 40-49 </td>
<td> D </td>
<td> 1.0 </td>
</tr>
<tr>

<td> &lt; 40 </td>
<td> F/Abs/I</td>
<td> 0.0 </td>
</tr>

</table>

<p>ISSUE DATE : 17-May-2024</p>
<p>ID : dkfjs;dlkfjs;ldkfjs;dlkfj</p>
<p align = "right">REGISTRAR<br>Academic Department<br>University of Computer Studies, Pyay</p>


</html>
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


// output the PDF
$pdf->Output('sample.pdf', 'I');