<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';
session_start();

use controllers\StudentAdmissionController;
use controllers\SectionController;


$studentId = $_SESSION['studentId'];
$studentAdmissionController = new StudentAdmissionController();
$studentData = $studentAdmissionController->getStudentById($studentId);
$rollNum = $studentData["student"]['roll_num'];
$name = $studentData["student"]['student_name_my'];
$year = $studentData["student"]['year'];

$sectionController = new SectionController();
$sectionData = $sectionController->getByStudentId($studentId) ?? null;
$semesterID = $sectionData[0]["semester_id"] ?? null;
$sectionID = $sectionData[0]["section_id"] ?? null;



?>

<!DOCTYPE html>
<html lang="en">

<head>

</head>
<style>
    td {
        padding: 10px;
    }
</style>

<?php
include("../../utils/components/student/student.links.php");
?>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Sidebar -->
        <?php
        include("../../utils/components/student/student.navigation.php");
        ?>
        <!-- Desktop sidebar -->
        <?php
        include("../../utils/components/student/student.sidebar.php");
        ?>
        <!-- Main content -->
        <div class=" flex flex-col flex-1 md:ml-64">
            <!-- Navbar -->
            <?php
            include("../../utils/components/student/student.navigation.php");
            ?>
            <!-- Scrollable content section -->
            <div class="overflow-y-auto md:pt-16 px-4 pb-4 h-full">
                <?php if (!empty($sectionData)): ?>

                    <div
                        class="rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900 p-6">
                        <h3 class="font-bold mx-auto  text-center text-xl py-4">Student Profile</h3>
                        <table align="center" class="table">
                            <tr>
                                <td>Name: </td>
                                <td><?= $name ?></td>
                            </tr>
                            <tr>
                                <td>Roll Number: </td>
                                <td><?= 'PaKaPaTa - 00' . $rollNum ?></td>
                            </tr>
                            <tr>
                                <td>Year: </td>
                                <td><?php switch ($year) {
                                        case 1:
                                            echo "ပထမနှစ်";
                                            break;
                                        case 2:
                                            echo "ဒုတိယနှစ်";
                                            break;
                                        case 3:
                                            echo "တတိယနှစ်";
                                            break;
                                        case 4:
                                            echo "စတုတ္ထနှစ်";
                                            break;
                                        case 5:
                                            echo "ပဥ္စမနှစ်";
                                            break;
                                    } ?></td>
                            </tr>
                            <tr>
                                <td>Semester: </td>
                                <td><?= 'Semester - ' .  $semesterID ?></td>
                            </tr>
                            <tr>
                                <td>Section: </td>
                                <td><?php switch ($sectionID) {
                                        case 1:
                                            echo "Section(A)";
                                            break;
                                        case 2:
                                            echo "Section(B)";
                                            break;
                                        case 3:
                                            echo "Section(C)";
                                            break;
                                    } ?></td>
                            </tr>
                        </table>
                    </div>

                <?php else: ?>
                    <p
                        class="rounded-md text-center shadow dark:shadow-gray-800 bg-white dark:bg-slate-900 p-6">
                        Admin မှ Section သတ်မှတ်ခြင်းလုပ်ငန်းစဥ်အား စောင့်ဆိုင်းပါ။</p>
                <?php endif ?>
                <!-- JAVASCRIPTS -->
                <script src="http://ucspyay.edu/utils/assets/libs/feather-icons/feather.min.js"></script>
                <script src="http://ucspyay.edu/utils/assets/libs/jquery/jquery.min.js"></script>
                <script src="http://ucspyay.edu/utils/assets/js/plugins.init.js"></script>
                <script src="http://ucspyay.edu/utils/assets/js/app.js"></script>
                <script src="http://ucspyay.edu/utils/assets/js/alertify.js"></script>

                <script>
                    <?php if ($found === false && $pass === false): ?>
                        alertify.warning('စာမေးပွဲမအောင်မြင်ပါ။');
                    <?php elseif ($isRegister): ?>
                        alertify.success('လျှောက်လွှာတင်ပြီးပါပြီ။');
                    <?php elseif ($validStudent === true && !$isRegister): ?>
                        alertify.success('စာမေးပွဲအောင်မြင်၍ လျှောက်လွှာတင်နိုင်ပါသည်။');
                    <?php endif ?>
                </script>

                <!-- JAVASCRIPTS -->


                <!-- Light Box -->
                <div id="lightbox" class="lightbox" onclick="closeLightbox()">
                    <span class="close">&times;</span>
                    <img class="lightbox-content" id="lightbox-img">
                </div>

</body>

</html>