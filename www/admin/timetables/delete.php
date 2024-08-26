<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

use controllers\TimetableController;

$timetableController = new TimetableController();
$timetableController->deleteTimetable($_GET['id']);
header("Location:index.php");
