<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

session_start();

use controllers\SectionController;
use controllers\SemesterController;
use controllers\StudentAdmissionController;

$semesterController = new SemesterController();
$semesters = $semesterController->index();
$sectionController = new SectionController();
$sections = $sectionController->index();

$studentAdmissionController = new StudentAdmissionController();
$studentsYears = $studentAdmissionController->getApprovedStudentsYear();

$years = array("1" => "ပထမနှစ်", "2" => "ဒုတိယနှစ်", "3" => "တတိယနှစ်", "4" => "စတုတ္ထနှစ်", "5" => "ပဥ္စမနှစ်");

if (isset($_POST['approved_student_year'])) {
    $_SESSION['approved_student_selected_year'] = $_POST['approved_student_year'];
}

$approvedStudentSelectedYear = $_SESSION['approved_student_selected_year'] ?? null;

$studentsRollNum = $studentAdmissionController->getApprovedStudentsRollNum($approvedStudentSelectedYear);


if (isset($_POST['add_section'])) {
    $startRollNum = $_POST['start_roll_num'];
    $endRollNum = $_POST['end_roll_num'];

    // echo $endRollNum;
    $studentIdBetweenRollNum = $studentAdmissionController->getStudentIdBetweenRollNum($startRollNum, $endRollNum);
    var_dump($studentIdBetweenRollNum);
}



?>

<!DOCTYPE html>
<html lang="en">


<?php
include("../../utils/components/admin/admin.links.php");
?>


<body class="bg-gray-50">
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
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
            <div class="overflow-y-auto md:pt-16 px-4 pb-4 h-full">


                <div class="p-4 ">
                    <div class="w-200">
                        <h4 class="my-4 text-2xl font-semibold text-gray-800 dark:text-gray-300">
                            Add Sections
                        </h4>
                        <div class="w-full px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <form action="" method="post">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                                    <label class=" block text-sm ">
                                        <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Year</span>

                                        <select name="approved_student_year" onchange="this.form.submit()"
                                            class="form-input my-4  w-full  px-3 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                            <?php foreach ($studentsYears as $yearKey): ?>
                                                <option value="" disabled selected>Select Year</option>
                                                <option value="<?php echo $yearKey->year; ?>"
                                                    <?= $approvedStudentSelectedYear == $yearKey->year ? 'selected' : '' ?>>
                                                    <?php echo $years[$yearKey->year]; ?>
                                                </option>
                                            <?php endforeach; ?>

                                        </select>
                                    </label>

                                    <label class=" block text-sm ">
                                        <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">From(Roll
                                            Number)</span>
                                        <select name="start_roll_num"
                                            class="form-input my-4 w-full  px-3 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                            <?php foreach ($studentsRollNum as $rollNum): ?>
                                                <option value="<?= $rollNum->roll_num ?>">
                                                    PaKaPaTa-<?= $rollNum->roll_num ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                    </label>
                                    <label class=" block text-sm ">
                                        <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">To(Roll
                                            Number)</span>
                                        <select name="end_roll_num"
                                            class="form-input my-4 w-full  px-3 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                            <?php foreach ($studentsRollNum as $rollNum): ?>
                                                <option value="<?= $rollNum->roll_num ?>">
                                                    PaKaPaTa-<?= $rollNum->roll_num ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                    </label>
                                    <label class=" block text-sm ">
                                        <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Semeter</span>
                                        <select id="semester_id" name="semester_id"
                                            class="form-input my-4  w-full  px-3 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                            <?php foreach ($semesters as $semester): ?>
                                                <option value="<?= $semester['id'] ?>"><?= $semester['semester'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </label>
                                    <label class=" block text-sm ">
                                        <span
                                            class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Sections</span>
                                        <select id="semester_id" name="semester_id"
                                            class="form-input my-4  w-full  px-3 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                            <?php foreach ($sections as $section): ?>
                                                <option value="<?= $section['id'] ?>"><?= $section['section'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </label>

                                </div>
                                <div class="">
                                    <button type="submit" name="add_section"
                                        class="px-4 py-2 my-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Add
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>