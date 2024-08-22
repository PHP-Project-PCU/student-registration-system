<?php


require '../../../vendor/autoload.php';
include '../../../autoload.php';

use controllers\StudentAdmissionController;



// $studentAdmissionController = new StudentAdmissionController($data);
// $students = $studentAdmissionController->index();

// $deptController = new DeptController();
// $departments = $deptController->index();

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $deptName = $_POST['dept_name'];

//     if (isset($_POST['dept_id'])) {
//         // Update 
//         $deptController->updateDept($_POST['dept_id'], $deptName);
//     } else {
//         // Create 
//         $deptController->createDept($deptName);
//     }
//     header('Location: index.php');
// }

?>

<!DOCTYPE html>
<html lang="en">

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
                    <div>
                        <h4
                            class="my-4 text-2xl font-semibold text-gray-800 dark:text-gray-300">
                            ပညာသင်ခွင့်လျှောက်လွှာများ
                        </h4>

                        <!-- Cards Grid-->
                        <div class="grid gap-6 mb-8 grid-cols-1 sm:grid-cols-2 ">
                            <!-- First Card -->
                            <div class="flex items-center p-8 bg-white rounded-lg shadow-md dark:bg-gray-800 cursor-pointer hover:bg-indigo-100 "
                                onclick="window.location.href='first-year'">
                                <div
                                    class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200 ">
                                        ပထမနှစ်
                                    </p>
                                    <p class="my-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        လျှောက်လွှာအရေအတွက် - <span class="text-indigo-600">120</span>
                                    </p>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        စစ်ဆေးပြီး - <span class="text-indigo-600">60</span>
                                    </p>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        စစ်ဆေးရန်ကျန် - <span class="text-indigo-600">60</span>
                                    </p>
                                </div>
                            </div>
                            <!-- Second Card -->
                            <div class="flex items-center p-8 bg-white rounded-lg shadow-md dark:bg-gray-800 cursor-pointer hover:bg-indigo-100 "
                                onclick="window.location.href='second-year'">
                                <div
                                    class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200 ">
                                        ဒုတိယနှစ်
                                    </p>
                                    <p class="my-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        လျှောက်လွှာအရေအတွက် - <span class="text-indigo-600">120</span>
                                    </p>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        စစ်ဆေးပြီး - <span class="text-indigo-600">60</span>
                                    </p>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        စစ်ဆေးရန်ကျန် - <span class="text-indigo-600">60</span>
                                    </p>
                                </div>
                            </div>
                            <!-- Third Card -->
                            <div class="flex items-center p-8 bg-white rounded-lg shadow-md dark:bg-gray-800 cursor-pointer hover:bg-indigo-100 "
                                onclick="window.location.href='third-year'">
                                <div
                                    class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200 ">
                                        တတိယနှစ်
                                    </p>
                                    <p class="my-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        လျှောက်လွှာအရေအတွက် - <span class="text-indigo-600">120</span>
                                    </p>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        စစ်ဆေးပြီး - <span class="text-indigo-600">60</span>
                                    </p>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        စစ်ဆေးရန်ကျန် - <span class="text-indigo-600">60</span>
                                    </p>
                                </div>
                            </div>
                            <!-- Fourth Card -->
                            <div class="flex items-center p-8 bg-white rounded-lg shadow-md dark:bg-gray-800 cursor-pointer hover:bg-indigo-100 "
                                onclick="window.location.href='fourth-year'">
                                <div
                                    class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200 ">
                                        စတုတ္ထနှစ်
                                    </p>
                                    <p class="my-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        လျှောက်လွှာအရေအတွက် - <span class="text-indigo-600">120</span>
                                    </p>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        စစ်ဆေးပြီး - <span class="text-indigo-600">60</span>
                                    </p>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        စစ်ဆေးရန်ကျန် - <span class="text-indigo-600">60</span>
                                    </p>
                                </div>
                            </div>
                            <!-- Fifth Card -->
                            <div class="flex items-center p-8 bg-white rounded-lg shadow-md dark:bg-gray-800 cursor-pointer hover:bg-indigo-100 "
                                onclick="window.location.href='fifth-year'">
                                <div
                                    class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200 ">
                                        ပဥ္စမနှစ်
                                    </p>
                                    <p class="my-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        လျှောက်လွှာအရေအတွက် - <span class="text-indigo-600">120</span>
                                    </p>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        စစ်ဆေးပြီး - <span class="text-indigo-600">60</span>
                                    </p>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        စစ်ဆေးရန်ကျန် - <span class="text-indigo-600">60</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>


</body>
<script>

</script>

</html>