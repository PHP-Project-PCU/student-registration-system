<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

use Shuchkin\SimpleXLSX;
use controllers\FresherController;
use core\helpers\HTTP;

if (isset($_POST['submit'])) {
    $excelFile = $_FILES['excel']['name'];
    $excelFileTempName = $_FILES['excel']['tmp_name'];
    $target = 'C:/xampp/htdocs/student-registration-system/www/utils/uploads/files/' . $excelFile;
    move_uploaded_file($excelFileTempName, $target);

    // Load the Excel file
    $xlsx = SimpleXLSX::parse('C:/xampp/htdocs/student-registration-system/www/utils/uploads/files/' . $excelFile);

    if (!$xlsx) {
        // Error handling if the file cannot be parsed
        echo 'Error: ' . SimpleXLSX::parseError();
        exit;
    }

    $data = [];

    // Get the rows of the first sheet
    $rows = $xlsx->rows();

    if (count($rows) > 0) {
        // Separate the header (column names)
        $header = $rows[0];

        // Iterate over the data rows
        for ($i = 1; $i < count($rows); $i++) {
            $row = $rows[$i];
            $rowData = [];

            // Map each cell to the corresponding column name
            foreach ($header as $index => $colName) {
                // Ensure the column name matches your desired keys
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

            // Add the row data to the main data array
            $data[] = $rowData;
        }

        // Debugging: Output the final data array

        $fresherController = new FresherController($data);
        $fresherController->setFreshers();
    } else {
        echo "<script>alert('No data found in the Excel file.')</script>";
    }
}
?>





<!DOCTYPE html>


<?php include('../head.php') ?>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        <?php
        include('../sidebar.php');
        ?>

        <div class="flex flex-col flex-1 w-full">
            <?php
            include('../header.php');
            ?>
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid w-50 h-80">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Add Fresher
                    </h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <!-- <div id="dropzone" class="bg-gray-100 flex items-center justify-center h-screen"
                            style="border:dotted; cursor:pointer;">
                            <div class="w-96 h-48 rounded-lg bg-white flex items-center justify-center text-center">
                                <p class="text-gray-500">Drag & Drop your file here or click to select</p>
                            </div>

                            <input id="fileInput" type="file" class="hidden" />
                        </div> -->
                        <input type="file" name="excel">
                        <input type="submit" name="submit" value="Done">
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>

</html>

<script>
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
</script>