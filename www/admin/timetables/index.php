<?php


require '../../../vendor/autoload.php';
include '../../../autoload.php';


use controllers\AcademicYearController;
use controllers\SemesterController;
use controllers\SectionController;
use controllers\MajorController;
use controllers\CourseController;
use controllers\TimetableController;
use controllers\TeacherController;
use core\helpers\HTTP;

session_start();

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

$academicYearController = new AcademicYearController();
$academicYears = $academicYearController->index();
$currentAcademicYear = $academicYears[0]['academic_year'] ?? null;

$teacherController = new TeacherController();
$teachers = $teacherController->index();

$timetableController = new TimetableController();


$majorController = new MajorController();
$majors = $majorController->index();
$currentMajorId = $_POST['major_id'] ?? 1;

$sectionController = new SectionController();
$sections = $sectionController->index();
$currentSectionId = $_POST['section_id'] ?? 1;

$courseController = new CourseController();

$semesterController = new SemesterController();
$semesters = $semesterController->index();
$currentSemesterId = $_POST['semester_id'] ?? 1;

// getting Courses by Semester
$courses = $courseController->getAllCoursesBySemester($currentSemesterId);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $currentSemesterId = $_POST['semester_id'];
    $currentMajorId = $_POST['major_id'];
    $currentSectionId = $_POST['section_id'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['save_btn'])  || isset($_POST['update_btn']))) {

    $data = [
        "day" => $_POST['day'],
        "course_id" => $_POST['course_id'] ?? null,
        "teacher_id" => $_POST['teacher_id'] ?? null,
        "time_slot" => $_POST['time_slot'],

        "section_id" => $currentSectionId,
        "semester_id" => $currentSemesterId,
        "major_id" => $currentMajorId,

        "start_time" => $_POST['start_time'],
        "end_time" => $_POST['end_time'],
        "start_date" => $_POST['start_date']?? null,
        "end_date" => $_POST['end_date']?? null,
    ];
    if (isset($_POST['save_btn'])) {
        $timetableController = new TimetableController();
        $timetableController->createTimeTable($data);
    } else if (isset($_POST['update_btn']) && isset($_POST['id'])) {
        $id = $_POST['id'];
        $timetableController = new TimetableController();
        $timetableController->updateTimetable($id, $data);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<style>
th,
td {
    border: 1px solid grey;
    text-align: center;
}

td {
    text-align: center;
    cursor: pointer;
}

td:hover {
    background-color: lightblue;
    transition: all ease-in 0.2s;
}
</style>

<?php
include("../../utils/components/admin/admin.links.php");
?>

<body>
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

                <div class="p-4">
                    <div class="flex justify-between items-start mb-4">

                        <div class="">
                            <h4 class="m-4 text-xl font-semibold text-gray-800 dark:text-gray-300">
                                <?= '(' . $currentAcademicYear . ')' ?> ပညာသင်နှစ်
                            </h4>
                            <p class="m-4 text-xl font-semibold text-gray-800 dark:text-gray-300">
                                TimeTable
                            </p>
                            <button @click="openModal" onclick="openCreateModal()"
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Edit">
                                <span class="border px-4 py-2  rounded-full">Add new +</span>
                            </button>
                        </div>

                        <form action="" method="POST">
                            <select id="semester_id" name="semester_id" onchange="this.form.submit()"
                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                <?php foreach ($semesters as $semester): ?>
                                <option value="<?= $semester['id'] ?>"
                                    <?php if ($currentSemesterId == $semester['id']) echo 'selected' ?>>
                                    <?= $semester['semester']?>
                                </option>
                                <?php endforeach ?>
                            </select>
                            <select id="major_id" name="major_id" onchange="this.form.submit()"
                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">

                                <?php if($currentSemesterId <= 2) : ?>
                                <option value="<?= $majors[0]['id'] ?>"
                                    <?php if ($currentMajorId == $majors[0]['id']) echo 'selected' ?>>
                                    <?= $majors[0]['major'] ?>
                                </option>
                                <?php else : ?>

                                <option value="<?= $majors[1]['id'] ?>"
                                    <?php if ($currentMajorId == $majors[1]['id']) echo 'selected' ?>>
                                    <?= $majors[1]['major'] ?>
                                </option>
                                <option value="<?= $majors[2]['id'] ?>"
                                    <?php if ($currentMajorId == $majors[2]['id']) echo 'selected' ?>>
                                    <?= $majors[2]['major'] ?>
                                </option>
                                <?php endif;?>


                            </select>
                            <select id="section_id" name="section_id" onchange="this.form.submit()"
                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                <?php foreach ($sections as $section): ?>
                                <option value="<?= $section['id'] ?>"
                                    <?php if ($currentSectionId == $section['id']) echo 'selected' ?>>
                                    <?= $section['section'] ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                        </form>


                    </div>

                    <!-- New Table -->
                    <div class=" w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full ">
                            <table class="table-auto w-full whitespace-no-wrap">
                                <thead>
                                    <tr class="text-xs font-semibold tracking-wide text-left  uppercase border-b ">
                                        <th class="px-4 py-3 bg-indigo-200">Date/Time</th>
                                        <th class="px-4 py-3 bg-indigo-200">9:00-10:00</th>
                                        <th class="px-4 py-3 bg-indigo-200">10:00-11:00</th>
                                        <th class="px-4 py-3 bg-indigo-200">11:00-12:00</th>
                                        <th class="px-4 py-3 bg-indigo-200">1:00-2:00</th>
                                        <th class="px-4 py-3 bg-indigo-200">2:00-3:00</th>
                                        <th class="px-4 py-3 bg-indigo-200">3:00-4:00</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 bg-indigo-100">
                                            Monday
                                        </td>
                                        <?php
                                        $mondayTimetables = $timetableController->getTimetableByDSSM('Monday', $currentSectionId, $currentSemesterId, $currentMajorId);

                                        foreach ($mondayTimetables as $timetable) : ?>
                                        <td @click="openModal"
                                            onclick="openEditModal('<?= $timetable['id'] ?>','<?= $timetable['day'] ?>','<?= $timetable['course_id'] ?>','<?= $timetable['teacher_id'] ?>','<?= $timetable['time_slot'] ?>','<?= $timetable['start_time'] ?>','<?= $timetable['end_time'] ?>','<?= $timetable['start_date'] ?>','<?= $timetable['end_date'] ?>')"
                                            class="px-4 py-3 text-sm"
                                            colspan="<?php if ($timetable['time_slot'] == 2) echo 2; ?>">

                                            <?php
                                                // Flag to check if course and teacher are found
                                                $courseFound = false;
                                                $teacherFound = false;

                                                foreach ($courses as $course) {
                                                    if ($course['id'] == $timetable['course_id']) {
                                                        echo $course['code'];
                                                        $courseFound = true;
                                                        break; // Break after finding the course
                                                    }
                                                }
                                                echo '<br>';

                                                foreach ($teachers as $teacher) {
                                                    if ($teacher['id'] == $timetable['teacher_id']) {
                                                        echo $teacher['teacher_name'];
                                                        $teacherFound = true;
                                                        break; // Break after finding the teacher
                                                    }
                                                }

                                                // Only show "Discussion" if either course or teacher is not found
                                                if (!$courseFound || !$teacherFound) {
                                                    echo "Discussion";
                                                }
                                                ?>

                                        </td>
                                        <?php endforeach ?>
                                    </tr>

                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 bg-indigo-100">
                                            Tuesday
                                        </td>
                                        <?php
                                        $tuesdayTimetables = $timetableController->getTimetableByDSSM('Tuesday', $currentSectionId, $currentSemesterId, $currentMajorId);

                                        foreach ($tuesdayTimetables as $timetable) : ?>
                                        <td @click="openModal"
                                            onclick="openEditModal('<?= $timetable['id'] ?>','<?= $timetable['day'] ?>','<?= $timetable['course_id'] ?>','<?= $timetable['teacher_id'] ?>','<?= $timetable['time_slot'] ?>','<?= $timetable['start_time'] ?>','<?= $timetable['end_time'] ?>','<?= $timetable['start_date'] ?>','<?= $timetable['end_date'] ?>')"
                                            class="px-4 py-3 text-sm"
                                            colspan="<?php if ($timetable['time_slot'] == 2) echo 2; ?>">

                                            <?php
                                                // Flag to check if course and teacher are found
                                                $courseFound = false;
                                                $teacherFound = false;

                                                foreach ($courses as $course) {
                                                    if ($course['id'] == $timetable['course_id']) {
                                                        echo $course['code'];
                                                        $courseFound = true;
                                                        break; // Break after finding the course
                                                    }
                                                }
                                                echo '<br>';

                                                foreach ($teachers as $teacher) {
                                                    if ($teacher['id'] == $timetable['teacher_id']) {
                                                        echo $teacher['teacher_name'];
                                                        $teacherFound = true;
                                                        break; // Break after finding the teacher
                                                    }
                                                }

                                                // Only show "Discussion" if either course or teacher is not found
                                                if (!$courseFound || !$teacherFound) {
                                                    echo "Discussion";
                                                }
                                                ?>

                                        </td>
                                        <?php endforeach ?>
                                    </tr>

                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 bg-indigo-100">
                                            Wednesday
                                        </td>
                                        <?php
                                        $wednesdayTimetables = $timetableController->getTimetableByDSSM('Wednesday', $currentSectionId, $currentSemesterId, $currentMajorId);

                                        foreach ($wednesdayTimetables as $timetable) : ?>
                                        <td @click="openModal"
                                            onclick="openEditModal('<?= $timetable['id'] ?>','<?= $timetable['day'] ?>','<?= $timetable['course_id'] ?>','<?= $timetable['teacher_id'] ?>','<?= $timetable['time_slot'] ?>','<?= $timetable['start_time'] ?>','<?= $timetable['end_time'] ?>','<?= $timetable['start_date'] ?>','<?= $timetable['end_date'] ?>')"
                                            class="px-4 py-3 text-sm"
                                            colspan="<?php if ($timetable['time_slot'] == 2) echo 2; ?>">

                                            <?php
                                                // Flag to check if course and teacher are found
                                                $courseFound = false;
                                                $teacherFound = false;

                                                foreach ($courses as $course) {
                                                    if ($course['id'] == $timetable['course_id']) {
                                                        echo $course['code'];
                                                        $courseFound = true;
                                                        break; // Break after finding the course
                                                    }
                                                }
                                                echo '<br>';

                                                foreach ($teachers as $teacher) {
                                                    if ($teacher['id'] == $timetable['teacher_id']) {
                                                        echo $teacher['teacher_name'];
                                                        $teacherFound = true;
                                                        break; // Break after finding the teacher
                                                    }
                                                }

                                                // Only show "Discussion" if either course or teacher is not found
                                                if (!$courseFound || !$teacherFound) {
                                                    echo "Discussion";
                                                }
                                                ?>

                                        </td>
                                        <?php endforeach ?>
                                    </tr>

                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 bg-indigo-100">
                                            Thursday
                                        </td>
                                        <?php
                                        $thursdayTimetables = $timetableController->getTimetableByDSSM('Thursday', $currentSectionId, $currentSemesterId, $currentMajorId);

                                        foreach ($thursdayTimetables as $timetable) : ?>
                                        <td @click="openModal"
                                            onclick="openEditModal('<?= $timetable['id'] ?>','<?= $timetable['day'] ?>','<?= $timetable['course_id'] ?>','<?= $timetable['teacher_id'] ?>','<?= $timetable['time_slot'] ?>','<?= $timetable['start_time'] ?>','<?= $timetable['end_time'] ?>','<?= $timetable['start_date'] ?>','<?= $timetable['end_date'] ?>')"
                                            class="px-4 py-3 text-sm"
                                            colspan="<?php if ($timetable['time_slot'] == 2) echo 2; ?>">

                                            <?php
                                                // Flag to check if course and teacher are found
                                                $courseFound = false;
                                                $teacherFound = false;

                                                foreach ($courses as $course) {
                                                    if ($course['id'] == $timetable['course_id']) {
                                                        echo $course['code'];
                                                        $courseFound = true;
                                                        break; // Break after finding the course
                                                    }
                                                }
                                                echo '<br>';

                                                foreach ($teachers as $teacher) {
                                                    if ($teacher['id'] == $timetable['teacher_id']) {
                                                        echo $teacher['teacher_name'];
                                                        $teacherFound = true;
                                                        break; // Break after finding the teacher
                                                    }
                                                }

                                                // Only show "Discussion" if either course or teacher is not found
                                                if (!$courseFound || !$teacherFound) {
                                                    echo "Discussion";
                                                }
                                                ?>

                                        </td>
                                        <?php endforeach ?>
                                    </tr>

                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 bg-indigo-100">
                                            Friday
                                        </td>
                                        <?php
                                        $fridayTimetables = $timetableController->getTimetableByDSSM('Friday', $currentSectionId, $currentSemesterId, $currentMajorId);

                                        foreach ($fridayTimetables as $timetable) : ?>
                                        <td @click="openModal"
                                            onclick="openEditModal('<?= $timetable['id'] ?>','<?= $timetable['day'] ?>','<?= $timetable['course_id'] ?>','<?= $timetable['teacher_id'] ?>','<?= $timetable['time_slot'] ?>','<?= $timetable['start_time'] ?>','<?= $timetable['end_time'] ?>','<?= $timetable['start_date'] ?>','<?= $timetable['end_date'] ?>')"
                                            class="px-4 py-3 text-sm"
                                            colspan="<?php if ($timetable['time_slot'] == 2) echo 2; ?>">

                                            <?php
                                                // Flag to check if course and teacher are found
                                                $courseFound = false;
                                                $teacherFound = false;

                                                foreach ($courses as $course) {
                                                    if ($course['id'] == $timetable['course_id']) {
                                                        echo $course['code'];
                                                        $courseFound = true;
                                                        break; // Break after finding the course
                                                    }
                                                }
                                                echo '<br>';

                                                foreach ($teachers as $teacher) {
                                                    if ($teacher['id'] == $timetable['teacher_id']) {
                                                        echo $teacher['teacher_name'];
                                                        $teacherFound = true;
                                                        break; // Break after finding the teacher
                                                    }
                                                }

                                                // Only show "Discussion" if either course or teacher is not found
                                                if (!$courseFound || !$teacherFound) {
                                                    echo "Discussion";
                                                }
                                                ?>

                                        </td>
                                        <?php endforeach ?>
                                    </tr>



                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal backdrop. This what you want to place close to the closing body tag -->
            <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
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
                    <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                    <header class="flex justify-end">
                        <button
                            class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                            aria-label="close" @click="closeModal">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                                <path
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </header>
                    <!-- Modal body -->
                    <div class=" mb-6">
                        <!-- Modal title -->
                        <p class="mb-6 text-lg font-semibold text-gray-700 dark:text-gray-300">
                            Details
                        </p>

                        <form action="" method="POST">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                                <input type="hidden" name="id" id="id">

                                <!-- Select Day  -->
                                <label class="block text-sm">
                                    <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Day</span>
                                    <select id="day" name="day"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                    </select>
                                </label>
                                <!-- Select Course  -->
                                <label class="block text-sm">
                                    <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Course</span>
                                    <select id="course_id" name="course_id"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                        <option value="" disabled selected>Choose a course</option>
                                        <?php foreach ($courses as $course): ?>
                                        <option value="<?= $course['id'] ?>" <?php #if ($currentcourse == $course['course']) echo 'selected' 
                                                                                    ?>>
                                            <?= $course['title'] ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </label>
                                <label class="block text-sm">
                                    <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Teacher</span>
                                    <select id="teacher_id" name="teacher_id"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                        <option value="" disabled selected>Choose a teacher</option>
                                        <?php foreach ($teachers as $teacher): ?>
                                        <option value="<?= $teacher['id'] ?>"><?= $teacher['teacher_name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </label>
                                <label class="block text-sm">
                                    <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Time Slot</span>
                                    <input type="text"
                                        class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        name="time_slot" id="time_slot" placeholder="Time slot" required />
                                </label>
                                <label class="block text-sm">
                                    <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Semester</span>
                                    <select id="semester_id" name="semester_id" onchange="this.form.submit()"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                        <?php foreach ($semesters as $semester): ?>
                                        <option value="<?= $semester['id'] ?>"
                                            <?php if ($currentSemesterId == $semester['id']) echo 'selected' ?>>
                                            <?= $semester['semester'] ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </label>
                                <label class="block text-sm">
                                    <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Major</span>
                                    <select id="major_id" name="major_id" onchange="this.form.submit()"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">

                                        <?php if($currentSemesterId <= 2) : ?>
                                        <option value="<?= $majors[0]['id'] ?>"
                                            <?php if ($currentMajorId == $majors[0]['id']) echo 'selected' ?>>
                                            <?= $majors[0]['major'] ?>
                                        </option>
                                        <?php else : ?>

                                        <option value="<?= $majors[1]['id'] ?>"
                                            <?php if ($currentMajorId == $majors[1]['id']) echo 'selected' ?>>
                                            <?= $majors[1]['major'] ?>
                                        </option>
                                        <option value="<?= $majors[2]['id'] ?>"
                                            <?php if ($currentMajorId == $majors[2]['id']) echo 'selected' ?>>
                                            <?= $majors[2]['major'] ?>
                                        </option>
                                        <?php endif;?>


                                    </select>
                                </label>
                                <label class="block text-sm">
                                    <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Section</span>
                                    <select id="section_id" name="section_id" onchange="this.form.submit()"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                        <?php foreach ($sections as $section): ?>
                                        <option value="<?= $section['id'] ?>"
                                            <?php if ($currentSectionId == $section['id']) echo 'selected' ?>>
                                            <?= $section['section'] ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </label>
                                <label class="block text-sm">
                                    <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Start Time</span>
                                    <input type="time"
                                        class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        name="start_time" id="start_time" required />
                                </label>
                                <label class="block text-sm">
                                    <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">End Time </span>
                                    <input type="time"
                                        class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        name="end_time" id="end_time" required />
                                </label>

                                <!-- <label class="block text-sm">
                                    <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Start Date</span>
                                    <input type="date"
                                        class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        name="start_date" id="start_date" required />
                                </label>
                                <label class="block text-sm">
                                    <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">End Date </span>
                                    <input type="date"
                                        class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        name="end_date" id="end_date" required />
                                </label> -->

                            </div>
                            <footer
                                class="flex flex-col items-center justify-between px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                                <label class="block text-sm">
                                    <input type="checkbox" id="discussion" name="discussion" value="Discussion">
                                    <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Discussion </span>
                                </label>
                                <div
                                    class="flex flex-col items-center justify-between px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                                    <!-- <button @click="closeModal"
                                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                                        Cancel
                                    </button> -->
                                    <a href="#" id="delete_btn" name="delete_btn"
                                        class="hidden w-full px-5 py-3 text-sm font-medium leading-5 text-white  transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto bg-red-400 active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                                        Delete
                                    </a>
                                    <button type="submit" name="update_btn" id="update_btn"
                                        class="hidden w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Update
                                    </button>
                                    <button type="submit" name="save_btn" id="save_btn"
                                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Save
                                    </button>
                                </div>
                            </footer>
                        </form>


                    </div>
                </div>
                <!-- End of modal backdrop -->

                <script>
                document.getElementById("discussion").addEventListener('change', function() {
                    var courseSelect = document.getElementById("course_id");
                    var teacherSelect = document.getElementById("teacher_id");

                    if (this.checked) {
                        courseSelect.disabled = true;
                        teacherSelect.disabled = true;
                        courseSelect.value = null;
                        teacherSelect.value = null;

                    } else {
                        courseSelect.disabled = false;
                        teacherSelect.disabled = false;
                    }
                });

                function openCreateModal() {
                    document.getElementById('id').value = null;
                    document.getElementById('day').value = null;
                    var courseSelect = document.getElementById('course_id');
                    courseSelect.value = null;
                    var teacherSelect = document.getElementById('teacher_id');
                    teacherSelect.value = null;

                    document.getElementById('time_slot').value = null;
                    document.getElementById('start_time').value = null;
                    document.getElementById('end_time').value = null;
                    document.getElementById('start_date').value = null;
                    document.getElementById('end_date').value = null;
                    document.getElementById('discussion').checked = false;

                    document.getElementById('save_btn').classList.remove('hidden');
                    document.getElementById('delete_btn').classList.add('hidden');
                    document.getElementById('update_btn').classList.add('hidden');

                }

                function openEditModal(id, day, courseId, teacherId, timeSlot, startTime, endTime) {
                    document.getElementById('id').value = id;
                    document.getElementById('day').value = day;
                    var courseSelect = document.getElementById('course_id');
                    courseSelect.value = courseId;
                    var teacherSelect = document.getElementById('teacher_id');
                    teacherSelect.value = teacherId;

                    if (courseId == "" && teacherId == "") {
                        document.getElementById('discussion').checked = true;
                        courseSelect.disabled = true;
                        teacherSelect.disabled = true;
                        courseSelect.value = null;
                        teacherSelect.value = null;
                    } else {
                        document.getElementById('discussion').checked = false;
                        courseSelect.disabled = false;
                        teacherSelect.disabled = false;

                    }
                    document.getElementById('time_slot').value = timeSlot;
                    document.getElementById('start_time').value = startTime;
                    document.getElementById('end_time').value = endTime;
                    // format date
                    // let formattedStartDate = startDate.split(' ')[0];
                    // let formattedEndDate = endDate.split(' ')[0];
                    // document.getElementById('start_date').value = formattedStartDate;
                    // document.getElementById('end_date').value = formattedEndDate;
                    document.getElementById('save_btn').classList.add('hidden');
                    document.getElementById('delete_btn').classList.remove('hidden');
                    document.getElementById('update_btn').classList.remove('hidden');
                    document.getElementById('delete_btn').setAttribute('href', 'delete.php?id=' + id);
                }
                </script>
</body>

</html