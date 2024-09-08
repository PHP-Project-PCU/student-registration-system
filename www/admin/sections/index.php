<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

session_start();

use controllers\SectionController;
use controllers\SemesterController;
use controllers\StudentAdmissionController;
use core\helpers\HTTP;


if (!isset($_SESSION['admin'])) {
    HTTP::redirect("/login");
    exit();
}


if (isset($_POST['logout'])) {

    unset($_SESSION['admin']);
    // HTTP::redirect("/login");
    header("location: /login");
    exit();
}

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

    $studentIdBetweenRollNum = $studentAdmissionController->getStudentIdBetweenRollNum($startRollNum, $endRollNum);

    for ($index = 0; $index < count($studentIdBetweenRollNum); $index++) {
        $studentData = [
            "student_id" => $studentIdBetweenRollNum[$index]->id,
            "semester_id" => $_POST['semester_id'],
            "section_id" => $_POST['section_id'],
        ];
        $studentDataInsertFlag = $studentAdmissionController->setStudentSection($studentData);
    }
    header('Location: http://admin.ucspyay.edu/sections/');
}




if (isset($_POST['student_section_filter'])) {
    $_SESSION['student_semester'] = $_POST['student_semester'];
    $_SESSION['student_section'] = $_POST['student_section'];
}


//Pagination Logic
$studentSemester = $_SESSION['student_semester'] ?? null;
$studentSection = $_SESSION['student_section'] ?? null;

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = 4;
$getStudentNameAndRollNumAndSemesterAndSectionPaginationData = $studentAdmissionController->getStudentNameAndRollNumAndSemesterAndSectionPaginationData($page, $limit, $studentSemester, $studentSection);
$getStudentSectionTotalRows = $sectionController->getTotalRows($studentSemester, $studentSection);
$totalPages = ceil($getStudentSectionTotalRows / $limit);


if (isset($_POST['update_student_section_and_semester'])) {
    $semesterId = $_POST['student_semester'];
    $sectionId = $_POST['student_section'];
    $studentId = $_POST['student_id'];

    $sectionController->updateStudentSemesterAndSection($semesterId, $sectionId, $studentId);
    header('Location: http://admin.ucspyay.edu/sections/');
}

if (isset($_POST['delete_student_id'])) {
    $studentId = $_POST['delete_student_id'];
    $sectionController->deleteStudentSemesterAndSection($studentId);
    header('Location: http://admin.ucspyay.edu/sections/');
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

                    <div class="overflow-y-auto md:pt-16 px-4 pb-4">
                        <form action="" method="post" class="flex gap-2 items-center justify-end">
                            <select id="file-type" name="student_semester"
                                class="block w-50 mb-4 px-3 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:border-purple-400 focus:ring-purple-400 focus:outline-none focus:ring-2 focus:ring-offset-2 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                                <?php foreach ($semesters as $semester): ?>
                                    <option value="<?= $semester['id'] ?>" <?= $studentSemester == $semester['id'] ? 'selected' : '' ?>>
                                        <?= $semester['semester'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <select id="file-type" name="student_section"
                                class="block w-50 mb-4 px-3 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:border-purple-400 focus:ring-purple-400 focus:outline-none focus:ring-2 focus:ring-offset-2 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                                <?php foreach ($sections as $section): ?>
                                    <option value="<?= $section['id'] ?>" <?= $studentSection == $section['id'] ? 'selected' : '' ?>>
                                        <?= $section['section'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <button type="submit" name="student_section_filter"
                                class=" p-2 mb-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Filter
                            </button>
                        </form>
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Name</th>
                                    <th class="px-4 py-3">Roll Number</th>
                                    <th class="px-4 py-3">Semester</th>
                                    <th class="px-4 py-3">Section</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                <?php foreach ($getStudentNameAndRollNumAndSemesterAndSectionPaginationData as $students): ?>
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm">
                                            <?= $students->student_name_en ?>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <?= $students->roll_num ?>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <?= $students->semester ?>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <?= $students->section ?>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center space-x-4 text-sm">
                                                <button @click="openModal"
                                                    onclick="openEditModal('<?= $students->student_id ?>','<?= $students->semester_id ?>','<?= $students->section_id ?>','<?= $students->student_name_en ?>','<?= $students->roll_num ?>')"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Edit">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                        </path>
                                                    </svg>
                                                </button>
                                                <button onclick="openDeleteModal('<?= $students->student_id ?>')"
                                                    aria-label="Delete"
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
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div
                        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                        <span class="flex items-center col-span-3">
                        </span>
                        <span class="col-span-2"></span>
                        <!-- Pagination -->
                        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                            <nav aria-label="Table navigation">
                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>

                                    <ul class="inline-flex items-center">
                                        <li>
                                            <a href="?page=<?= $i; ?>"
                                                class="text-gray-700 px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple <?php if ($i == $page): ?> ' transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600' <?php endif; ?> ">
                                                <?= $i; ?>
                                            </a>
                                        </li>
                                    </ul>
                                <?php endfor; ?>
                            </nav>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal For Edit -->
        <!-- Modal backdrop. This what you want to place close to the closing body tag -->
        <div id="editModal" x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
            <!-- Modal -->
            <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal"
                @keydown.escape="closeModal"
                class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                role="dialog" id="modal">

                <!-- Modal body -->
                <div class="mt-4 mb-6">
                    <!-- Modal title -->

                    <!-- Modal description -->
                    <form action="" method="POST">
                        <input type="hidden" name="student_id" id="editStudentId">
                        <label class="block text-sm">
                            <span class="text-gray-800 font-semibold dark:text-gray-500">Semester</span>
                            <select id="editStudentSemester" name="student_semester"
                                class="block w-50 mb-4 px-3 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:border-purple-400 focus:ring-purple-400 focus:outline-none focus:ring-2 focus:ring-offset-2 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                                <?php foreach ($semesters as $semester): ?>
                                    <option value="<?= $semester['id'] ?>" <?= $studentSemester == $semester['id'] ? 'selected' : '' ?>>
                                        <?= $semester['semester'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </label>
                        <label class="block text-sm">
                            <span class="text-gray-800 font-semibold dark:text-gray-500">Section</span>
                            <select id="editStudentSection" name="student_section"
                                class="block w-50 mb-4 px-3 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:border-purple-400 focus:ring-purple-400 focus:outline-none focus:ring-2 focus:ring-offset-2 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                                <?php foreach ($sections as $section): ?>
                                    <option value="<?= $section['id'] ?>" <?= $studentSection == $section['id'] ? 'selected' : '' ?>>
                                        <?= $section['section'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </label>

                        <label class="block text-sm">
                            <span class="text-gray-800 font-semibold dark:text-gray-500">Name</span>
                            <input disabled
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                name="student_name" id="editStudentName" />
                        </label>
                        <label class="block text-sm">
                            <span class="text-gray-800 font-semibold dark:text-gray-500">Roll Number</span>
                            <input disabled
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                name="matriculation_roll_num" id="editStudentRollNum" />
                        </label>
                </div>
                <footer
                    class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                    <button @click="closeModal"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                        Cancel
                    </button>
                    <button type="submit" name="update_student_section_and_semester"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Save
                    </button>
                </footer>
                </form>
            </div>
        </div>

        <!-- Delete Modal -->
        <div id="deleteModal"
            class="fixed inset-0 z-50 items-center justify-center hidden overflow-y-auto bg-gray-900 bg-opacity-50">
            <form action="" method="post">
                <div class="max-w-xl p-6 bg-white rounded-lg shadow-md">
                    <input type="hidden" id="deleteStudentSectionAndSemesterId" name="delete_student_id">
                    <h2 class="text-xl font-bold mb-4">Confirm Deletion</h2>
                    <p class="mb-6">Are you sure you want to delete data?</p>
                    <div class="flex justify-end">
                        <button onclick="closeDeleteModal()"
                            class="px-4 py-2 mr-4 font-medium text-gray-700 bg-gray-200 rounded hover:bg-gray-300">Cancel</button>
                        <button type="submit" name="delete_fresher"
                            class="px-4 py-2 font-medium text-white bg-red-500 rounded hover:bg-red-600">Delete</button>
                    </div>
                </div>
            </form>
        </div>
</body>
<script>
    function openEditModal(id, semesterId, sectionId, name, rollNum) {
        document.getElementById('editStudentId').value = id;
        document.getElementById('editStudentSemester').value = semesterId;
        document.getElementById('editStudentSection').value = sectionId;

        document.getElementById('editStudentName').value = name;
        document.getElementById('editStudentRollNum').value = rollNum;
    }

    function openDeleteModal(id) {
        document.getElementById('deleteStudentSectionAndSemesterId').value = id;
        document.getElementById("deleteModal").style.display = "flex";
    }

    function closeDeleteModal() {
        document.getElementById("deleteModal").style.display = "none";
    }

    function updateFileDetails() {
        const fileInput = document.getElementById('file-upload');
        const fileInfo = document.getElementById('file-info');
        if (fileInput.files.length > 0) {
            const file = fileInput.files[0];
            fileInfo.textContent = `Selected file: ${file.name} (${file.type})`;
        } else {
            fileInfo.textContent = '';
        }
    }
</script>

</html>