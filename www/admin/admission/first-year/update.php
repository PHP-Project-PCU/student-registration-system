<?php


require '../../../../vendor/autoload.php';
include '../../../../autoload.php';

use controllers\StudentAdmissionController;
use controllers\MailController;


$id = $_GET['id'];

$studentAdmissionController = new StudentAdmissionController();

$studentData = $studentAdmissionController->getStudentById($id);
$email = $studentData['student']['student_email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        "id" => $id,
        "name" => $studentData['student']['student_name_my'],
        "roll_num" => $_POST['roll_num'],
        "edu_mail" => $_POST['edu_mail'],
        "password" => $_POST['password'],
    ];
    $result = $studentAdmissionController->approveFresher($data);
    if ($result) {
        $mailController = new MailController($email);
        $mailController->sendMail($data);
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
</style>


<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <?php
        include("../../../utils/components/admin/admin.sidebar.php");
        ?>
        <div class=" flex flex-col flex-1 w-full">
            <?php
            include("../../../utils/components/admin/admin.navigation.php");
            ?>

            <div class="p-4">
                <div class="flex justify-between pb-4">
                    <h4
                        class="m-4 text-2xl font-semibold text-gray-800 dark:text-gray-300">
                        <?= htmlspecialchars($studentData['student']['student_name_my']); ?>၏ ဝင်ခွင့်လျှောက်လွှာ
                    </h4>


                </div>
                <!-- New Table -->
                <div class=" w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full ">
                        <table class="w-full ">
                            <thead class="bg-gray-50 border-b-2 ">
                                <tr>
                                    <th colspan="2" class=" p-3 tracking-wide text-start">၁။ ပညာသင်ခွင့်တောင်းခံသူ</th>
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
                                        <p class="text-indigo-600">
                                            <?= htmlspecialchars($studentData['student']['student_current_address']); ?>
                                        </p>
                                    </td>
                                    <td colspan="2">
                                        <p>
                                            အမိအုပ်ထိန်းသူ၏အလုပ်အကိုင်၊လိပ်စာအပြည့်အစုံ
                                        </p>
                                        <p class="text-indigo-600">
                                            <?= htmlspecialchars($studentData['parent']['student_moth_job']); ?> ၊
                                            <?= htmlspecialchars($studentData['parent']['student_moth_address']); ?>
                                        </p>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2" rowspan="5" class="text-start">၃။ ကျောင်းနေရန်အထောက်အပံ့ပြုမည့်ပုဂ္ဂိုလ်</td>
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
                                    <td colspan="3" class="text-start">၄။ ပညာသင်ထောက်ပံ့ကြေးပေးရန်မေတ္တာရပ်ခံခြင်းပြု/မပြု</td>
                                    <td colspan="2" class="text-start text-indigo-600"><?= htmlspecialchars($studentData['student']['scholarship']) == 0 ? "မပြု" : "ပြု"; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="md:w-1/2 px-4 py-3 my-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <form action="" method="POST">
                        <label class="block text-sm">
                            <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Roll No:</span>
                            <input
                                class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                name="roll_num" placeholder="XXXXXX" required />
                        </label>
                        <label class="block text-sm py-4">
                            <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Edu Mail</span>
                            <input
                                class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                name="edu_mail" placeholder="student@ucspyay.edu.mm" required />
                        </label>
                        <label class="block text-sm">
                            <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Password</span>
                            <input
                                class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                name="password" placeholder="" required />
                        </label>

                        <div class="flex justify-end">
                            <button
                                name="approve_btn"
                                class="px-4 py-2 my-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                အတည်ပြု၍ mail ပို့မည်
                            </button>
                        </div>
                    </form>
                </div>
            </div>


</body>


</html>