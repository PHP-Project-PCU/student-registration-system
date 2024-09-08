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
                                            <?php
                                            // Group timetable data by day
                                            $groupedData = [];
                                            foreach ($timeTableData as $data) {
                                                $groupedData[$data->day][] = $data;
                                            }
                                            ?>

                                            <?php foreach ($groupedData as $day => $subjects): ?>
                                                <tr class="text-gray-700 dark:text-gray-400">
                                                    <!-- Display Day (only once per row) -->
                                                    <td class="px-4 py-3">
                                                        <?= $day ?>
                                                    </td>

                                                    <!-- Loop through the subjects for this day -->
                                                    <?php foreach ($subjects as $subject): ?>
                                                        <?php
                                                        // Fetch teacher and course information
                                                        $teacherName = $studentTimetableController->getTeachers($subject->teacher_id);
                                                        $courseCode = $studentTimetableController->getCourses($subject->course_id);
                                                        ?>

                                                        <!-- Display each subject in its own cell -->
                                                        <td class="px-4 py-3 text-sm"
                                                            colspan="<?= ($subject->time_slot == 2) ? 2 : 1; ?>">
                                                            <?= $courseCode->code ?>
                                                        </td>
                                                    <?php endforeach; ?>

                                                    <!-- Fill empty cells if there are fewer than 6 subjects -->
                                                    <?php for ($i = count($subjects); $i < 4; $i++): ?>
                                                        <td class="px-4 py-3 text-sm"></td>
                                                    <?php endfor; ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>

                                    </table>
                                    <div class="grid grid-cols-3 gap-3 m-4">
                                        <div>Subject</div>
                                        <div></div>
                                        <div>Teacher</div>
                                        <?php
                                        // Array to track displayed teacher and course combinations
                                        $displayedTeachersCourses = [];

                                        foreach ($timeTableData as $data):
                                            // Get teacher and course data
                                            $teachers = $studentTimetableController->getTeachers($data->teacher_id);
                                            $courses = $studentTimetableController->getCourses($data->course_id);

                                            // Create a unique key for the teacher-course combination
                                            $combinationKey = $courses->id . '-' . $teachers->id;

                                            // Check if this combination has already been displayed
                                            if (!in_array($combinationKey, $displayedTeachersCourses)) {
                                                // Display course and teacher info
                                                ?>
                                                <div><?= $courses->title ?></div>
                                                <div><?= $courses->code ?></div>
                                                <div><?= $teachers->teacher_name ?></div>
                                                <?php
                                                // Add this combination to the displayed list
                                                $displayedTeachersCourses[] = $combinationKey;
                                            }
                                        endforeach;
                                        ?>

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