<?php
require '../../vendor/autoload.php';
include '../../autoload.php';
session_start();

use controllers\StudentAdmissionController;
use controllers\AcademicYearController;
use controllers\AchievementController;
use controllers\SectionController;
use core\helpers\HTTP;


if (!isset($_SESSION['studentId'])) {
    HTTP::redirect('/login');
    exit();
}

$academicYearController = new AcademicYearController();
$academicYears = $academicYearController->index();
$academicYear = getYear($academicYears[0]['academic_year']);

function getYear($year)
{
    $part = explode('-', $year);
    return $part[0];
}

$data = [];

$validStudent = false;
$isRegister = false;
$found = true;
$pass = true;
$isFound = false;
$isOddSem = false;

$studentId = $_SESSION['studentId'];
$studentAdmissionController = new StudentAdmissionController($data);
$studentData = $studentAdmissionController->getStudentById($studentId);
$rollNum = $studentData["student"]['roll_num'];
$year = $studentData["student"]['year'];
$major = $studentData["student"]['major'];
$status = $studentData["student"]['status'];



$sectionController = new SectionController();
$sectionData = $sectionController->getByStudentId($studentId) ?? null;
$semesterID = $sectionData[0]["semester_id"] ?? null;
$checkStatus = $sectionData[0]["status"] ?? null;


// echo $rollNum;
$checkData = [$rollNum, $semesterID, $academicYear, $studentId];
// var_dump($checkData);


// check achievement
if (isset($_POST['checkBtn'])) {
    $achievementController = new AchievementController();
    $validStudent = $achievementController->checkAchievement($checkData);

    if ($validStudent == true) {

        if ($semesterID % 2 == 0 && $semesterID < 10) {
            $found = true;
            $pass = true; // Set pass to true if found is true
        } else {
            $isOddSem = true; // odd
            $found = true;
            $pass = true;
        }
    } else {
        $found = false;
        $pass = false;
    }

    // Make sure these variables are set for JavaScript
    echo '<script>let found = ' . json_encode($found) . '; let pass = ' . json_encode($pass) . ';</script>';
}


// register
if (isset($_POST['registerBtn'])) {
    $data = $_POST;
    $files = $_FILES;
    $studentAdmissionController = new StudentAdmissionController();
    $isRegister = $studentAdmissionController->setOldStudentAdmissions($studentId, $data, $files);
    header('location:/');
} else {
    $isRegister = false;
}

?>

<!DOCTYPE html>
<html lang="en">

<?php
include("../utils/components/student/student.links.php");
?>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Sidebar -->
        <?php
        include("../utils/components/student/student.navigation.php");
        ?>
        <!-- Desktop sidebar -->
        <?php
        include("../utils/components/student/student.sidebar.php");
        ?>
        <!-- Main content -->
        <div class=" flex flex-col flex-1 md:ml-64">
            <!-- Navbar -->
            <?php
            include("../utils/components/student/student.navigation.php");
            ?>
            <!-- Scrollable content section -->
            <div class="overflow-y-auto md:pt-16 px-4 pb-4 h-full">

                <?php if (!empty($sectionData)): ?>

                    <?php if ($status == 0): ?>
                        <div class="p-4">
                            <div>
                                <h4 class="my-4 text-2xl font-semibold text-gray-800 dark:text-gray-300">
                                    ( <?= $academicYear; ?> ) ပညာသင်နှစ်
                                </h4>
                                <!-- Content container -->
                                </section>
                                <!--end section-->
                                <!-- End Hero -->
                                <?php if (!$validStudent  && $checkStatus == 0): ?>
                                    <!-- Check Section-->
                                    <section class="relative md:py-24 py-16">
                                        <div class="container relative">
                                            <div class="grid lg:grid-cols-12 grid-cols-1" id="reserve-form">
                                                <div class="lg:col-start-2 lg:col-span-10">
                                                    <div
                                                        class="rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900 p-6">
                                                        <form action="" method="POST">
                                                            <div class="grid lg:grid-cols-12 gap-6 pt-4">
                                                                <div class="lg:col-span-12">
                                                                    <p class=" text-xl">စာမေးပွဲအောင်မြင်ကြောင်းစစ်ဆေးပါ။</p>
                                                                </div>
                                                                <div class="lg:col-span-12">
                                                                    <button type="submit" id="checkBtn" name="checkBtn"
                                                                        class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mt-4">စစ်ဆေးမည်</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                <?php endif ?>

                                <?php if ($checkStatus == 1): ?>
                                    <!-- Check Section-->
                                    <section class="relative md:py-24 py-16">
                                        <p
                                            class="rounded-md text-center shadow dark:shadow-gray-800 bg-white dark:bg-slate-900 p-6">
                                            စာမေးပွဲအောင်မြင်ပါသည်။</p>
                                    </section>
                                <?php endif ?>




                                <?php if ($validStudent && !$isOddSem  && !$isRegister): ?>
                                    <!-- Fresher Admission Form Section-->
                                    <section class="relative md:py-24 py-16">
                                        <div class="container relative">
                                            <div class="grid lg:grid-cols-12 grid-cols-1" id="reserve-form">
                                                <div class="lg:col-start-2 lg:col-span-10">
                                                    <div
                                                        class="rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900 p-6">
                                                        <form action="" method="POST" enctype="multipart/form-data">
                                                            <div class="lg:col-span-6">
                                                                <label for="major">အထူးပြုဘာသာ</label>
                                                                <select id="major" name="major"
                                                                    class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                                                    <?php if ($year == 1): ?>
                                                                        <option value="CS">CS</option>
                                                                        <option value="CT">CT</option>
                                                                    <?php else: ?>
                                                                        <option value="<?= $major ?>"><?= $major ?></option>
                                                                    <?php endif ?>

                                                                </select>
                                                            </div>
                                                            <div class="lg:col-span-12">
                                                                <div class="text-start">
                                                                    <label
                                                                        for="scholarship">ပညာသင်ထောက်ပံ့ကြေးပေးရန်မေတ္တာရပ်ခံခြင်းပြု/မပြု</label>
                                                                    <div class="mt-3 w-full py-2 px-3 h-10">
                                                                        <input name="scholarship" type="radio" value="1"> ပြု
                                                                        <input name="scholarship" type="radio" value="0" checked>
                                                                        မပြု
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="bg-indigo-300 p-5 rounded-md lg:col-span-12 ">
                                                                <label for="subject"
                                                                    class="font-semibold">လိုအပ်သောစာရွက်စာတမ်းများ</label>
                                                            </div>
                                                            <div class="lg:col-span-6">
                                                                <label for="passport_photo">လိုင်စင်ဓာတ်ပုံ (1" x 1.25") ဆိုဒ် ၁ ပုံ
                                                                    (၆လ အတွင်း
                                                                    ရိုက်ထားသောပုံ) </label>
                                                                <input name="passport_photo" id="" type="file"
                                                                    class=" w-full mt-3 cursor-pointer bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 file:bg-indigo-600 file:text-white file:border-none file:rounded-l-lg file:py-2 file:px-4 file:mr-3 file:cursor-pointer">
                                                            </div>
                                                            <div class="lg:col-span-6">
                                                                <label for="one_inch_photo">(1" x 1") ဆိုဒ် ၁ ပုံ (၆လ အတွင်း
                                                                    ရိုက်ထားသောပုံ)
                                                                </label>
                                                                <input name="one_inch_photo" id="" type="file"
                                                                    class=" w-full mt-3 cursor-pointer bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 file:bg-indigo-600 file:text-white file:border-none file:rounded-l-lg file:py-2 file:px-4 file:mr-3 file:cursor-pointer">
                                                            </div>

                                                            <div class="lg:col-span-6">
                                                                <label
                                                                    for="covid_photo">ကိုဗစ်ကာကွယ်ဆေးထိုးပြီးကြောင်းထောက်ခံချက်</label>
                                                                <input name="covid_photo" id="" type="file"
                                                                    class=" w-full mt-3 cursor-pointer bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 file:bg-indigo-600 file:text-white file:border-none file:rounded-l-lg file:py-2 file:px-4 file:mr-3 file:cursor-pointer">
                                                            </div>
                                                            <div class="lg:col-span-6">
                                                                <label for="quarter_approved_letter">ရပ်ကွက်ထောက်ခံစာ</label>
                                                                <input name="quarter_approved_letter" id="" type="file"
                                                                    class=" w-full mt-3 cursor-pointer bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 file:bg-indigo-600 file:text-white file:border-none file:rounded-l-lg file:py-2 file:px-4 file:mr-3 file:cursor-pointer">
                                                            </div>
                                                            <div class="lg:col-span-6">
                                                                <label for="police_approved_letter">ရဲစခန်းထောက်ခံစာ</label>
                                                                <input name="police_approved_letter" id="" type="file"
                                                                    class=" w-full mt-3 cursor-pointer bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 file:bg-indigo-600 file:text-white file:border-none file:rounded-l-lg file:py-2 file:px-4 file:mr-3 file:cursor-pointer">
                                                            </div>

                                                            <div class="bg-indigo-300 p-5 rounded-md lg:col-span-12 ">
                                                                <label for="subject"
                                                                    class="font-semibold">ကျောင်းလခပေးသွင်းခြင်း</label>
                                                            </div>

                                                            <div class="lg:col-span-12">
                                                                <div class="p-5">
                                                                    <ul>
                                                                        <li>ကျောင်းလခ(၁၀လစာ) - ၂၅၀၀၀ ကျပ်</li>
                                                                        <li>က-ပ-မ ကြေး - ၁၀၀၀ ကျပ်</li>
                                                                        <li>ဓါတ်ခွဲခန်းကြေး - ၅၀၀ ကျပ်</li>
                                                                        <li>စာမေးပွဲကြေး - ၁၀၀၀ ကျပ်</li>
                                                                        <li>အထွေထွေ - ၃၀၀ ကျပ်</li>
                                                                        <span
                                                                            class=" border  border-black-900"></span>
                                                                        <li class="pt-2"><b>စုစုပေါင်း - ၂၇၈၀၀
                                                                                ကျပ်</b></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="lg:col-span-12">
                                                                <div class="p-5 cursor-pointer">
                                                                    <img src="http://ucspyay.edu/utils/assets/img/ucspyay/qrcode.jpg" width="100"
                                                                        alt="QR Code" onclick="openLightbox(this);">
                                                                </div>

                                                            </div>

                                                            <div class="lg:col-span-12">
                                                                <label for="payment_screenshot">ငွေသွင်းပြီးကြောင်း
                                                                    Screenshot</label>
                                                                <input name="payment_screenshot"
                                                                    class=" w-full mt-3 cursor-pointer bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 file:bg-indigo-600 file:text-white file:border-none file:rounded-l-lg file:py-2 file:px-4 file:mr-3 file:cursor-pointer"
                                                                    id="" type="file">
                                                            </div>
                                                            <div class="lg:col-span-4">

                                                                <button type="submit" id="registerBtn" name="registerBtn"
                                                                    class="py-2  px-5 w-full inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mt-4">Register</button>
                                                            </div>
                                                        </form>
                                                        <!--end form-->
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end grid-->
                                        </div>
                                        <!--end container-->

                                    </section>
                                    <!--end section-->
                                    <!-- End Section-->
                                    </section>
                                    <!--end section-->
                                    <!-- End Section-->
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
                                        alertify.success('စာမေးပွဲအောင်မြင်ပါသည်။');
                                    <?php endif ?>
                                </script>

                                <!-- JAVASCRIPTS -->
                            <?php elseif ($status == 1): ?>
                                <div
                                    class="mx-auto mt-44 p-24 text-center rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900 p-6">
                                    <p class="text-green-600">ဆက်လက်ပညာသင်ခွင့် လျှောက်ထားခြင်းအောင်မြင်ပါသည်။</p>
                                </div>
                            <?php elseif ($status == 3): ?>
                                <div
                                    class="mx-auto mt-44 p-24 text-center rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900 p-6">
                                    <p class="text-amber-200">ဆက်လက်ပညာသင်ခွင့်အား လျှောက်ထားပြီးပါပြီ။</p>
                                    <p class="text-amber-200 pt-2">အတည်ပြု Mail အားစောင့်ပါ။</p>
                                </div>

                            <?php endif ?>

                            <!-- Light Box -->
                            <div id="lightbox" class="lightbox" onclick="closeLightbox()">
                                <span class="close">&times;</span>
                                <img class="lightbox-content" id="lightbox-img">
                            </div>
                        <?php else: ?>
                            <p
                                class="rounded-md text-center shadow dark:shadow-gray-800 bg-white dark:bg-slate-900 p-6">
                                Admin မှ Section သတ်မှတ်ခြင်းလုပ်ငန်းစဥ်အား စောင့်ဆိုင်းပါ။</p>
                        <?php endif ?>


</body>

</html>