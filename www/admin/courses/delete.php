<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

use controllers\CourseController;
use core\helpers\HTTP;

session_start();

if (!isset($_SESSION['admin'])) {
    HTTP::redirect("/login");
    exit();
}


$courseController = new CourseController();
$courseController->deleteCourse($_GET['id']);
header("Location:index.php");
