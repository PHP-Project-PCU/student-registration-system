<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

use controllers\AcademicYearController;
use core\helpers\HTTP;

session_start();
if (!isset($_SESSION['admin'])) {
    HTTP::redirect("/login");
    exit();
}



$academicYearController = new AcademicYearController();
$academicYearController->deleteAcademicYear($_GET['id']);
header("Location:index.php");
