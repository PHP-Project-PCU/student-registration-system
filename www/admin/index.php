<?php
require '../../vendor/autoload.php';
include '../../autoload.php';

use controllers\DeptController;
use controllers\SemesterController;
use controllers\AcademicYearController;
use controllers\StudentAdmissionController;
use core\helpers\HTTP;

session_start();
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

$academicYearController = new AcademicYearController();
$academicYears = $academicYearController->index();
$academicYear = $academicYears[0]['academic_year'] ?? null;

$studentAdmissionController = new StudentAdmissionController();
$studentsYears = $studentAdmissionController->getStudentsYear();

$totalFirstYearStudentAdmissionCount = $studentAdmissionController->getStudentAdmissionTotalCount(1);
$totalFristYearStudentAdmissionApprovedCount = $studentAdmissionController->getStudentAdmissionApprovedCount(1);

$totalSecondYearStudentAdmissionCount = $studentAdmissionController->getStudentAdmissionTotalCount(2);
$totalSecondYearStudentAdmissionApprovedCount = $studentAdmissionController->getStudentAdmissionApprovedCount(2);

$totalThirdYearStudentAdmissionCount = $studentAdmissionController->getStudentAdmissionTotalCount(3);
$totalThirdYearStudentAdmissionApprovedCount = $studentAdmissionController->getStudentAdmissionApprovedCount(3);

$totalFourthYearStudentAdmissionCount = $studentAdmissionController->getStudentAdmissionTotalCount(4);
$totalFourthYearStudentAdmissionApprovedCount = $studentAdmissionController->getStudentAdmissionApprovedCount(4);

$totalFifthYearStudentAdmissionCount = $studentAdmissionController->getStudentAdmissionTotalCount(5);
$totalFifthYearStudentAdmissionApprovedCount = $studentAdmissionController->getStudentAdmissionApprovedCount(5);

?>

<!DOCTYPE html>
<html lang="en">
<?php
include("../utils/components/admin/admin.links.php");
?>

<body class="bg-gray-50">
    <div class="flex h-screen bg-white" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Sidebar -->
        <?php
        include("../utils/components/admin/admin.sidebar.php");
        ?>
        <!-- Main content -->
        <div class=" flex flex-col flex-1 md:ml-64">
            <!-- Navbar -->
            <?php
            include("../utils/components/admin/admin.navigation.php");
            ?>
            <!-- Scrollable content section -->
            <div class="overflow-y-hidden mx-auto md:pt-16 px-4 pb-4 h-screen">

                <?php if (isset($academicYear)): ?>
                <div class="p-4">
                    <!--Div that will hold the pie chart-->
                    <div id="chart_div" class="col-span-6" style="width: 50%;"></div>
                    <div id="column_div" class="col-span-6" style="width: 50%;"></div>
                    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
                </div>
                <?php else: ?>
                <div class="flex items-center justify-center h-screen">
                    <div id="lottie-animation" style="width: 300px; height: 300px;"></div>

                </div>
                <?php endif ?>
            </div>
        </div>


</body>
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load the Visualization API and the corechart package.
google.charts.load('current', {
    'packages': ['corechart']
});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);

// Callback that creates and populates a data table,
// instantiates the pie chart, passes in the data and
// draws it.
function drawChart() {
    // Pie chart data
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Slices');
    data.addRows([
        ['ပထမနှစ်', <?= $totalFirstYearStudentAdmissionCount ?>],
        ['ဒုတိယနှစ်', <?= $totalSecondYearStudentAdmissionCount ?>],
        ['တတိယနှစ်', <?= $totalThirdYearStudentAdmissionCount ?>],
        ['စတုတ္ထနှစ်', <?= $totalFourthYearStudentAdmissionCount ?>],
        ['ပဥ္စမနှစ်', <?= $totalFifthYearStudentAdmissionCount ?>]
    ]);

    // Set chart options for Pie Chart
    var options = {
        'title': '<?= $academicYear ?> ကျောင်းလျှောက်ထားသူအရေအတွက်',
        'width': 1000,
        'height': 600
    };

    // Instantiate and draw the pie chart
    var pieChart = new google.visualization.PieChart(document.getElementById('chart_div'));
    pieChart.draw(data, options);

}
</script>


<!-- Lottie web library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.10.1/lottie.min.js"></script>

<script>
// Load and play Lottie animation
var animation = lottie.loadAnimation({
    container: document.getElementById(
        'lottie-animation'), // the DOM element where the animation will be rendered
    renderer: 'svg', // use 'svg' renderer for web
    loop: true, // the animation will loop
    autoplay: true, // animation will start playing automatically
    path: '/utils/assets/lotties/no-data-found.json' // the path to your Lottie JSON file
});
</script>


</html>