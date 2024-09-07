<?php


include('../../../autoload.php');

session_start();

use core\helpers\HTTP;

use controllers\StudentTimetableController;

use controllers\StudentAuthController;


if (!isset($_SESSION['studentId'])) {
    HTTP::redirect('/login');
    exit();
}

if (isset($_POST['logout'])) {
    $studentAuthController = new StudentAuthController();

    $resetStatus = $studentAuthController->getStudentResetStatus();
    unset($_SESSION['studentId']);
    HTTP::redirect("/login", "reset=$resetStatus->reset_status");
    exit();
}

$studentTimetableController = new StudentTimetableController();

$academicYear = $studentTimetableController->getAcademicYear($_SESSION['studentId']);

$semesterIdAndSectionId = $studentTimetableController->getSemesterIdAndSectionIdByStudentId($_SESSION['studentId']);
if (!empty($semesterIdAndSectionId)) {

    $semester = $studentTimetableController->getSemester($semesterIdAndSectionId->semester_id);

    $section = $studentTimetableController->getSection($semesterIdAndSectionId->section_id);

    $timeTableData = $studentTimetableController->getTimeTableData($semesterIdAndSectionId->section_id, $semesterIdAndSectionId->semester_id);
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
</style>

<?php
include("../../utils/components/student/student.links.php");
?>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <?php
        include("../../utils/components/student/student.sidebar.php");
        ?>
        <div class=" flex flex-col flex-1 md:ml-64">
            <?php
            include("../../utils/components/student/student.navigation.php");
            ?>
            <div class="overflow-y-auto md:pt-16 px-4 pb-4 h-full">
                <div class="p-4">
                    <div class="flex justify-between items-start mb-4">
                        <div class=" w-full overflow-hidden rounded-lg shadow-xs">
                            <?php if (!empty($semesterIdAndSectionId)): ?>

                                <div class="w-full ">
                                    <div class="text-center mb-4 mt-4">
                                        <h2>UCS(Pyay)</h2>
                                        <h3>
                                            <?= $academicYear->{"YEAR(created_at)"} ?> -
                                            <?= $academicYear->{"YEAR(created_at)"} + 1 ?>
                                            Academic Year
                                        </h3>
                                        <h3>
                                            <?= $semester->semester ?>
                                            (<?= $section->section ?>)
                                            (TimeTable)
                                        </h3>

                                    </div>
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
                                            <?php foreach ($timeTableData as $data): ?>
                                                <?php
                                                $teacherName = $studentTimetableController->getTeachers($data->teacher_id);
                                                $courseCode = $studentTimetableController->getCourses($data->course_id);
                                                ?>
                                                <tr class="text-gray-700 dark:text-gray-400">
                                                    <td class="px-4 py-3">
                                                        <?= $data->day ?>
                                                    </td>
                                                    <td class="px-4 py-3 text-sm" colspan="<?php if ($data->time_slot == 2)
                                                                                                echo 2; ?>">
                                                        <?= $courseCode->code ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                    <div class="grid grid-cols-3 gap-3 m-4">
                                        <div>Subject</div>
                                        <div></div>
                                        <div>Teacher</div>
                                        <?php foreach ($timeTableData as $data): ?>
                                            <?php
                                            $teachers = $studentTimetableController->getTeachers($data->teacher_id);
                                            $courses = $studentTimetableController->getCourses($data->course_id);
                                            ?>
                                            <div><?= $courses->title ?></div>
                                            <div><?= $courses->code ?></div>
                                            <div><?= $teachers->teacher_name ?></div>
                                        <?php endforeach; ?>
                                        <!-- <div>Myanmar</div>
                                    <div>M-1201</div>
                                    <div>
                                        Daw Hla Hla
                                    </div> -->
                                    </div>
                                </div>
                            <?php else: ?>
                                <p
                                    class="rounded-md text-center shadow dark:shadow-gray-800 bg-white dark:bg-slate-900 p-6">
                                    Admin မှ Section သတ်မှတ်ခြင်းလုပ်ငန်းစဥ်အား စောင့်ဆိုင်းပါ။</p>

                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>