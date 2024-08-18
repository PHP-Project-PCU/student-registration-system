<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

use Shuchkin\SimpleXLSX;
use controllers\FresherController;

$flag = false;


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

        // Debugging: Output the final data array

        $fresherController = new FresherController($data);
        $fresherController->setFreshers();
        $fresherController = new FresherController($data, null, null);
        $flag = $fresherController->setFreshers();
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
        "passing_year" => $passing_year
    ];
    $fresherController = new FresherController($data, null, null);
    $addingIndividualFresherFlag = $fresherController->setIndividualFresher();

}

// Pagination Logic
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = 4;
$fresherController = new FresherController(null, $page, $limit);
$paginationFresherData = $fresherController->getFresherPaginationData();
$getFreshersTotalRows = $fresherController->getTotalRows();
$totalPages = ceil($getFreshersTotalRows / $limit);



?>

<!DOCTYPE html>
<html lang="en">


<?php
include("../../utils/components/admin/admin.links.php");
?>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <?php
        include("../../utils/components/admin/admin.sidebar.php");
        ?>
        <div class="flex flex-col flex-1 w-full">
            <?php
            include("../../utils/components/admin/admin.navigation.php");
            ?>

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <?php if ($flag || !empty($paginationFresherData)): ?>

                    <div class="w-full overflow-x-auto">
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
                                                <button
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
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" style="border-bottom: 2px solid grey; outline:none;"
                                            placeholder="Student Name" name="student_name">
                                        <input type="text" style="border-bottom: 2px solid grey; outline:none;"
                                            placeholder="Roll Number" name="matriculation_roll_num">
                                        <input type="text" style="border-bottom: 2px solid grey; outline:none;"
                                            placeholder="NRC" name="nrc_num">
                                        <input type="text" style="border-bottom: 2px solid grey; outline:none;"
                                            placeholder="Mark" name="matriculation_mark">
                                        <input type="text" style="border-bottom: 2px solid grey; outline:none;"
                                            placeholder="Year of Passing" name="passing_year">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:15px;">
                                        <button name="addMoreFresher"
                                            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                            Add More
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>

                <?php else: ?>
                    <div class="container px-6 mx-auto grid w-50 h-80">
                        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            Add Fresher
                        </h2>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="file" name="excel">
                            <input type="submit" name="submit" value="Done">
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php if ($addingIndividualFresherFlag): ?>
        <!-- Modal backdrop. This what you want to place close to the closing body tag -->
        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
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
                <div class="mt-4 mb-6">
                    <!-- Modal title -->
                    <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                        Modal header
                    </p>
                    <!-- Modal description -->
                    <p class="text-sm text-gray-700 dark:text-gray-400">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum et
                        eligendi repudiandae voluptatem tempore!
                    </p>
                </div>
                <footer
                    class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                    <button @click="closeModal"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                        Cancel
                    </button>
                    <button
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Accept
                    </button>
                </footer>
            </div>
        </div>
    <?php endif ?>
</body>

</html>
<!-- <script>
const dropzone = document.getElementById('dropzone');
const fileInput = document.getElementById('fileInput');

// Highlight dropzone on dragover
dropzone.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropzone.classList.add('border-blue-500', 'bg-blue-50');
});

// Remove highlight on dragleave or drop
dropzone.addEventListener('dragleave', () => {
    dropzone.classList.remove('border-blue-500', 'bg-blue-50');
});

dropzone.addEventListener('drop', (e) => {
    e.preventDefault();
    dropzone.classList.remove('border-blue-500', 'bg-blue-50');
    const files = e.dataTransfer.files;
    handleFiles(files);
});

// Open file dialog when clicking on dropzone
dropzone.addEventListener('click', () => {
    fileInput.click();
});

// Handle files selected via file input
fileInput.addEventListener('change', (e) => {
    const files = e.target.files;
    handleFiles(files);
});

function handleFiles(files) {
    if (files.length > 0) {
        const file = files[0];
        dropzone.innerHTML = `<p class="text-gray-700">${file.name}</p>`;
    }
}
</script> -->