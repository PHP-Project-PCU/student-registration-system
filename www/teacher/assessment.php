<?php


require '../../vendor/autoload.php';
include '../../autoload.php';


use controllers\AcademicYearController;
use controllers\SemesterController;
use controllers\SectionController;
use controllers\CourseController;
use controllers\TimetableController;
use controllers\TeacherController;

$academicYearController = new AcademicYearController();
$academicYears = $academicYearController->index();
$currentAcademicYear = $academicYears[0]['academic_year'];

$teacherId = 1;

$teacherController = new TeacherController();
$teachers = $teacherController->index();

$sectionController = new SectionController();
$sections = $sectionController->index();

$timetableController = new TimetableController();

$courseController = new CourseController();

$semesterController = new SemesterController();
$semesters = $semesterController->index();
$currentSemesterId = $_POST['semester_id'] ?? 1;

// getting Courses by Semester
$courses = $courseController->getAllCoursesBySemester($currentSemesterId);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $currentSemesterId = $_POST['semester_id'];
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
include("../utils/components/teacher/teacher.links.php");
?>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Sidebar -->
        <?php
        include("../utils/components/teacher/teacher.sidebar.php");
        ?>
        <!-- Main content -->
        <div class=" flex flex-col flex-1 md:ml-64">
            <!-- Navbar -->
            <?php
            include("../utils/components/teacher/teacher.navigation.php");
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
                        </div>

                        <!-- <form action="" method="POST">
                            <select id="semester_id" name="semester_id"
                                onchange="this.form.submit()"
                                class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                <?php foreach ($semesters as $semester): ?>
                                    <option value="<?= $semester['id'] ?>" <?php if ($currentSemesterId == $semester['id']) echo 'selected' ?>>
                                        <?= $semester['semester'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </form> -->


                    </div>

                    <!-- New Table -->
                    <div class=" w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full ">
                            <table class="table-auto w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left  uppercase border-b ">
                                        <th class="px-4 py-3 bg-indigo-200">Date/Time</th>
                                        <th class="px-4 py-3 bg-indigo-200">9:00-10:00</th>
                                        <th class="px-4 py-3 bg-indigo-200">10:00-11:00</th>
                                        <th class="px-4 py-3 bg-indigo-200">11:00-12:00</th>
                                        <th class="px-4 py-3 bg-indigo-200">1:00-2:00</th>
                                        <th class="px-4 py-3 bg-indigo-200">2:00-3:00</th>
                                        <th class="px-4 py-3 bg-indigo-200">3:00-4:00</th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 bg-indigo-100">
                                            Monday
                                        </td>
                                        <?php
                                        $mondayTimetables = $timetableController->getTimetableByTeacher('Monday', $teacherId);

                                        foreach ($mondayTimetables as $timetable) : ?>
                                            <?php
                                            // Flag to check if course and section are found
                                            $courseFound = false;

                                            foreach ($courses as $course) {
                                                if ($course['id'] == $timetable['course_id']) {
                                                    $courseFound = true;
                                                    break; // Break after finding the course
                                                }
                                            }
                                            ?>

                                            <td
                                                <?php if ($courseFound) : ?>
                                                onclick="window.location.href='assessment.php?sem=<?= $timetable['semester_id'] ?>&sec=<?= $timetable['section_id'] ?>'"
                                                <?php endif; ?>
                                                class="px-4 py-3 text-sm" colspan="<?php if ($timetable['time_slot'] == 2) echo 2; ?>">

                                                <?php
                                                if ($courseFound) {
                                                    echo $course['code'];
                                                    echo '<br>';

                                                    foreach ($sections as $section) {
                                                        if ($section['id'] == $timetable['section_id']) {
                                                            echo $section['section'];
                                                            break; // Break after finding the section
                                                        }
                                                    }
                                                } else {
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
                                        $tuesdayTimetables = $timetableController->getTimetableByTeacher('Tuesday', $teacherId);

                                        foreach ($tuesdayTimetables as $timetable) : ?>
                                            <?php
                                            // Flag to check if course and section are found
                                            $courseFound = false;

                                            foreach ($courses as $course) {
                                                if ($course['id'] == $timetable['course_id']) {
                                                    $courseFound = true;
                                                    break; // Break after finding the course
                                                }
                                            }
                                            ?>

                                            <td
                                                <?php if ($courseFound) : ?>
                                                onclick="window.location.href='assessment.php?sem=<?= $timetable['semester_id'] ?>&sec=<?= $timetable['section_id'] ?>'"
                                                <?php endif; ?>
                                                class="px-4 py-3 text-sm" colspan="<?php if ($timetable['time_slot'] == 2) echo 2; ?>">

                                                <?php
                                                if ($courseFound) {
                                                    echo $course['code'];
                                                    echo '<br>';

                                                    foreach ($sections as $section) {
                                                        if ($section['id'] == $timetable['section_id']) {
                                                            echo $section['section'];
                                                            break; // Break after finding the section
                                                        }
                                                    }
                                                } else {
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
                                        $wednesdayTimetables = $timetableController->getTimetableByTeacher('Wednesday', $teacherId);

                                        foreach ($wednesdayTimetables as $timetable) : ?>
                                            <?php
                                            // Flag to check if course and section are found
                                            $courseFound = false;

                                            foreach ($courses as $course) {
                                                if ($course['id'] == $timetable['course_id']) {
                                                    $courseFound = true;
                                                    break; // Break after finding the course
                                                }
                                            }
                                            ?>

                                            <td
                                                <?php if ($courseFound) : ?>
                                                onclick="window.location.href='assessment.php?sem=<?= $timetable['semester_id'] ?>&sec=<?= $timetable['section_id'] ?>'"
                                                <?php endif; ?>
                                                class="px-4 py-3 text-sm" colspan="<?php if ($timetable['time_slot'] == 2) echo 2; ?>">

                                                <?php
                                                if ($courseFound) {
                                                    echo $course['code'];
                                                    echo '<br>';

                                                    foreach ($sections as $section) {
                                                        if ($section['id'] == $timetable['section_id']) {
                                                            echo $section['section'];
                                                            break; // Break after finding the section
                                                        }
                                                    }
                                                } else {
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
                                        $thursdayTimetables = $timetableController->getTimetableByTeacher('Thursday', $teacherId);

                                        foreach ($thursdayTimetables as $timetable) : ?>
                                            <?php
                                            // Flag to check if course and section are found
                                            $courseFound = false;

                                            foreach ($courses as $course) {
                                                if ($course['id'] == $timetable['course_id']) {
                                                    $courseFound = true;
                                                    break; // Break after finding the course
                                                }
                                            }
                                            ?>

                                            <td
                                                <?php if ($courseFound) : ?>
                                                onclick="window.location.href='assessment.php?sem=<?= $timetable['semester_id'] ?>&sec=<?= $timetable['section_id'] ?>'"
                                                <?php endif; ?>
                                                class="px-4 py-3 text-sm" colspan="<?php if ($timetable['time_slot'] == 2) echo 2; ?>">

                                                <?php
                                                if ($courseFound) {
                                                    echo $course['code'];
                                                    echo '<br>';

                                                    foreach ($sections as $section) {
                                                        if ($section['id'] == $timetable['section_id']) {
                                                            echo $section['section'];
                                                            break; // Break after finding the section
                                                        }
                                                    }
                                                } else {
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
                                        $fridayTimetables = $timetableController->getTimetableByTeacher('Friday', $teacherId);

                                        foreach ($fridayTimetables as $timetable) : ?>
                                            <?php
                                            // Flag to check if course and section are found
                                            $courseFound = false;

                                            foreach ($courses as $course) {
                                                if ($course['id'] == $timetable['course_id']) {
                                                    $courseFound = true;
                                                    break; // Break after finding the course
                                                }
                                            }
                                            ?>

                                            <td
                                                <?php if ($courseFound) : ?>
                                                onclick="window.location.href='assessment.php?sem=<?= $timetable['semester_id'] ?>&sec=<?= $timetable['section_id'] ?>'"
                                                <?php endif; ?>
                                                class="px-4 py-3 text-sm" colspan="<?php if ($timetable['time_slot'] == 2) echo 2; ?>">

                                                <?php
                                                if ($courseFound) {
                                                    echo $course['code'];
                                                    echo '<br>';

                                                    foreach ($sections as $section) {
                                                        if ($section['id'] == $timetable['section_id']) {
                                                            echo $section['section'];
                                                            break; // Break after finding the section
                                                        }
                                                    }
                                                } else {
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


</body>

</html