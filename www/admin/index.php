<?php
include ('../../autoload.php');
session_start();

use core\helpers\HTTP;

if (!isset($_SESSION['admin'])) {
    HTTP::redirect('/login');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Portal</title>
</head>

<body>
    <h3>Admin Portal</h3>
</body>

</html>