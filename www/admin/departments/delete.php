<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

use controllers\DeptController;

$deptController = new DeptController();
$deptController->deleteDept($_GET['id']);
header("Location:index.php");
