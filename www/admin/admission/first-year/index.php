<?php


require '../../../../vendor/autoload.php';
include '../../../../autoload.php';

use controllers\StudentAdmissionController;

$status = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];
}
$studentAdmissionController = new StudentAdmissionController();
$freshers = $studentAdmissionController->getAllFreshersByStatus($status);
?>

<!DOCTYPE html>
<html lang="en">

<?php
include("../../../utils/components/admin/admin.links.php");
?>

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
                        ပထမနှစ်ဝင်ခွင့်လျှောက်ထားသူများ
                    </h4>
                    <form action="" method="POST">
                        <select id="status" name="status"
                            onchange="this.form.submit()"
                            class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                            <option value="0" <?php if ($status == 0) echo 'selected'; ?>>အတည်မပြုရသေးသောဒေတာများ</option>
                            <option value="1" <?php if ($status == 1) echo 'selected'; ?>>အတည်ပြုပြီးသောဒေတာများ</option>
                        </select>
                    </form>


                </div>
                <!-- New Table -->
                <div class=" w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full ">
                        <table class="table-fixed w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left  uppercase border-b ">
                                    <th class="px-4 py-3">စဉ်</th>
                                    <th class="px-4 py-3">ဝင်ခွင့်အမှတ်စဉ်</th>
                                    <th class="px-4 py-3">အမည်</th>
                                    <th class="px-4 py-3">မှတ်ပုံတင်အမှတ်</th>
                                    <th class="px-4 py-3">စစ်ဆေးရန်</th>

                                </tr>
                            </thead>
                            <tbody
                                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                <?php
                                $count = 1;
                                foreach ($freshers as $fresher) {
                                    $id = $fresher['id'];

                                ?>
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3">
                                            <?= $count ?>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <?= $fresher['matriculation_reg_num'] ?>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <?= $fresher['student_name_my'] ?>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <?= $fresher['student_nrc'] ?>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <?php if ($status == 1): ?>
                                                <a href="view.php?id=<?= $fresher['id'] ?>" class="text-indigo-700 hover:text-indigo-400">အသေးစိတ်ကြည့်ရှုရန်</a>
                                            <?php else: ?>
                                                <a href="update.php?id=<?= $fresher['id'] ?>" class="text-indigo-700 hover:text-indigo-400">စစ်ဆေးကြည့်ရှုရန်</a>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php $count++;
                                } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


</body>


</html>