<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

use controllers\TeacherController;
use core\helpers\HTTP;

session_start();

if (!isset($_SESSION['admin'])) {
    HTTP::redirect("/login");
    exit();
}


$teacherController = new TeacherController();
$teacherController->deleteTeacher($_GET['id']);
header("Location:index.php");
