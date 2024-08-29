<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

use controllers\CourseController;

$courseController = new CourseController();
$courseController->deleteCourse($_GET['id']);
header("Location:index.php");
