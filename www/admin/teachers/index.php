<?php


require '../../../vendor/autoload.php';
include '../../../autoload.php';

use controllers\TeacherController;
use controllers\DeptController;

session_start();

if (isset($_POST['logout'])) {

    unset($_SESSION['admin']);
    // HTTP::redirect("/login");
    header("location: /login");
    exit();
}

$teacherController = new TeacherController();
$teachers = $teacherController->index();

$departmentController = new DeptController();
$departments = $departmentController->index();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Check if the ID is present and the form is intended for updating
    if (!empty($_POST['id']) && isset($_POST['save_btn'])) {
        // Update existing teacher
        $teacherId = $_POST['id'];
        $result = $teacherController->updateTeacher($teacherId, $_POST);
    } else {
        // Enroll a new teacher
        $result = $teacherController->enrollNewTeacher($_POST);
    }
    header('Location: index.php');
    exit();
}

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
                        <h4 class="my-4 text-2xl font-semibold text-gray-800 dark:text-gray-300">
                            Teachers
                        </h4>
                        <div class="md:w-1/2 px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <form action="" method="POST">
                                <label class="block text-sm mt-2">
                                    <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Name</span>
                                    <input
                                        class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        name="teacher_name" placeholder="" required />
                                </label>
                                <label class="block text-sm mt-2">
                                    <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Department</span>
                                    <select id="" name="dept_id" required
                                        class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                        <option value="" disabled selected>Choose a department</option>
                                        <?php foreach ($departments as $dept): ?>
                                        <option value="<?= $dept['dept_id'] ?>" <?php # if ($currentdept == $dept['dept']) echo 'selected'
                                                                                    ?>>
                                            <?= $dept['dept_name'] ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </label>
                                <label class="block text-sm mt-2">
                                    <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Edu Mail</span>
                                    <input type="email"
                                        class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        name="edu_mail" placeholder="" required />
                                </label>
                                <label class="block text-sm mt-2">
                                    <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Password</span>
                                    <input type="password"
                                        class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        name="password" placeholder="" required />
                                </label>
                                <div class="flex justify-end">
                                    <button
                                        class="px-4 py-2 my-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Enroll
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
                                        <th class="px-4 py-3">Name</th>
                                        <th class="px-4 py-3">Department</th>
                                        <th class="px-4 py-3">Edu Mail</th>
                                        <th class="px-4 py-3">Password</th>
                                        <th class="px-4 py-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    <?php
                                    $count = 1;
                                    foreach ($teachers as $teacher) {

                                    ?>
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3">
                                            <?= $count ?>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <?= $teacher['teacher_name'] ?>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <?php foreach ($departments as $dept) {
                                                    if ($dept['dept_id'] == $teacher['dept_id'])
                                                        echo $dept['dept_name'];
                                                } ?>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <?= $teacher['edu_mail'] ?>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <?= $teacher['password'] ?>
                                        </td>
                                        <td>
                                            <div class="flex items-center space-x-4 text-sm">

                                                <button @click="openModal"
                                                    onclick="openEditModal('<?= $teacher['id'] ?>', '<?= $teacher['teacher_name'] ?>','<?= $teacher['dept_id'] ?>', '<?= $teacher['edu_mail'] ?>', '<?= $teacher['password'] ?>' )"
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
                                                    onclick="window.location.href='delete.php?id=<?= $teacher['id'] ?>'"
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
                                        </td>
                                    </tr>
                                    <?php $count++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>



            <!-- Modal backdrop. This what you want to place close to the closing body tag -->
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
                            Edit Teacher Info
                        </p>
                        <!-- Modal description -->
                        <form action="" method="POST">
                            <input type="hidden" name="id" id="teacher_id">
                            <label class="block text-sm mt-2">
                                <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Name</span>
                                <input id="teacher_name"
                                    class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="teacher_name" placeholder="" required />
                            </label>
                            <label class="block text-sm mt-2">
                                <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Department</span>
                                <select id="dept_id" name="dept_id"
                                    class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                                    <?php foreach ($departments as $dept): ?>
                                    <option value="<?= $dept['dept_id'] ?>">
                                        <?= $dept['dept_name'] ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </label>
                            <label class="block text-sm mt-2">
                                <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Edu Mail</span>
                                <input type="email" id="email"
                                    class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="edu_mail" placeholder="" required />
                            </label>
                            <label class="block text-sm mt-2">
                                <span class="text-gray-700 pt-4 font-semibold dark:text-gray-500">Password</span>
                                <input type="password" id="password"
                                    class="mt-4 mb-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="password" placeholder="" required />
                            </label>
                    </div>
                    <footer
                        class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                        <button @click="closeModal"
                            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                            Cancel
                        </button>
                        <button name="save_btn" type="submit"
                            class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Save
                        </button>
                    </footer>
                    </form>
                </div>
            </div>
            <!-- End of modal backdrop -->
</body>
<script>
function openEditModal(id, name, deptId, mail, password) {
    document.getElementById('teacher_id').value = id;
    document.getElementById('teacher_name').value = name;
    document.getElementById('dept_id').value = deptId;
    document.getElementById('email').value = mail;
    document.getElementById('password').value = password;
    console.log(id, name, deptId, mail, password);

}
</script>

</html>