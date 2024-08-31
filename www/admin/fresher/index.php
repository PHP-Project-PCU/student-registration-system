<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

session_start();

use Shuchkin\SimpleXLSX;
use controllers\FresherController;

$updateFlag = false;

// File Upload Logic
if (isset($_POST['submit'])) {
    $excelFile = $_FILES['excel']['name'];
    $excelFileTempName = $_FILES['excel']['tmp_name'];
    $target = 'C:/xampp/htdocs/student-registration-system/www/utils/uploads/files/' . $excelFile;
    move_uploaded_file($excelFileTempName, $target);

    $xlsx = SimpleXLSX::parse($target);

    if (!$xlsx) {
        // Error handling if the file cannot be parsed
        echo 'Error: ' . SimpleXLSX::parseError();
        exit;
    }

    $data = [];
    $rows = $xlsx->rows();

    if (count($rows) > 0) {
        $header = $rows[0];


        for ($i = 1; $i < count($rows); $i++) {
            $row = $rows[$i];
            if (array_filter($row)) {
                $rowData = [];

                foreach ($header as $index => $colName) {
                    switch ($colName) {
                        case 'student_name':
                            $rowData['student_name'] = $row[$index];
                            break;
                        case 'matriculation_roll_num':
                            $rowData['matriculation_roll_num'] = $row[$index];
                            break;
                        case 'nrc_num':
                            $rowData['nrc_num'] = $row[$index];
                            break;
                        case 'matriculation_mark':
                            $rowData['matriculation_mark'] = $row[$index];
                            break;
                        case 'passing_year':
                            $rowData['passing_year'] = $row[$index];
                            break;
                    }
                }
                if (
                    !empty($rowData['student_name']) && !empty($rowData['matriculation_roll_num']) &&
                    !empty($rowData['nrc_num']) && !empty($rowData['matriculation_mark']) &&
                    !empty($rowData['passing_year'])
                ) {

                    $data[] = $rowData;
                }
            }
        }


        $fresherController = new FresherController($data, null, null);
        $fresherController->setFreshers();

    } else {
        echo "<script>alert('No data found in the Excel file.')</script>";
    }
}

if (isset($_POST['addMoreFresher'])) {
    $student_name = $_POST['student_name'];
    $matriculation_roll_num = $_POST['matriculation_roll_num'];
    $nrc_num = $_POST['nrc_num'];
    $matriculation_mark = $_POST['matriculation_mark'];
    $passing_year = $_POST['passing_year'];
    $data = [
        "student_name" => $student_name,
        "matriculation_roll_num" => $matriculation_roll_num,
        "nrc_num" => $nrc_num,
        "matriculation_mark" => $matriculation_mark,
        "passing_year" => $passing_year,
    ];
    $fresherController = new FresherController($data, null, null);
    $addingIndividualFresherFlag = $fresherController->setIndividualFresher();

}
//Filter with passed year logic
if (isset($_POST['passed_year'])) {
    $_SESSION['selected_year'] = $_POST['passed_year'];
    header('Location: ?page=1');

}
$selectedYear = $_SESSION['selected_year'] ?? 'all';


// Pagination Logic
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = 7;

$fresherController = new FresherController(null, $page, $limit, null, $selectedYear, null);
$paginationFresherData = $fresherController->getFresherPaginationData();
$getFreshersTotalRows = $fresherController->getTotalRows();
$totalPages = ceil($getFreshersTotalRows / $limit);


// Get Freshers Passing Years for passing year filtering 
$fresherController = new FresherController(null, null, null);
$fresherPassingYears = $fresherController->getFresherPassingYear();

//Update fresher data
if (isset($_POST['fresher_id'])) {

    $updateData = array(
        "id" => $_POST['fresher_id'],
        "student_name" => $_POST['student_name'],
        "matriculation_roll_num" => $_POST['matriculation_roll_num'],
        "nrc_num" => $_POST['nrc_num'],
        "matriculation_mark" => $_POST['matriculation_mark'],
        "passing_year" => $_POST['passing_year']
    );
    $fresherController = new FresherController(null, null, null, $updateData);
    $updateFlag = $fresherController->updateFresher();
    header('Location: index.php');
}

if (isset($_POST['delete_fresher_id'])) {
    $deleteData = array(
        "id" => $_POST['delete_fresher_id']
    );
    $fresherController = new FresherController(null, null, null, null, null, $deleteData);
    $deleteFlage = $fresherController->deleteFresher();
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">


<?php
include("../../utils/components/admin/admin.links.php");
?>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900 " :class="{ 'overflow-hidden': isSideMenuOpen }">
        <?php
        include("../../utils/components/admin/admin.sidebar.php");
        ?>
        <div class="flex flex-col flex-1 md:ml-64">
            <?php
            include("../../utils/components/admin/admin.navigation.php");
            ?>
            <?php ?>

            <div class="w-full  rounded-lg shadow-xs">

                <?php if ($paginationFresherData): ?>
                <div class="overflow-y-auto md:pt-16 px-4 pb-4">
                    <form action="" method="post">
                        <select id="file-type" name="passed_year" onchange="this.form.submit()"
                            class="block w-50 px-3 py-2 mt-1 text-sm text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:border-purple-400 focus:ring-purple-400 focus:outline-none focus:ring-2 focus:ring-offset-2 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:focus:ring-offset-gray-800">
                            <option value="all" <?= $selectedYear == 'all' ? 'selected' : '' ?>>See All</option>
                            <?php foreach ($fresherPassingYears as $year): ?>
                            <option value="<?= htmlspecialchars($year->passing_year) ?>"
                                <?= $selectedYear == $year->passing_year ? 'selected' : '' ?>>
                                <?= htmlspecialchars($year->passing_year) ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </form>
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Roll Number</th>
                                <th class="px-4 py-3">NRC</th>
                                <th class="px-4 py-3">Mark</th>
                                <th class="px-4 py-3">Year Of Passing</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <?php foreach ($paginationFresherData as $fresher): ?>

                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">
                                    <?= htmlspecialchars($fresher->student_name); ?>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <?= htmlspecialchars($fresher->matriculation_roll_num); ?>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <?= htmlspecialchars($fresher->nrc_num); ?>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <?= htmlspecialchars($fresher->matriculation_mark); ?>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <?= htmlspecialchars($fresher->passing_year); ?>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <button @click="openModal"
                                            onclick="openEditModal('<?= $fresher->id ?>','<?= $fresher->student_name ?>','<?= $fresher->matriculation_roll_num ?>','<?= $fresher->nrc_num ?>','<?= $fresher->matriculation_mark ?>','<?= $fresher->passing_year ?>')"
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
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            onclick="openDeleteModal('<?= $fresher->id ?>')" aria-label="Delete">
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
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
                <div
                    class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    <span class="flex items-center col-span-3">
                    </span>
                    <span class="col-span-2"></span>
                    <!-- Pagination -->
                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                        <nav aria-label="Table navigation">
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>

                            <ul class="inline-flex items-center">
                                <li>
                                    <a href="?page=<?= $i; ?>"
                                        class="text-black px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple <?php if ($i == $page): ?> ' transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600' <?php endif; ?> ">
                                        <?= $i; ?>
                                    </a>
                                </li>
                            </ul>
                            <?php endfor; ?>
                        </nav>
                    </span>
                </div>
                <form action="" method="post">
                    <div style="display:flex; padding:10px;">
                        <label class="block text-sm" style="margin:10px;">
                            <span class="text-gray-800 font-semibold dark:text-gray-500">Name</span>
                            <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                name="student_name" placeholder="eg.Kaung Myat Thu" />
                        </label>
                        <label class="block text-sm" style="margin:10px;">
                            <span class="text-gray-800 font-semibold dark:text-gray-500">Matriculation Roll
                                Number</span>
                            <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                name="matriculation_roll_num" placeholder="eg.20" />
                        </label>

                        <label class="block text-sm" style="margin:10px;">
                            <span class="text-gray-800 font-semibold dark:text-gray-500">NRC</span>
                            <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                name="nrc_num" placeholder="eg.11/satana(naing)140333" />
                        </label>
                        <label class="block text-sm" style="margin:10px;">
                            <span class="text-gray-800 font-semibold dark:text-gray-500">Mark</span>
                            <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                name="matriculation_mark" placeholder="eg.410" />
                        </label>
                        <label class="block text-sm" style="margin:10px;">
                            <span class="text-gray-800 font-semibold dark:text-gray-500">Year Of
                                Passing</span>
                            <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                name="passing_year" placeholder="eg.2020" />
                        </label>
                    </div>
                    <button name="addMoreFresher" style="margin:10px;"
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Add More
                    </button>
                </form>


                <div class="container px-6 mx-auto grid w-50 h-80 mt-4">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="relative">
                            <div class="mt-1 w-40">
                                <label for="file-upload"
                                    class="flex items-center justify-center px-4 py-2 bg-gray-200 text-gray-700 border border-gray-300 rounded-md cursor-pointer hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-600">
                                    <span>Select a file</span>
                                </label>
                                <input id="file-upload" type="file" name="excel" class="hidden"
                                    onchange="updateFileDetails()" />
                            </div>
                            <div id="file-info" class="mt-3 text-sm text-gray-600 dark:text-gray-300"></div>
                        </div>
                        <button type="submit" name="submit"
                            class="m-5 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Import
                        </button>
                    </form>
                </div>
                <?php else: ?>
                <div class="container px-6 mx-auto grid w-50 h-80">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Add Fresher
                    </h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="relative">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Upload
                                File</label>
                            <div class="mt-1">
                                <label for="file-upload"
                                    class="flex items-center justify-center px-4 py-2 bg-gray-200 text-gray-700 border border-gray-300 rounded-md cursor-pointer hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-600">
                                    <span>Click to select a file</span>
                                </label>
                                <input id="file-upload" type="file" name="excel" class="hidden"
                                    onchange="updateFileDetails()" />
                            </div>
                            <div id="file-info" class="mt-3 text-sm text-gray-600 dark:text-gray-300"></div>
                        </div>
                        <button type="submit" name="submit"
                            class="m-5 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Import
                        </button>
                    </form>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Modal For Edit -->
    <!-- Modal backdrop. This what you want to place close to the closing body tag -->
    <div id="editModal" x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
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

            <!-- Modal body -->
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                    Edit Fresher
                </p>
                <!-- Modal description -->
                <form action="" method="POST">
                    <input type="hidden" name="fresher_id" id="editFresherId">
                    <label class="block text-sm">
                        <span class="text-gray-800 font-semibold dark:text-gray-500">Name</span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="student_name" id="editFresherName" required />
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-800 font-semibold dark:text-gray-500">Roll Number</span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="matriculation_roll_num" id="editFresherRollNum" required />
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-800 font-semibold dark:text-gray-500">NRC</span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="nrc_num" id="editFresherNRC" required />
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-800 font-semibold dark:text-gray-500">Mark</span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="matriculation_mark" id="editFresherMark" required />
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-800 font-semibold dark:text-gray-500">Year Of Passing</span>
                        <input
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="passing_year" id="editFresherPassingYear" required />
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


    <!-- Delete Modal -->
    <div id="deleteModal"
        class="fixed inset-0 z-50 items-center justify-center hidden overflow-y-auto bg-gray-900 bg-opacity-50">
        <form action="" method="post">
            <div class="max-w-xl p-6 bg-white rounded-lg shadow-md">
                <input type="hidden" id="deleteFresherId" name="delete_fresher_id">
                <h2 class="text-xl font-bold mb-4">Confirm Deletion</h2>
                <p class="mb-6">Are you sure you want to delete data?</p>
                <div class="flex justify-end">
                    <button onclick="closeDeleteModal()"
                        class="px-4 py-2 mr-4 font-medium text-gray-700 bg-gray-200 rounded hover:bg-gray-300">Cancel</button>
                    <button type="submit" name="delete_fresher"
                        class="px-4 py-2 font-medium text-white bg-red-500 rounded hover:bg-red-600">Delete</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>

<script>
function openEditModal(id, name, rollNum, nrc, mark, passedYear) {
    document.getElementById('editFresherId').value = id;
    document.getElementById('editFresherName').value = name;
    document.getElementById('editFresherRollNum').value = rollNum;
    document.getElementById('editFresherNRC').value = nrc;
    document.getElementById('editFresherMark').value = mark;
    document.getElementById('editFresherPassingYear').value = passedYear;
}

function openDeleteModal(id) {
    document.getElementById('deleteFresherId').value = id;
    document.getElementById("deleteModal").style.display = "flex";
}

function closeDeleteModal() {
    document.getElementById("deleteModal").style.display = "none";
}

function updateFileDetails() {
    const fileInput = document.getElementById('file-upload');
    const fileInfo = document.getElementById('file-info');
    if (fileInput.files.length > 0) {
        const file = fileInput.files[0];
        fileInfo.textContent = `Selected file: ${file.name} (${file.type})`;
    } else {
        fileInfo.textContent = '';
    }
}
</script>