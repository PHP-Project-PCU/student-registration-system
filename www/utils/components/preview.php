<?php
include "links.php";
$passport_photo = "";

?>
<!DOCTYPE html>
<html lang="en">
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


<body class="w-full p-5 mx-auto text-center">
    <!-- Start Title Section -->
    <section>
        <div class="text-center">
            <p>ကွန်ပျူတာတက္ကသိုလ် (ပြည်)</p>
            <p>()ပညာသင်နှစ်</p>
            <p>ကျောင်းသား/ကျောင်းသူများပညာသင်ခွင့်လျှောက်လွှာ</p>
        </div>
    </section> <!-- End Title Section -->

    <!-- Start First Table -->
    <section class="w-full my-6" id="first-tbl">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="text-center mx-auto">
                <img src="<?= $passport_photo ?>" class="w-36 my-6" alt="Profile">
            </div>
            <div class="w-full">
                <table class="w-full table-fixed">
                    <tr>
                        <td class="text-start">သင်တန်းနှစ်</td>
                        <td class="text-indigo-600">a</td>
                    </tr>
                    <tr>
                        <td class="text-start">အထူးပြုဘာသာ</td>
                        <td class="text-indigo-600">a</td>
                    </tr>
                    <tr>
                        <td class="text-start">ခုံအမှတ်</td>
                        <td class="text-indigo-600">a</td>
                    </tr>
                    <tr>
                        <td class="text-start">တက္ကသိုလ်မှတ်ပုံတင်အမှတ်</td>
                        <td class="text-indigo-600">a</td>
                    </tr>
                    <tr>
                        <td class="text-start">တက္ကသိုလ်ဝင်ရောက်သည့်ခုနှစ်</td>
                        <td class="text-indigo-600">a</td>
                    </tr>
                </table>
            </div>

        </div>
    </section> <!-- End First Table -->

    <!-- Start Second Table -->
    <section class="overflow-x-auto" id="second-tbl">
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
                    <td class="text-indigo-600">a</td>
                    <td class="text-indigo-600">a</td>
                    <td class="text-indigo-600">a</td>
                </tr>
                <tr>
                    <td class="">အင်္ဂလိပ်စာဖြင့်</td>
                    <td class="text-indigo-600">a</td>
                    <td class="text-indigo-600">a</td>
                    <td class="text-indigo-600">a</td>
                </tr>
                <tr>
                    <td class="text-start" colspan="2">လူမျိုး</td>
                    <td class="text-indigo-600">a</td>
                    <td class="text-indigo-600">a</td>
                    <td class="text-indigo-600">a</td>
                </tr>
                <tr>
                    <td class="text-start" colspan="2">ကိုးကွယ်သည့်ဘာသာ</td>
                    <td class="text-indigo-600">a</td>
                    <td class="text-indigo-600">a</td>
                    <td class="text-indigo-600">a</td>
                </tr>
                <tr>
                    <td class="text-start" colspan="2">မွေးဖွားရာဇာတိ</td>
                    <td class="text-indigo-600">a</td>
                    <td class="text-indigo-600">a</td>
                    <td class="text-indigo-600">a</td>
                </tr>
                <tr>
                    <td class="text-start" colspan="2">မြို့နယ်/ပြည်နယ်/တိုင်း</td>
                    <td class="text-indigo-600">a</td>
                    <td class="text-indigo-600">a</td>
                    <td class="text-indigo-600">a</td>
                </tr>
                <tr>
                    <td class="text-start" colspan="2">မှတ်ပုံတင်အမှတ်</td>
                    <td class="text-indigo-600">a</td>
                    <td class="text-indigo-600">a</td>
                    <td class="text-indigo-600">a</td>
                </tr>
                <tr>
                    <td class="text-start" colspan="2">နိုင်ငံခြားသား</td>
                    <td class="text-indigo-600">a</td>
                    <td class="text-indigo-600">a</td>
                    <td class="text-indigo-600">a</td>
                </tr>
                <tr>
                    <td class="text-start" colspan="2">မွေးသက္ကရာဇ်</td>
                    <td class="text-indigo-600">a</td>
                    <td class="text-indigo-600" rowspan="4" colspan="2">
                        <p class="text-black ">အဘအုပ်ထိန်းသူ၏အလုပ်အကိုင်၊လိပ်စာအပြည့်အစုံ</p>
                    </td>
                </tr>
                <tr>
                    <td rowspan="3" class="">တက္ကသိုလ်စာမေးပွဲအောင်မြင်သည့်</td>
                    <td class="">ခုံအမှတ်</td>
                    <td class="text-indigo-600">a</td>
                </tr>
                <tr>
                    <td class="">ခုနှစ်</td>
                    <td class="text-indigo-600">a</td>
                </tr>
                <tr>
                    <td class="">စာစစ်ဌာန</td>
                    <td class="text-indigo-600">a</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-indigo-600">အမြဲတမ်းနေထိုင်သည့်လိပ်စာ(အပြည့်အစုံ)</td>
                    <td colspan="2" class="text-indigo-600">အမိအုပ်ထိန်းသူ၏အလုပ်အကိုင်၊လိပ်စာအပြည့်အစုံ</td>
                </tr>
                <tr>
                    <td class="text-start">၂။ ဖြေဆိုခဲ့သည့်စာမေးပွဲများ</td>
                    <td class="">အဓိကဘာသာ</td>
                    <td class="">ခုံအမှတ်</td>
                    <td class="">ခုနှစ်</td>
                    <td class="">အောင်/ရှုံး</td>
                </tr>
                <tr>
                    <td class="text-start">(၁)</td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                </tr>
                <tr>
                    <td class="text-start">(၂)</td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                </tr>
                <tr>
                    <td class="text-start">(၃)</td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                </tr>
                <tr>
                    <td class="text-start">(၄)</td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                    <td class=""></td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="5" class="text-start">၃။ ကျောင်းနေရန်အထောက်အပံ့ပြုမည့်ပုဂ္ဂိုလ်</td>
                    <td colspan="1" class="text-start">(က) အမည်</td>
                    <td colspan="2" class="text-start text-indigo-600">a</td>

                </tr>
                <tr>
                    <td colspan="1" class="text-start">(ခ) ဆွေမျိုးတော်စပ်ပုံ</td>
                    <td colspan="2" class="text-start text-indigo-600">a</td>

                </tr>
                <tr>
                    <td colspan="1" class="text-start">(ဂ) အလုပ်အကိုင်</td>
                    <td colspan="2" class="text-start text-indigo-600">a</td>

                </tr>
                <tr>
                    <td colspan="1" class="text-start">(ဃ) ဆက်သွယ်ရန်လိပ်စာ</td>
                    <td colspan="2" class="text-start text-indigo-600">a</td>

                </tr>
                <tr>
                    <td colspan="1" class="text-start">(င) ဖုန်းနံပါတ်</td>
                    <td colspan="2" class="text-start text-indigo-600">a</td>

                </tr>
                <tr>
                    <td colspan="3" class="text-start">၄။ ပညာသင်ထောက်ပံ့ကြေးပေးရန်မေတ္တာရပ်ခံခြင်းပြု/မပြု</td>
                    <td colspan="2" class="text-start text-indigo-600">a</td>
                </tr>




            </tbody>
        </table>
    </section> <!-- Start First Table -->
</body>

</html>