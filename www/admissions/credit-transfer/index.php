<!DOCTYPE html>
<html lang="en" class="light scroll-smooth">

<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';
include("../../utils/components/links.php");
include("../../utils/components/navigation.php");

use controllers\StudentAdmissionController;
use controllers\AcademicYearController;
use controllers\PaymentController;

$academicYearController = new AcademicYearController();
$academicYears = $academicYearController->index();
$academicYear = $academicYears[0]['academic_year'];


$heroImageFile = "../../utils/assets/img/ucspyay/ucsp-front-build.jpg";
$guideVideoUrl = "https://youtu.be/-1mJWy30NNM";

$data = [];

$isRegister = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registerBtn'])) {
    $data = $_POST;
    $studentAdmissionController = new StudentAdmissionController($data);
    $isRegister = $studentAdmissionController->setStudentAdmissionsByStatus($data);
} else {
    $isRegister = false;
}

$paymentController = new PaymentController();
$fees = $paymentController->getPaymentsBySemesterId(intval($_POST['year']));

?>

<body class="font-nunito text-base text-black dark:text-white dark:bg-slate-900 scroll-smooth">
    <!-- Start Hero -->
    <section class="relative table w-full py-36 lg:py-44 bg-no-repeat bg-cover">
        <div
            class="absolute w-full inset-0 bg-[url('<?= $heroImageFile ?>')] bg-no-repeat bg-center bg-cover bg-fixed backdrop-blur-lg">
        </div>
        <div class="absolute inset-0 bg-black opacity-80"></div>

        <!-- Content container -->
        <div class="relative container">
            <div class="grid grid-cols-1 p-8 text-center mt-12 rounded-md border border-white transparent">
                <h3 class="mb-4 md:text-2xl text-xl md:leading-normal leading-normal font-bold text-white">
                    ( <?= $academicYear; ?> ) ပညာသင်နှစ်
                </h3>
                <h3 class="mb-4 md:text-4xl text-3xl md:leading-normal leading-normal font-bold text-white">
                    "ကျောင်းပြောင်းကျောင်းသား/ကျောင်းသူများပညာသင်ခွင့်လျှောက်လွှာ"
                </h3>
            </div>
            <!--end grid-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- End Hero -->


    <!-- Credit Transfer Admission Form Section-->
    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid lg:grid-cols-12 grid-cols-1" id="reserve-form">
                <div class="lg:col-start-2 lg:col-span-10">
                    <div class="rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900 p-6">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <p><a href="<?= $guideVideoUrl ?>"
                                    class=" mb-8 text-indigo-600 hover:underline cursor-pointer"
                                    target="_blank">လျှောက်လွှာဖြည့်နည်းလမ်းညွှန်(ကြည့်မည်)</a></p>
                            <div class="grid lg:grid-cols-12 gap-6 pt-4">
                                <div class="lg:col-span-6">
                                    <label for="year">သင်တန်းနှစ်</label>
                                    <select id="year" name="year" onchange="this.form.submit()"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                        <option>Select Year</option>
                                        <option value="1">ပထမနှစ်</option>
                                        <option value="2">ဒုတိယနှစ်</option>
                                        <option value="3">တတိယနှစ်</option>
                                        <option value="4">စတုတ္ထနှစ်</option>
                                        <option value="5">ပဥ္စမနှစ်</option>
                                    </select>
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="major">အထူးပြုဘာသာ</label>
                                    <select id="major" name="major"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                        <option value="CST">CST</option>
                                        <option value="CS">CS</option>
                                        <option value="CT">CT</option>
                                    </select>
                                </div>
                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="matriculation_reg_num">တက္ကသိုလ်ဝင်ရောက်သည့်အမှတ်</label>
                                        <input name="matriculation_reg_num" id="matriculation_reg_num" type="number"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="80">
                                    </div>
                                </div>
                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="started_year">တက္ကသိုလ်ဝင်ရောက်သည့်ခုနှစ်</label>
                                        <input name="started_year" id="started_year" type="number"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="">
                                    </div>
                                </div>
                                <!-- Student Information -->
                                <div class="bg-indigo-300 p-5 rounded-md  lg:col-span-12 ">
                                    <label for="subject" class="font-semibold">ကျောင်းသား/သူအချက်အလက်</label>
                                </div>
                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="student_name_my">အမည်(မြန်မာစာဖြင့်)</label>
                                        <input name="student_name_my" id="student_name_my" type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="မောင်/မ">
                                    </div>
                                </div>
                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="student_name_en">အမည်(အင်္ဂလိပ်စာဖြင့်)</label>
                                        <input name="student_name_en" id="student_name_en" type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="Mg / Ma...">
                                    </div>
                                </div>
                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="student_ethnicity">လူမျိုး</label>
                                        <input name="student_ethnicity" id="student_ethnicity" type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="student_religion">ကိုးကွယ်သည့်ဘာသာ</label>
                                    <input name="student_religion" id="student_religion" type="text"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                        placeholder="">
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="student_birth_place">မွေးဖွားရာဇာတိ</label>
                                    <input name="student_birth_place" id="student_birth_place" type="text"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                        placeholder="">
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="student_nationality">နိုင်ငံခြားသား</label>
                                    <select id="student_nationality" name="student_nationality"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                        <option value="တိုင်းရင်းသား">တိုင်းရင်းသား</option>
                                        <option value="နိုင်ငံခြားသား">နိုင်ငံခြားသား</option>
                                    </select>
                                </div>
                                <div class="lg:col-span-4">
                                    <div class="text-start">
                                        <label for="student_dob">မွေးသက္ကရာဇ်</label>
                                        <input name="student_dob" id="student_dob" type="date"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="lg:col-span-4">
                                    <div class="text-start">
                                        <label for="student_email">Email လိပ်စာ</label>
                                        <input name="student_email" id="student_email" type="email"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="Email :">
                                    </div>
                                </div>

                                <div class="lg:col-span-4">
                                    <div class="text-start">
                                        <label for="student_phone_num">ဖုန်းနံပါတ်</label>
                                        <input name="student_phone_num" id="student_phone_num" type="number"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="Phone No. :">
                                    </div>
                                </div>
                                <div class="lg:col-span-3">
                                    <label for="student_nrc_code">နိုင်ငံသား စိစစ်ရေးအမှတ်</label>
                                    <select id="student_nrc_code" name="student_nrc_code"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                    </select>
                                </div>
                                <div class="lg:col-span-3">
                                    <label for="student_nrc_name">&nbsp;</label>
                                    <select id="student_nrc_name" name="student_nrc_name"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                    </select>
                                </div>
                                <div class="lg:col-span-3">
                                    <label for="studen_nrc_type">&nbsp;</label>
                                    <select id="studen_nrc_type" name="student_nrc_type"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                        <option value="(သ)">(သ)</option>
                                        <option value="(သီ)">(သီ)</option>
                                        <option value="(နိုင်)">(နိုင်)</option>
                                        <option value="(ပြု)">(ပြု)</option>
                                        <option value="(ဧည့်)">(ဧည့်)</option>
                                    </select>
                                </div>
                                <div class="lg:col-span-3">
                                    <label for="student_nrc_num">&nbsp;</label>
                                    <input name="student_nrc_num" id="student_nrc_num" type="number"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                        placeholder="xxxxxx">
                                </div>
                                <div class="lg:col-span-4">
                                    <label for="student_region">နေရပ်လိပ်စာ အပြည့်အစုံ</label>
                                    <select id="student_region" name="student_region"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                    </select>
                                </div>
                                <div class="lg:col-span-4">
                                    <label for="student_township">&nbsp;</label>
                                    <select id="student_township" name="student_township"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                    </select>
                                </div>
                                <div class="lg:col-span-4">
                                    <label for="student_current_address">&nbsp;</label>
                                    <input name="student_current_address" id="student_current_address" type="text"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                        placeholder="လိပ်စာအပြည့်အစုံ">
                                </div>
                                <div class="lg:col-span-12">
                                    <label for="">တက္ကသိုလ်ဝင်တန်းအောင်မြင်သည့်</label>
                                </div>
                                <div class="lg:col-span-4">
                                    <div class="text-start">
                                        <label for="matriculation_roll_num">ခုံအမှတ်</label>
                                        <input name="matriculation_roll_num" id="matriculation_roll_num" type="text"
                                            value="" class=" form-input mt-3 w-full py-2 px-3 h-10 bg-transparent
                                            dark:bg-slate-900 dark:text-slate-200 rounded outline-none border
                                            border-gray-200 focus:border-indigo-600 dark:border-gray-800
                                            dark:focus:border-indigo-600 focus:ring-0" placeholder="">
                                    </div>
                                </div>
                                <div class="lg:col-span-4">
                                    <div class="text-start">
                                        <label for="matriculation_year">ခုနှစ်</label>
                                        <input name="matriculation_year" id="matriculation_year" type="number" value=""
                                            class=" form-input mt-3 w-full py-2 px-3 h-10 bg-transparent
                                            dark:bg-slate-900 dark:text-slate-200 rounded outline-none border
                                            border-gray-200 focus:border-indigo-600 dark:border-gray-800
                                            dark:focus:border-indigo-600 focus:ring-0" placeholder="">
                                    </div>
                                </div>
                                <div class="lg:col-span-4">
                                    <div class="text-start">
                                        <label for="matriculation_exam_center">စာစစ်ဌာန</label>
                                        <input name="matriculation_exam_center" id="matriculation_exam_center"
                                            type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="">
                                    </div>
                                </div>
                                <!-- Father Information -->
                                <div class="bg-indigo-300 p-5 rounded-md lg:col-span-12 ">
                                    <label for="subject" class="font-semibold">အဘအုပ်ထိန်းသူ၏အချက်အလက်</label>
                                </div>
                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="student_fath_name_my">အမည်(မြန်မာစာဖြင့်)</label>
                                        <input name="student_fath_name_my" id="student_fath_name_my" type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="student_fath_name_en">အမည်(အင်္ဂလိပ်စာဖြင့်)</label>
                                        <input name="student_fath_name_en" id="student_fath_name_en" type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="student_fath_ethnicity">လူမျိုး</label>
                                        <input name="student_fath_ethnicity" id="student_fath_ethnicity" type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="student_fath_religion">ကိုးကွယ်သည့်ဘာသာ</label>
                                    <input name="student_fath_religion" id="student_fath_religion" type="text"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                        placeholder="">
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="student_fath_birth_place">မွေးဖွားရာဇာတိ</label>
                                    <input name="student_fath_birth_place" id="student_fath_birth_place" type="text"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                        placeholder="">
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="student_fath_nationality">နိုင်ငံခြားသား</label>
                                    <select id="student_fath_nationality" name="student_fath_nationality"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                        <option value="တိုင်းရင်းသား">တိုင်းရင်းသား</option>
                                        <option value="နိုင်ငံခြားသား">နိုင်ငံခြားသား</option>
                                    </select>
                                </div>
                                <div class="lg:col-span-3">
                                    <label for="student_fath_nrc_code">နိုင်ငံသား စိစစ်ရေးအမှတ်</label>
                                    <select id="student_fath_nrc_code" name="student_fath_nrc_code"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                    </select>
                                </div>
                                <div class="lg:col-span-3">
                                    <label for="student_fath_nrc_name">&nbsp;</label>
                                    <select id="student_fath_nrc_name" name="student_fath_nrc_name"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                    </select>
                                </div>
                                <div class="lg:col-span-3">
                                    <label for="student_fath_nrc_type">&nbsp;</label>
                                    <select id="student_fath_nrc_type" name="student_fath_nrc_type"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                        <option value="(သ)">(သ)</option>
                                        <option value="(သီ)">(သီ)</option>
                                        <option value="(နိုင်)">(နိုင်)</option>
                                        <option value="(ပြု)">(ပြု)</option>
                                        <option value="(ဧည့်)">(ဧည့်)</option>
                                    </select>
                                </div>
                                <div class="lg:col-span-3">
                                    <label for="student_fath_nrc_num">&nbsp;</label>
                                    <input name="student_fath_nrc_num" id="student_fath_nrc_num" type="number"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                        placeholder="xxxxxx">
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="student_fath_region">နေရပ်လိပ်စာ အပြည့်အစုံ</label>
                                    <select id="student_fath_region" name="student_fath_region"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                    </select>
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="student_fath_township">&nbsp;</label>
                                    <select id="student_fath_township" name="student_fath_township"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                    </select>
                                </div>
                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="student_fath_job">အလုပ်အကိုင်</label>
                                        <input name="student_fath_job" id="student_fath_job" type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="student_fath_phone_num">ဖုန်းနံပါတ်</label>
                                        <input name="student_fath_phone_num" id="student_fath_phone_num" type="number"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="Phone No. :">
                                    </div>
                                </div>
                                <div class="lg:col-span-12">
                                    <div class="text-start">
                                        <label for="student_fath_address">အဘအုပ်ထိန်းသူ၏လိပ်စာအပြည့်အစုံ</label>
                                        <textarea name="student_fath_address" id="student_fath_address"
                                            class="form-input mt-3 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder=""></textarea>
                                    </div>
                                </div>
                                <!-- Mother Information -->
                                <div class="bg-indigo-300 p-5 rounded-md lg:col-span-12 ">
                                    <label for="" class="font-semibold">အမိအုပ်ထိန်းသူ၏အချက်အလက်</label>
                                </div>
                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="student_moth_name_my">အမည်(မြန်မာစာဖြင့်)</label>
                                        <input name="student_moth_name_my" id="student_moth_name_my" type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="student_moth_name_en">အမည်(အင်္ဂလိပ်စာဖြင့်)</label>
                                        <input name="student_moth_name_en" id="student_moth_name_en" type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="student_moth_ethnicity">လူမျိုး</label>
                                        <input name="student_moth_ethnicity" id="student_moth_ethnicity" type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="student_moth_religion">ကိုးကွယ်သည့်ဘာသာ</label>
                                    <input name="student_moth_religion" id="student_moth_religion" type="text"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                        placeholder="">
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="student_moth_birth_place">မွေးဖွားရာဇာတိ</label>
                                    <input name="student_moth_birth_place" id="student_moth_birth_place" type="text"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                        placeholder="">
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="student_moth_nationality">နိုင်ငံခြားသား</label>
                                    <select id="student_moth_nationality" name="student_moth_nationality"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                        <option value="တိုင်းရင်းသား">တိုင်းရင်းသား</option>
                                        <option value="နိုင်ငံခြားသား">နိုင်ငံခြားသား</option>
                                    </select>
                                </div>
                                <div class="lg:col-span-3">
                                    <label for="student_moth_nrc_code">နိုင်ငံသား စိစစ်ရေးအမှတ်</label>
                                    <select id="student_moth_nrc_code" name="student_moth_nrc_code"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                    </select>
                                </div>
                                <div class="lg:col-span-3">
                                    <label for="student_moth_nrc_name">&nbsp;</label>
                                    <select id="student_moth_nrc_name" name="student_moth_nrc_name"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                    </select>
                                </div>
                                <div class="lg:col-span-3">
                                    <label for="student_moth_nrc_type">&nbsp;</label>
                                    <select id="student_moth_nrc_type" name="student_moth_nrc_type"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                        <option value="(သ)">(သ)</option>
                                        <option value="(သီ)">(သီ)</option>
                                        <option value="(နိုင်)">(နိုင်)</option>
                                        <option value="(ပြု)">(ပြု)</option>
                                        <option value="(ဧည့်)">(ဧည့်)</option>
                                    </select>
                                </div>
                                <div class="lg:col-span-3">
                                    <label for="student_moth_nrc_num">&nbsp;</label>
                                    <input name="student_moth_nrc_num" id="student_moth_nrc_num" type="number"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                        placeholder="xxxxxx">
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="student_moth_region">နေရပ်လိပ်စာ အပြည့်အစုံ</label>
                                    <select id="student_moth_region" name="student_moth_region"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                    </select>
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="student_moth_township">&nbsp;</label>
                                    <select id="student_moth_township" name="student_moth_township"
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                    </select>
                                </div>
                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="student_moth_job">အလုပ်အကိုင်</label>
                                        <input name="student_moth_job" id="student_moth_job" type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="student_moth_phone_num">ဖုန်းနံပါတ်</label>
                                        <input name="student_moth_phone_num" id="student_moth_phone_num" type="number"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="Phone No. :">
                                    </div>
                                </div>
                                <div class="lg:col-span-12">
                                    <div class="text-start">
                                        <label for="student_moth_address">အမိအုပ်ထိန်းသူ၏လိပ်စာအပြည့်အစုံ</label>
                                        <textarea name="student_moth_address" id="student_moth_address"
                                            class="form-input mt-3 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder=""></textarea>
                                    </div>
                                </div>
                                <!-- Supporter Information -->
                                <div class="bg-indigo-300 p-5 rounded-md lg:col-span-12 ">
                                    <label for="" class="font-semibold">ကျောင်းနေရန်အထောက်အပံ့ပြုမည့်ပုဂ္ဂိုလ်</label>
                                </div>
                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="guardian_name">အမည်</label>
                                        <input name="guardian_name" id="guardian_name" type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="guardian_relation">ဆွေမျိုးတော်စပ်ပုံ</label>
                                        <input name="guardian_relation" id="guardian_relation" type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="guardian_job">အလုပ်အကိုင်</label>
                                        <input name="guardian_job" id="guardian_job" type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="guardian_address">ဆက်သွယ်ရန်လိပ်စာ</label>
                                        <input name="guardian_address" id="guardian_address" type="text"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="lg:col-span-6">
                                    <div class="text-start">
                                        <label for="guardian_phone_num">ဖုန်းနံပါတ်</label>
                                        <input name="guardian_phone_num" type="number"
                                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0"
                                            placeholder="Phone No. :">
                                    </div>
                                </div>
                                <div class="lg:col-span-12">
                                    <div class="text-start">
                                        <label
                                            for="scholarship">ပညာသင်ထောက်ပံ့ကြေးပေးရန်မေတ္တာရပ်ခံခြင်းပြု/မပြု</label>
                                        <div class="mt-3 w-full py-2 px-3 h-10">
                                            <input name="scholarship" type="radio" value="1"> ပြု
                                            <input name="scholarship" type="radio" value="0" checked> မပြု
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-indigo-300 p-5 rounded-md lg:col-span-12 ">
                                    <label for="subject" class="font-semibold">လိုအပ်သောစာရွက်စာတမ်းများ</label>
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="passport_photo">လိုင်စင်ဓာတ်ပုံ (1" x 1.25") ဆိုဒ် ၁ ပုံ (၆လ အတွင်း
                                        ရိုက်ထားသောပုံ) </label>
                                    <input name="passport_photo" id="" type="file"
                                        class=" w-full mt-3 cursor-pointer bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 file:bg-indigo-600 file:text-white file:border-none file:rounded-l-lg file:py-2 file:px-4 file:mr-3 file:cursor-pointer">
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="one_inch_photo">(1" x 1") ဆိုဒ် ၁ ပုံ (၆လ အတွင်း ရိုက်ထားသောပုံ)
                                    </label>
                                    <input name="one_inch_photo" id="" type="file"
                                        class=" w-full mt-3 cursor-pointer bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 file:bg-indigo-600 file:text-white file:border-none file:rounded-l-lg file:py-2 file:px-4 file:mr-3 file:cursor-pointer">
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="student_nrc_photo_front">ကျောင်းသားမှတ်ပုံတင်(ရှေ့ဘက်)</label>
                                    <input name="student_nrc_photo_front" id="" type="file"
                                        class=" w-full mt-3 cursor-pointer bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 file:bg-indigo-600 file:text-white file:border-none file:rounded-l-lg file:py-2 file:px-4 file:mr-3 file:cursor-pointer">
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="student_nrc_photo_back">ကျောင်းသားမှတ်ပုံတင်(နောက်ဘက်)</label>
                                    <input name="student_nrc_photo_back" id="" type="file"
                                        class=" w-full mt-3 cursor-pointer bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 file:bg-indigo-600 file:text-white file:border-none file:rounded-l-lg file:py-2 file:px-4 file:mr-3 file:cursor-pointer">
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="fath_nrc_photo_front">အဘမှတ်ပုံတင်(ရှေ့ဘက်)</label>
                                    <input name="fath_nrc_photo_front" id="" type="file"
                                        class=" w-full mt-3 cursor-pointer bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 file:bg-indigo-600 file:text-white file:border-none file:rounded-l-lg file:py-2 file:px-4 file:mr-3 file:cursor-pointer">
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="fath_nrc_photo_back">အဘမှတ်ပုံတင်(နောက်ဘက်)</label>
                                    <input name="fath_nrc_photo_back" id="" type="file"
                                        class=" w-full mt-3 cursor-pointer bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 file:bg-indigo-600 file:text-white file:border-none file:rounded-l-lg file:py-2 file:px-4 file:mr-3 file:cursor-pointer">
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="moth_nrc_photo_front">အမိမှတ်ပုံတင်(ရှေ့ဘက်)</label>
                                    <input name="moth_nrc_photo_front" id="" type="file"
                                        class=" w-full mt-3 cursor-pointer bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 file:bg-indigo-600 file:text-white file:border-none file:rounded-l-lg file:py-2 file:px-4 file:mr-3 file:cursor-pointer">
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="moth_nrc_photo_back">အမိမှတ်ပုံတင်(နောက်ဘက်)</label>
                                    <input name="moth_nrc_photo_back" id="" type="file"
                                        class=" w-full mt-3 cursor-pointer bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 file:bg-indigo-600 file:text-white file:border-none file:rounded-l-lg file:py-2 file:px-4 file:mr-3 file:cursor-pointer">
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="covid_photo">ကိုဗစ်ကာကွယ်ဆေးထိုးပြီးကြောင်းထောက်ခံချက်</label>
                                    <input name="covid_photo" id="" type="file"
                                        class=" w-full mt-3 cursor-pointer bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 file:bg-indigo-600 file:text-white file:border-none file:rounded-l-lg file:py-2 file:px-4 file:mr-3 file:cursor-pointer">
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="matriculation_certificate">၁၀ တန်းအောင်လက်မှတ်</label>
                                    <input name="matriculation_certificate" id="" type="file"
                                        class=" w-full mt-3 cursor-pointer bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 file:bg-indigo-600 file:text-white file:border-none file:rounded-l-lg file:py-2 file:px-4 file:mr-3 file:cursor-pointer">
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="matriculation_mark_photo">၁၀ တန်းအမှတ်စာရင်း</label>
                                    <input name="matriculation_mark_photo" id="" type="file"
                                        class=" w-full mt-3 cursor-pointer bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 file:bg-indigo-600 file:text-white file:border-none file:rounded-l-lg file:py-2 file:px-4 file:mr-3 file:cursor-pointer">
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="house_registration_photo_front">အိမ်ထောင်စုစာရင်း(ရှေ့ဘက်)</label>
                                    <input name="house_registration_photo_front" id="" type="file"
                                        class=" w-full mt-3 cursor-pointer bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 file:bg-indigo-600 file:text-white file:border-none file:rounded-l-lg file:py-2 file:px-4 file:mr-3 file:cursor-pointer">
                                </div>
                                <div class="lg:col-span-6">
                                    <label for="house_registration_photo_back">အိမ်ထောင်စုစာရင်း(နောက်ဘက်)</label>
                                    <input name="house_registration_photo_back" id="" type="file"
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
                                    <label for="subject" class="font-semibold">ကျောင်းလခပေးသွင်းခြင်း</label>
                                </div>

                                <div class="lg:col-span-12">
                                    <div id="accordion-collapse" data-accordion="collapse"
                                        class="grid md:grid-cols-2 grid-cols-1 mt-8 md:gap-[30px]">
                                        <div>
                                            <div
                                                class="relative shadow dark:shadow-gray-800 rounded-md overflow-hidden">
                                                <h2 class="text-base font-semibold" id="accordion-collapse-heading-1">
                                                    <button type="button"
                                                        class="flex justify-between items-center p-5 w-full font-medium text-start"
                                                        data-accordion-target="#accordion-collapse-body-1"
                                                        aria-expanded="false" aria-controls="accordion-collapse-body-1">
                                                        <span>ပေးသွင်းရန်</span>
                                                        <svg data-accordion-icon class="size-4 rotate-0 shrink-0"
                                                            fill="currentColor" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </h2>
                                                <div id="accordion-collapse-body-1" class="hidden"
                                                    aria-labelledby="accordion-collapse-heading-1">
                                                    <div class="p-5">
                                                        <ul>
                                                            <?php foreach ($fees as $fee): ?>
                                                            <?php if (!empty($fee['entrance_fee'])): ?>
                                                            <li>
                                                                <?= "ကျောင်းဝင်ကြေး - " . $fee['entrance_fee'] . " ကျပ်" ?>
                                                            </li>
                                                            <?php endif; ?>

                                                            <?php if (!empty($fee['registration_fee'])): ?>
                                                            <li>
                                                                <?= "မှတ်ပုံတင်ကြေး - " . $fee['registration_fee'] . " ကျပ်" ?>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php if (!empty($fee['extra_registration_fee'])): ?>
                                                            <li>
                                                                <?= "အလွတ်မှတ်ပုံတင်ကြေး - " . $fee['extra_registration_fee'] . " ကျပ်" ?>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php if (!empty($fee['tuition_fee'])): ?>
                                                            <li>
                                                                <?= "ကျောင်းလခ (၁၀လစာ) - " . $fee['tuition_fee'] . " ကျပ်" ?>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php if (!empty($fee['late_fee'])): ?>
                                                            <li>
                                                                <?= "နောက်ကျကြေး - " . $fee['late_fee'] . " ကျပ်" ?>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php if (!empty($fee['id_card_fee'])): ?>
                                                            <li>
                                                                <?= "မှတ်ပုံတင်ကတ်ပြား - " . $fee['id_card_fee'] . " ကျပ်" ?>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php if (!empty($fee['ka_pa_ma_fee'])): ?>
                                                            <li>
                                                                <?= "က-ပ-မ ကြေး - " . $fee['ka_pa_ma_fee'] . " ကျပ်" ?>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php if (!empty($fee['lab_fee'])): ?>
                                                            <li>
                                                                <?= "ဓါတ်ခွဲခန်းကြေး - " . $fee['lab_fee'] . " ကျပ်" ?>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php if (!empty($fee['exam_fee'])): ?>
                                                            <li>
                                                                <?= "စာမေးပွဲကြေး - " . $fee['exam_fee'] . " ကျပ်" ?>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php if (!empty($fee['general_fee'])): ?>
                                                            <li>
                                                                <?= "အထွေထွေ - " . $fee['general_fee'] . " ကျပ်" ?>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php if (!empty($fee['total'])): ?>
                                                            <li>
                                                                <?= "စုစုပေါင်း - " . $fee['total'] . " ကျပ်" ?>
                                                            </li>
                                                            <?php endif; ?>
                                                            <?php endforeach ?>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="lg:col-span-12">
                                    <div id="accordion-collapse" data-accordion="collapse"
                                        class="grid md:grid-cols-2 grid-cols-1 mt-8 md:gap-[30px]">
                                        <div>
                                            <div
                                                class="relative shadow dark:shadow-gray-800 rounded-md overflow-hidden">
                                                <h2 class="text-base font-semibold" id="accordion-collapse-heading-1">
                                                    <button type="button"
                                                        class="flex justify-between items-center p-5 w-full font-medium text-start"
                                                        data-accordion-target="#accordion-collapse-body-2"
                                                        aria-expanded="false" aria-controls="accordion-collapse-body-1">
                                                        <span>ငွေပေးချေရန် QR</span>
                                                        <svg data-accordion-icon class="size-4 rotate-0 shrink-0"
                                                            fill="currentColor" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </h2>
                                                <div id="accordion-collapse-body-2" class="hidden"
                                                    aria-labelledby="accordion-collapse-heading-1">
                                                    <div class="p-5">
                                                        <img src="../../utils/assets/img/ucspyay/qrcode.jpg"
                                                            alt="QR Code">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="lg:col-span-12">
                                    <label for="payment_screenshot">ငွေသွင်းပြီးကြောင်း Screenshot</label>
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



    <?php include("../../utils/components/footer.php") ?>

    <!-- JAVASCRIPTS -->
    <script src="../../utils/assets/js/tailwindcss.js"></script>
    <script src="../../utils/assets/libs/feather-icons/feather.min.js"></script>
    <script src="../../utils/assets/libs/jquery/jquery.min.js"></script>
    <script src="../../utils/assets/js/plugins.init.js"></script>
    <script src="../../utils/assets/js/app.js"></script>
    <script src="../../utils/assets/js/alertify.js"></script>


    <!-- <script src="./../utils/assets/js/studentAnsweredExams.js"></script> -->
    <!-- <script src="./../utils/assets/js/test.js"></script> -->


    <script>
    <?php if ($isRegister != null && !$isRegister): ?>
    alertify.warning('လျှောက်လွှာတင်ခြင်းမအောင်မြင်ပါ။');
    <?php elseif ($isRegister): ?>
    alertify.success('လျှောက်လွှာတင်ပြီးပါပြီ။');
    <?php endif ?>
    // Fetch NRC
    fetch('../../utils/assets/json/nrc.json')
        .then(response => response.json())
        .then(data => {
            setupNrcDropdowns('student_nrc_code', 'student_nrc_name', data);
            setupNrcDropdowns('student_fath_nrc_code', 'student_fath_nrc_name', data);
            setupNrcDropdowns('student_moth_nrc_code', 'student_moth_nrc_name', data);
        })
        .catch(error => console.error('Error fetching the JSON data:', error));


    // Fetch states
    fetch('../../utils/assets/json/states.json')
        .then(response => response.json())
        .then(data => {
            setupRegionTownshipSelect('student_region', 'student_township', data);
            setupRegionTownshipSelect('student_fath_region', 'student_fath_township', data);
            setupRegionTownshipSelect('student_moth_region', 'student_moth_township', data);
        })
        .catch(error => console.error('Error fetching the JSON data:', error));
    </script>
    <!-- JAVASCRIPTS -->
</body>

</html>