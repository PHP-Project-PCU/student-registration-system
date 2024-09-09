<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

use controllers\SemesterController;
use controllers\PaymentController;
use controllers\StudentTimetableController;
use controllers\TimetableController;
use core\helpers\HTTP;

session_start();


$semesterController = new SemesterController();
$semesters = $semesterController->index();

$paymentController = new PaymentController();


if (!isset($_SESSION['admin'])) {
    HTTP::redirect("/login");
    exit();
}



if (isset($_POST['logout'])) {


    unset($_SESSION['admin']);
    // // HTTP::redirect("/login");
    header("Location: /login/");
    exit();
}

if (!isset($_SESSION['admin'])) {
    HTTP::redirect("/login");
    exit();
}

if (isset($_POST['receipt_create'])) {
    $semester_id = $_POST['semester_id'] ?? 1;
    $entrance_fee = $_POST['entrance_fee'];
    $registration_fee = $_POST['registration_fee'];
    $extra_registration_fee = $_POST['extra_registration_fee'];
    $tuition_fee = $_POST['tuition_fee'];
    $late_fee = $_POST['late_fee'];
    $id_card_fee = $_POST['id_card_fee'];
    $ka_pa_ma_fee = $_POST['ka_pa_ma_fee'];
    $lab_fee = $_POST['lab_fee'];
    $exam_fee = $_POST['exam_fee'];
    $general_fee = $_POST['general_fee'];

    $_SESSION['semesterId'] = $semester_id;

    $total = intval($entrance_fee) + intval($registration_fee) + intval($extra_registration_fee) + intval($tuition_fee) + intval($late_fee) + intval($id_card_fee) + intval($ka_pa_ma_fee) + intval($lab_fee) + intval($exam_fee) + intval($general_fee);

    $data = [
        "semester_id" => $semester_id,
        "entrance_fee" => $entrance_fee,
        "registration_fee" => $registration_fee,
        "extra_registration_fee" => $extra_registration_fee,
        "tuition_fee" => $tuition_fee,
        "late_fee" => $late_fee,
        "id_card_fee" => $id_card_fee,
        "ka_pa_ma_fee" => $ka_pa_ma_fee,
        "lab_fee" => $lab_fee,
        "exam_fee" => $exam_fee,
        "general_fee" => $general_fee,
        "total" => $total,
    ];

    $lastPaymentId = $paymentController->setPayment($data);

}

$payments = $paymentController->getAllPayments();


?>

<!DOCTYPE html>
<html lang="en">
<?php
include("../../utils/components/admin/admin.links.php");
?>

<body class="bg-gray-50">
    <div class="flex h-screen bg-white" :class="{ 'overflow-hidden': isSideMenuOpen }">
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
            <div class="overflow-y-auto md:pt-16 px-4 pb-4 h-full">
                <div class="p-4 ">
                    <div class="w-200">
                        <h4 class="my-4 text-2xl font-semibold text-gray-800 dark:text-gray-300">
                            Receipt
                        </h4>
                        <div class="w-full px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <form action="" method="POST">
                                <h4 class="my-4 text-lg font-semibold text-indigo-600 dark:text-gray-300">
                                    Create a new receipt.
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
                                    <label class=" block text-sm ">
                                        <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Semeter</span>
                                        <select id="semester_id" name="semester_id"
                                            class="form-input my-4 w-full px-3 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                            <?php foreach ($semesters as $semester): ?>
                                                <?php if ($semester['id'] % 2 != 0): // Check if the semester id is odd ?>
                                                    <option value="<?= $semester['id'] ?>"><?= $semester['semester'] ?></option>
                                                <?php endif; ?>
                                            <?php endforeach ?>
                                        </select>

                                    </label>
                                    <label class=" block text-sm ">
                                        <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Entrance
                                            Fee</span>
                                        <input type="number" min=0
                                            class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                            name="entrance_fee" placeholder="" />
                                    </label>
                                    <label class=" block text-sm ">
                                        <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Registration
                                            Fee</span>
                                        <input type="number" min=0
                                            class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                            name="registration_fee" placeholder="" />
                                    </label>
                                    <label class=" block text-sm ">
                                        <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Extra
                                            Registration
                                            Fee</span>
                                        <input type="number" min=0
                                            class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                            name="extra_registration_fee" placeholder="" />
                                    </label>
                                    <label class=" block text-sm ">
                                        <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Tuition
                                            Fee</span>
                                        <input type="number" min=0
                                            class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                            name="tuition_fee" placeholder="" />
                                    </label>
                                    <label class=" block text-sm ">
                                        <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Late
                                            Fee</span>
                                        <input type="number" min=0
                                            class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                            name="late_fee" placeholder="" />
                                    </label>
                                    <label class=" block text-sm ">
                                        <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">ID Card
                                            Fee</span>
                                        <input type="number" min=0
                                            class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                            name="id_card_fee" placeholder="" />
                                    </label>
                                    <label class=" block text-sm ">
                                        <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Ka Pa Ma
                                            Fee</span>
                                        <input type="number" min=0
                                            class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                            name="ka_pa_ma_fee" placeholder="" />
                                    </label>
                                    <label class=" block text-sm ">
                                        <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Lab Fee</span>
                                        <input type="number" min=0
                                            class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                            name="lab_fee" placeholder="" required />
                                    </label>

                                    <label class=" block text-sm ">
                                        <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Exam
                                            Fee</span>
                                        <input type="number" min=0
                                            class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                            name="exam_fee" placeholder="" required />
                                    </label>
                                    <label class=" block text-sm ">
                                        <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">General
                                            Fee</span>
                                        <input type="number" min=0
                                            class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                            name="general_fee" placeholder="" required />
                                    </label>
                                </div>
                                <div class="">
                                    <button type="submit" name="receipt_create"
                                        class="px-4 py-2 my-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Create
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- New Table -->
                    <div class=" w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full ">
                            <table class="table-auto w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">No</th>
                                        <th class="px-4 py-3">Semester</th>
                                        <th class="px-4 py-3">Entrance Fee</th>
                                        <th class="px-4 py-3">Registration Fee</th>
                                        <th class="px-4 py-3">Extra Registration Fee</th>
                                        <th class="px-4 py-3">Tuition Fee</th>
                                        <th class="px-4 py-3">Late Fee</th>
                                        <th class="px-4 py-3">ID Card Fee</th>
                                        <th class="px-4 py-3">Ka Pa Ma Fee</th>
                                        <th class="px-4 py-3">Lab Fee</th>
                                        <th class="px-4 py-3">Exam Fee</th>
                                        <th class="px-4 py-3">General Fee</th>
                                        <th class="px-4 py-3">Total</th>
                                        <!-- <th class="px-4 py-3">Action</th> -->

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    <?php
                                    foreach ($payments as $payment): ?>
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3">
                                                <?= $payment->id ?>
                                            </td>
                                            <?php
                                            $studentTimetableController = new StudentTimetableController();
                                            $semesterName = $studentTimetableController->getSemester($payment->semester_id);
                                            ?>
                                            <td class="px-4 py-3 text-sm">
                                                <?= $semesterName->semester ?>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?= $payment->entrance_fee ?>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?= $payment->registration_fee ?>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?= $payment->extra_registration_fee ?>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?= $payment->tuition_fee ?>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?= $payment->late_fee ?>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?= $payment->id_card_fee ?>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?= $payment->ka_pa_ma_fee ?>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?= $payment->lab_fee ?>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?= $payment->exam_fee ?>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?= $payment->general_fee ?>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?= $payment->total ?>
                                            </td>
                                            <!-- <td>
                                            <div class="flex items-center space-x-4 text-sm">

                                                <button @click="openModal"
                                                    onclick="openEditModal('<?= $payment->id ?>','<?= $payment->semester_id ?>', '<?= $payment->entrance_fee ?>', '<?= $payment->registration_fee ?>', '<?= $payment->extra_registration_fee ?>', '<?= $payment->tuition_fee ?>', '<?= $payment->late_fee ?>', '<?= $payment->id_card_fee ?>', '<?= $payment->ka_pa_ma_fee ?>', '<?= $payment->lab_fee ?>', '<?= $payment->exam_fee ?>', '<?= $payment->general_fee ?>')"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Edit">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                        </path>
                                                    </svg>
                                                </button>

                                                <button
                                                    onclick="window.location.href='delete.php?id=<?= $course['id'] ?>'"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Delete">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td> -->
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Scrollable content section -->
        </div>

        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
            <!-- Modal -->
            <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal"
                @keydown.escape="closeModal"
                class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                role="dialog" id="modal">
                <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                <header class="flex justify-end">
                    <button
                        class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                        aria-label="close" @click="closeModal">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                            <path
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </header>
                <!-- Modal body -->
                <div class=" mb-6">
                    <!-- Modal title -->
                    <p class="mb-6 text-lg font-semibold text-gray-700 dark:text-gray-300">
                        Update Course Details
                    </p>
                    <!-- Modal description -->
                    <!-- <form action="" method="POST">
                            <input type="hidden" name="dept_id" id="editDeptId">
                            <label class="block text-sm">
                                <span class="text-gray-800 font-semibold dark:text-gray-500">Name</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="dept_name" id="editDeptName" placeholder="Faculty of Computer Science" required />
                            </label>
                    </div>
                    -->
                    <form action="" method="POST">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
                            <input type="hidden" name="id" id="receiptId">
                            <label class=" block text-sm ">
                                <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Semeter</span>
                                <select id="semester_id" name="semester_id"
                                    class="form-input my-4 w-full px-3 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                    <?php foreach ($semesters as $semester): ?>
                                        <?php if ($semester['id'] % 2 != 0): // Check if the semester id is odd ?>
                                            <option value="<?= $semester['id'] ?>" <?= $_SESSION['semesterId'] == $semester['id'] ? 'selected' : '' ?>>
                                                <?= $semester['semester'] ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach ?>
                                </select>

                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Entrance
                                    Fee</span>
                                <input type="number" min=0
                                    class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="assessment" id="entranceFee" placeholder="" />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Registration
                                    Fee</span>
                                <input type="number" min=0
                                    class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="assignment" id="registrationFee" placeholder="" />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Extra Registration
                                    Fee</span>
                                <input type="number" min=0
                                    class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="tutorial" id="extraRegistrationFee" placeholder="" />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Tuition Fee</span>
                                <input type="number" min=0
                                    class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="quiz" id="tuitionFee" placeholder="" />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Late Fee</span>
                                <input type="number" min=0
                                    class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="lab_exam" id="lateFee" placeholder="" />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">ID Card Fee</span>
                                <input type="number" min=0
                                    class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="project" id="idCardFee" placeholder="" />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Ka Pa Ma Fee</span>
                                <input type="number" min=0
                                    class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="exam" id="kaPaMaFee" placeholder="" />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Lab Fee</span>
                                <input type="number" min=0
                                    class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="credit_unit" id="labFee" placeholder="" required />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Exam Fee</span>
                                <input type="number" min=0
                                    class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="credit_unit" id="examFee" placeholder="" required />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">General Fee</span>
                                <input type="number" min=0
                                    class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="credit_unit" id="generalFee" placeholder="" required />
                            </label>
                        </div>
                        <footer
                            class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                            <button @click="closeModal"
                                class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                                Cancel
                            </button>
                            <button type="submit"
                                class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Save
                            </button>
                        </footer>
                    </form>


                </div>
            </div>
</body>
<script>
    function openEditModal(receiptId, semesterId, entranceFee, registrationFee, extraRegistrationFee, tuitionFee, lateFee,
        idCardFee, kaPaMaFee,
        labFee, examFee, generalFee) {


        document.getElementById('receiptId').value = receiptId;
        document.getElementById('semesterId').value = semesterId;
        document.getElementById('entranceFee').value = entranceFee;
        document.getElementById('registrationFee').value = registrationFee;
        document.getElementById('extraRegistrationFee').value = extraRegistrationFee;
        document.getElementById('tuitionFee').value = tuitionFee;
        document.getElementById('lateFee').value = lateFee;
        document.getElementById('idCardFee').value = idCardFee;
        document.getElementById('kaPaMaFee').value = kaPaMaFee;
        document.getElementById('labFee').value = labFee;
        document.getElementById('examFee').value = examFee;
        document.getElementById('generalFee').value = generalFee;

        // Open the modal
        document.getElementById('modal-id').classList.add('active'); // Assuming this is how you open the modal
    }
</script>


</html>