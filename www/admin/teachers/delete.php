<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

use controllers\TeacherController;

$teacherController = new TeacherController();
$teacherController->deleteTeacher($_GET['id']);
header("Location:index.php");
