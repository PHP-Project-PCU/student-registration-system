<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

use controllers\DeptController;
use controllers\SemesterController;
use controllers\AcademicYearController;
use controllers\StudentAdmissionController;
use core\helpers\HTTP;

session_start();
if (!isset($_SESSION['admin'])) {
    HTTP::redirect("/login");
    exit();
}



if (isset($_POST['logout'])) {


    unset($_SESSION['admin']);
    // // HTTP::redirect("/login");
    header("Location: /login/");
    exit();
}

if (!isset($_SESSION['admin'])) {
    HTTP::redirect("/login");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<?php
include("../../utils/components/admin/admin.links.php");
?>

<body class="bg-gray-50">
    <div class="flex h-screen bg-white" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Sidebar -->
        <?php
        include("../../utils/components/admin/admin.sidebar.php");
        ?>
        <!-- Main content -->
        <div class=" flex flex-col flex-1 md:ml-64">
            <!-- Navbar -->
            <?php
            include("../../utils/components/admin/admin.navigation.php");
            ?>
            <!-- Scrollable content section -->
        </div>


</body>
<!--Load the AJAX API-->



</html>