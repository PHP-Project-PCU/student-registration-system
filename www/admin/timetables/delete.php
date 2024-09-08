<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

use controllers\TimetableController;
use core\helpers\HTTP;

if (!isset($_SESSION['admin'])) {
    HTTP::redirect("/login");
    exit();
}


$timetableController = new TimetableController();
$timetableController->deleteTimetable($_GET['id']);
header("Location:index.php");
