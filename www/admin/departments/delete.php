<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

use controllers\DeptController;
use core\helpers\HTTP;

if (!isset($_SESSION['admin'])) {
    HTTP::redirect("/login");
    exit();
}


$deptController = new DeptController();
$deptController->deleteDept($_GET['id']);
header("Location:index.php");
