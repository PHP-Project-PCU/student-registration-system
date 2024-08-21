<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

use controllers\AcademicYearController;


$academicYearController = new AcademicYearController();
$academicYearController->deleteAcademicYear($_GET['id']);
header("Location:index.php");
