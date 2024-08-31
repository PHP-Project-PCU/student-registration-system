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

$studentDataInsertFlag = $_SESSION['isAddSection'] ?? false;


if (isset($_POST['add_section'])) {
    $startRollNum = $_POST['start_roll_num'];
    $endRollNum = $_POST['end_roll_num'];

    $studentIdBetweenRollNum = $studentAdmissionController->getStudentIdBetweenRollNum($startRollNum, $endRollNum);

    for ($index = 0; $index < count($studentIdBetweenRollNum); $index++) {
        $studentData = [
            "student_id" => $studentIdBetweenRollNum[$index]->id,
            "semester_id" => $_POST['semester_id'],
            "section_id" => $_POST['section_id'],
        ];
        $_SESSION['isAddSection'] = $studentAdmissionController->setStudentSection($studentData);
        $studentDataInsertFlag = $_SESSION['isAddSection'];
    }
    header('Location: http://admin.ucspyay.edu/sections/');

}

if (isset($_POST['student_semester'])) {
    $_SESSION['student_semester'] = $_POST['student_semester'];
}


if (isset($_POST['student_section'])) {
    $_SESSION['student_section'] = $_POST['student_section'];
}

$studentSemester = $_SESSION['student_semester'] ?? null;
$studentSection = $_SESSION['student_section'] ?? null;

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
                                        <select id="section_id" name="section_id"
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
                    <?php if ($studentDataInsertFlag): ?>
                    <div class="overflow-y-auto md:pt-16 px-4 pb-4">
                        <div class="flex gap-2">
                            <form action="" method="post">
                                <select id="file-type" name="student_semester" onchange="this.form.submit()"
                                    class="block w-50 mb-4 px-3 py-2 mt-1 text-sm text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:border-purple-400 focus:ring-purple-400 focus:outline-none focus:ring-2 focus:ring-offset-2 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                                    <option value="all">See All</option>
                                    <?php foreach ($semesters as $semester): ?>
                                    <option value="<?= $semester['id'] ?>"
                                        <?= $studentSemester == $semester['id'] ? 'selected' : '' ?>>
                                        <?= $semester['semester'] ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </form>
                            <form action="" method="post">
                                <select id="file-type" name="student_section" onchange="this.form.submit()"
                                    class="block w-50 mb-4 px-3 py-2 mt-1 text-sm text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:border-purple-400 focus:ring-purple-400 focus:outline-none focus:ring-2 focus:ring-offset-2 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                                    <option value="all">See All</option>
                                    <?php foreach ($sections as $section): ?>
                                    <option value="<?= $section['id'] ?>"
                                        <?= $studentSection == $section['id'] ? 'selected' : '' ?>>
                                        <?= $section['section'] ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </form>
                        </div>
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Name</th>
                                    <th class="px-4 py-3">Roll Number</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">


                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm">
                                        Kaung Myat Thu
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        20
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-4 text-sm">
                                            <button @click="openModal"
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Edit">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </button>
                                            <button
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
</body>

</html>