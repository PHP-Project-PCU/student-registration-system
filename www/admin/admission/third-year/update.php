<?php


require '../../../../vendor/autoload.php';
include '../../../../autoload.php';

use controllers\StudentAdmissionController;
use controllers\MailController;
use core\helpers\HTTP;

session_start();

if (!isset($_SESSION['admin'])) {
    HTTP::redirect("/login");
    exit();
}


$id = $_GET['id'];
$imageBasePath = "http://ucspyay.edu/utils/uploads/admission/$id/";
$logoImage = "http://ucspyay.edu/utils/assets/img/ucspyay/ucsp-logo-light.jpg";

$studentAdmissionController = new StudentAdmissionController();

$studentData = $studentAdmissionController->getStudentById($id);
$email = $studentData['student']['student_email'];  # change edu mail
$_SESSION['isApproved'] = null;


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['approve_btn'])) {
    $data = [
        "id" => $id,
        "name" => $studentData['student']['student_name_my'],
        "year" => 3,
        "email" => $email,
    ];
    $result = $studentAdmissionController->approveOldStudent($data);
    if ($result) {
        $mailController = new MailController($data);
        $mailController->sendMail($data);
        $_SESSION['isApproved'] = true;
        header("location:index.php");
    }
}

function formatDate($date)
{
    return date("d.m.Y", strtotime($date));
} ?>

<!DOCTYPE html>
<html lang="en">


<?php
include("../../../utils/components/admin/admin.links.php");
?>

<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
    }

    td {
        padding: 10px 5px;
    }

    .tbl,
    .tbl td {
        border: none;
    }
</style>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Sidebar -->
        <?php
        include("../../../utils/components/admin/admin.sidebar.php");
        ?>
        <!-- Main content -->
        <div class=" flex flex-col flex-1 md:ml-64">
            <!-- Navbar -->
            <?php
            include("../../../utils/components/admin/admin.navigation.php");
            ?>
            <!-- Scrollable content section -->
            <div class="overflow-y-auto md:pt-16 px-4 pb-4 h-full">


                <div class="p-4">
                    <div class="flex justify-start pb-4">
                        <button
                            onclick="window.location.href='/admission/third-year'"
                            class="px-4 py-2 my-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            &larr;
                        </button>
                        <h4
                            class="m-4 text-2xl font-semibold text-gray-800 dark:text-gray-300">
                            <?= htmlspecialchars($studentData['student']['student_name_my']); ?>၏ ပညာသင်ခွင့်လျှောက်လွှာ
                        </h4>


                    </div>

                    <!-- Start First Table -->
                    <section class="w-full my-6" id="first-tbl">
                        <div class="grid grid-cols-1 lg:grid-cols-2">
                            <div class="text-center mx-auto">
                                <img src="<?php if (!empty($studentData['files']['passport_photo'])) {
                                                echo $imageBasePath . htmlspecialchars($studentData['files']['passport_photo']);
                                            } else {
                                                echo $logoImage;
                                            } ?>" class="w-36 my-6" alt="Profile Image" onclick="openLightbox(this);">
                            </div>
                            <div class=" w-full">
                                <table class="w-full table-fixed">
                                    <tr>
                                        <td class="text-start">သင်တန်းနှစ်</td>
                                        <td class="text-indigo-600"><?php if (($studentData['student']['year']) == 3) echo "တတိယနှစ်"; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">အထူးပြုဘာသာ</td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['student']['major']); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">ခုံအမှတ်</td>
                                        <td class="text-indigo-600"><?= 'PaKaPaTa - ' . htmlspecialchars($studentData['student']['roll_num']); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">တက္ကသိုလ်မှတ်ပုံတင်အမှတ်</td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['student']['matriculation_reg_num']); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-start">တက္ကသိုလ်ဝင်ရောက်သည့်ခုနှစ်</td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['student']['started_year']); ?></td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </section> <!-- End First Table -->

                    <!-- Second Table -->
                    <div class=" w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full ">
                            <table class="w-full ">
                                <thead class="bg-gray-50 border-b-2 ">
                                    <tr>
                                        <th colspan="2" class=" p-3 tracking-wide text-start">ပညာသင်ခွင့်တောင်းခံသူ</th>
                                        <th class=" p-3 tracking-wide text-left">ကျောင်းသား/သူ</th>
                                        <th class=" p-3 tracking-wide text-left">အဘ</th>
                                        <th class=" p-3 tracking-wide text-left">အမိ</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td rowspan="2" class="">အမည်</td>
                                        <td class="">မြန်မာစာဖြင့်</td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['student']['student_name_my']); ?></td>
                                        <td class="text-indigo-600"> <?= htmlspecialchars($studentData['parent']['student_fath_name_my']); ?></td>
                                        <td class="text-indigo-600"> <?= htmlspecialchars($studentData['parent']['student_moth_name_my']); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="">အင်္ဂလိပ်စာဖြင့်</td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['student']['student_name_en']); ?></td>
                                        <td class="text-indigo-600"> <?= htmlspecialchars($studentData['parent']['student_fath_name_en']); ?></td>
                                        <td class="text-indigo-600"> <?= htmlspecialchars($studentData['parent']['student_moth_name_en']); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-start" colspan="2">လူမျိုး</td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['student']['student_ethnicity']); ?></td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['parent']['student_fath_ethnicity']); ?></td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['parent']['student_moth_ethnicity']); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-start" colspan="2">ကိုးကွယ်သည့်ဘာသာ</td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['student']['student_religion']); ?></td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['parent']['student_fath_religion']); ?></td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['parent']['student_moth_religion']); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-start" colspan="2">မွေးဖွားရာဇာတိ</td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['student']['student_birth_place']); ?></td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['parent']['student_fath_birth_place']); ?></td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['parent']['student_moth_birth_place']); ?></td>

                                    </tr>
                                    <tr>
                                        <td class="text-start" colspan="2">မြို့နယ်/ပြည်နယ်/တိုင်း</td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['student']['student_township']) . "၊" . htmlspecialchars($studentData['student']['student_region']); ?></td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['parent']['student_fath_township']) . "၊" . htmlspecialchars($studentData['parent']['student_fath_region']); ?></td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['parent']['student_moth_township']) . "၊" . htmlspecialchars($studentData['parent']['student_moth_region']); ?></td>

                                    <tr>
                                        <td class="text-start" colspan="2">မှတ်ပုံတင်အမှတ်</td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['student']['student_nrc']); ?></td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['parent']['student_fath_nrc']); ?></td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['parent']['student_moth_nrc']); ?></td>

                                    </tr>
                                    <tr>
                                        <td class="text-start" colspan="2">နိုင်ငံခြားသား</td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['student']['student_nationality']); ?></td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['parent']['student_fath_nationality']); ?></td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['parent']['student_moth_nationality']); ?></td>

                                    </tr>
                                    <tr>
                                        <td class="text-start" colspan="2">မွေးသက္ကရာဇ်</td>
                                        <td class="text-indigo-600"><?= formatDate(htmlspecialchars($studentData['student']['student_dob'])); ?></td>
                                        <td class="text-indigo-600" rowspan="4" colspan="2">
                                            <p class="text-black py-2">အဘအုပ်ထိန်းသူ၏အလုပ်အကိုင်၊လိပ်စာအပြည့်အစုံ</p>
                                            <p>
                                                <?= htmlspecialchars($studentData['parent']['student_fath_job']); ?> ၊
                                                <?= htmlspecialchars($studentData['parent']['student_fath_address']); ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="3" class="">တက္ကသိုလ်စာမေးပွဲအောင်မြင်သည့်</td>
                                        <td class="">ခုံအမှတ်</td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['student']['matriculation_roll_num']); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="">ခုနှစ်</td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['student']['matriculation_year']); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="">စာစစ်ဌာန</td>
                                        <td class="text-indigo-600"><?= htmlspecialchars($studentData['student']['matriculation_exam_center']); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <p>
                                                အမြဲတမ်းနေထိုင်သည့်လိပ်စာ(အပြည့်အစုံ)
                                            </p>
                                            <p class="text-indigo-600 py-2">
                                                <?= htmlspecialchars($studentData['student']['student_current_address']); ?>
                                            </p>
                                        </td>
                                        <td colspan="2">
                                            <p>
                                                အမိအုပ်ထိန်းသူ၏အလုပ်အကိုင်၊လိပ်စာအပြည့်အစုံ
                                            </p>
                                            <p class="text-indigo-600 py-2">
                                                <?= htmlspecialchars($studentData['parent']['student_moth_job']); ?> ၊
                                                <?= htmlspecialchars($studentData['parent']['student_moth_address']); ?>
                                            </p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" rowspan="5" class="text-start">ကျောင်းနေရန်အထောက်အပံ့ပြုမည့်ပုဂ္ဂိုလ်</td>
                                        <td colspan="1" class="text-start">(က) အမည်</td>
                                        <td colspan="2" class="text-start text-indigo-600"><?= htmlspecialchars($studentData['guardian']['guardian_name']); ?></td>

                                    </tr>
                                    <tr>
                                        <td colspan="1" class="text-start">(ခ) ဆွေမျိုးတော်စပ်ပုံ</td>
                                        <td colspan="2" class="text-start text-indigo-600"><?= htmlspecialchars($studentData['guardian']['guardian_relation']); ?></td>

                                    </tr>
                                    <tr>
                                        <td colspan="1" class="text-start">(ဂ) အလုပ်အကိုင်</td>
                                        <td colspan="2" class="text-start text-indigo-600"><?= htmlspecialchars($studentData['guardian']['guardian_job']); ?></td>

                                    </tr>
                                    <tr>
                                        <td colspan="1" class="text-start">(ဃ) ဆက်သွယ်ရန်လိပ်စာ</td>
                                        <td colspan="2" class="text-start text-indigo-600"><?= htmlspecialchars($studentData['guardian']['guardian_address']); ?></td>

                                    </tr>
                                    <tr>
                                        <td colspan="1" class="text-start">(င) ဖုန်းနံပါတ်</td>
                                        <td colspan="2" class="text-start text-indigo-600"><?= htmlspecialchars($studentData['guardian']['guardian_phone_num']); ?></td>

                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-start">ပညာသင်ထောက်ပံ့ကြေးပေးရန်မေတ္တာရပ်ခံခြင်းပြု/မပြု</td>
                                        <td colspan="2" class="text-start text-indigo-600"><?= htmlspecialchars($studentData['student']['scholarship']) == 0 ? "မပြု" : "ပြု"; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Files Section -->
                    <div class=" w-full px-4 py-3 my-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <h3 class="font-semibold text-xl">ကျောင်းသားမှတ်ပုံတင်</h3>
                        <table class="tbl">
                            <tr>
                                <td>
                                    <div class="text-center mx-auto">
                                        <img src="<?= $imageBasePath . htmlspecialchars($studentData['files']['student_nrc_photo_front']); ?>" class=" my-6" alt="" onclick="openLightbox(this);">
                                    </div>
                                </td>
                                <td>
                                    <div class=" text-center mx-auto">
                                        <img src="<?= $imageBasePath . htmlspecialchars($studentData['files']['student_nrc_photo_back']); ?>" class=" my-6" alt="" onclick="openLightbox(this);">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class=" w-full px-4 py-3 my-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <h3 class="font-semibold text-xl">အဘမှတ်ပုံတင်</h3>
                        <table class="tbl">
                            <tr>
                                <td>
                                    <div class="text-center mx-auto">
                                        <img src="<?= $imageBasePath . htmlspecialchars($studentData['files']['fath_nrc_photo_front']); ?>" class=" my-6" alt="" onclick="openLightbox(this);">
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center mx-auto">
                                        <img src="<?= $imageBasePath . htmlspecialchars($studentData['files']['fath_nrc_photo_back']); ?>" class=" my-6" alt="" onclick="openLightbox(this);">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class=" w-full px-4 py-3 my-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <h3 class="font-semibold text-xl">အမိမှတ်ပုံတင်</h3>
                        <table class="tbl">
                            <tr>
                                <td>
                                    <div class="text-center mx-auto">
                                        <img src="<?= $imageBasePath . htmlspecialchars($studentData['files']['moth_nrc_photo_front']); ?>" class=" my-6" alt="" onclick="openLightbox(this);">
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center mx-auto">
                                        <img src="<?= $imageBasePath . htmlspecialchars($studentData['files']['moth_nrc_photo_back']); ?>" class=" my-6" alt="" onclick="openLightbox(this);">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class=" w-full px-4 py-3 my-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <h3 class="font-semibold text-xl">၁၀ တန်းအောင်လက်မှတ်</h3>
                        <table class="tbl">
                            <tr>
                                <td>
                                    <div class="text-center mx-auto">
                                        <img src="<?= $imageBasePath . htmlspecialchars($studentData['files']['matriculation_certificate']); ?>" class=" my-6" alt="" onclick="openLightbox(this);">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class=" w-full px-4 py-3 my-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <h3 class="font-semibold text-xl">၁၀ တန်းအမှတ်စာရင်း</h3>
                        <table class="tbl">
                            <tr>
                                <td>
                                    <div class="text-center mx-auto">
                                        <img src="<?= $imageBasePath . htmlspecialchars($studentData['files']['matriculation_mark_photo']); ?>" class=" my-6" alt="" onclick="openLightbox(this);">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class=" w-full px-4 py-3 my-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <h3 class="font-semibold text-xl">အိမ်ထောင်စုစာရင်း</h3>
                        <table class="tbl">
                            <tr>
                                <td>
                                    <div class="text-center mx-auto">
                                        <img src="<?= $imageBasePath . htmlspecialchars($studentData['files']['house_registration_photo_front']); ?>" class=" my-6" alt="" onclick="openLightbox(this);">
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center mx-auto">
                                        <img src="<?= $imageBasePath . htmlspecialchars($studentData['files']['house_registration_photo_back']); ?>" class=" my-6" alt="" onclick="openLightbox(this);">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class=" w-full px-4 py-3 my-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <h3 class="font-semibold text-xl">ကိုဗစ်ကာကွယ်ဆေးထိုးပြီးကြောင်းထောက်ခံချက်</h3>
                        <table class="tbl">
                            <tr>
                                <td>
                                    <div class="text-center mx-auto">
                                        <img src="<?= $imageBasePath . htmlspecialchars($studentData['files']['covid_photo']); ?>" class=" my-6" alt="" onclick="openLightbox(this);">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class=" w-full px-4 py-3 my-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <h3 class="font-semibold text-xl">ရပ်ကွက်ထောက်ခံစာ</h3>
                        <table class="tbl">
                            <tr>
                                <td>
                                    <div class="text-center mx-auto">
                                        <img src="<?= $imageBasePath . htmlspecialchars($studentData['files']['quarter_approved_letter']); ?>" class=" my-6" alt="" onclick="openLightbox(this);">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class=" w-full px-4 py-3 my-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <h3 class="font-semibold text-xl">ရဲစခန်းထောက်ခံစာ</h3>
                        <table class="tbl">
                            <tr>
                                <td>
                                    <div class="text-center mx-auto">
                                        <img src="<?= $imageBasePath . htmlspecialchars($studentData['files']['police_approved_letter']); ?>" class=" my-6" alt="" onclick="openLightbox(this);">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class=" w-full px-4 py-3 my-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <h3 class="font-semibold text-xl">ငွေသွင်းပြီးကြောင်း Screenshot</h3>
                        <table class="tbl">
                            <tr>
                                <td>
                                    <div class="text-center mx-auto">
                                        <img src="<?= $imageBasePath . htmlspecialchars($studentData['files']['payment_screenshot']); ?>" class=" my-6" alt="" onclick="openLightbox(this);">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>



                    <!-- Admin Approve Section -->
                    <form action="" method="POST">
                        <button
                            name="approve_btn"
                            class="px-4 py-2 my-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            အတည်ပြု၍ mail ပို့မည်
                        </button>
                    </form>


                </div>
            </div>

            <!-- Light Box -->
            <div id="lightbox" class="lightbox" onclick="closeLightbox()">
                <span class="close">&times;</span>
                <img class="lightbox-content" id="lightbox-img">
            </div>
</body>

</html>