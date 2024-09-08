<?php
require '../../vendor/autoload.php';
include '../../autoload.php';

use controllers\DeptController;
use controllers\SemesterController;
use controllers\AcademicYearController;
use controllers\StudentAdmissionController;
use core\helpers\HTTP;

// if (!isset($_SESSION['admin'])) {
//     HTTP::redirect("/login");
//     exit();
// }


session_start();

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
            <div class="overflow-y-auto md:pt-16 px-4 pb-4 h-full">

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
            'width': 700,
            'height': 400
        };

        // Instantiate and draw the pie chart
        var pieChart = new google.visualization.PieChart(document.getElementById('chart_div'));
        pieChart.draw(data, options);

        // Column chart data
        var data2 = google.visualization.arrayToDataTable([
            ['Year', 'ကျောင်းသား/သူ', {
                role: 'style'
            }],
            ['2019', 10, 'cyan'],
            ['2020', 14, 'color: #76A7FA'],
            ['2021', 16, 'orange'],
            ['2022', 22, 'blue'],
            ['2023', 28, 'purple']
        ]);

        // Set chart options for Column Chart
        var options2 = {
            'title': 'နှစ်အလိုက်ပထမနှစ်ကျောင်းလျှောက်ထားသူအရေအတွက်',
            'width': 700,
            'height': 400
        };

        // Instantiate and draw the column chart
        var columnChart = new google.visualization.ColumnChart(document.getElementById('column_div'));
        columnChart.draw(data2, options2);

        // chart 3
        // google.charts.load('current', {
        //     'packages': ['bar']
        // });
        // google.charts.setOnLoadCallback(drawChart);

        // function drawChart() {
        //     var data = google.visualization.arrayToDataTable([
        //         ['Year', 'Sales', 'Expenses', 'Profit'],
        //         ['2014', 1000, 400, 200],
        //         ['2015', 1170, 460, 250],
        //         ['2016', 660, 1120, 300],
        //         ['2017', 1030, 540, 350]
        //     ]);

        //     var options = {
        //         chart: {
        //             title: 'Company Performance',
        //             subtitle: 'Sales, Expenses, and Profit: 2014-2017',
        //         }
        //     };

        //     var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        //     chart.draw(data, google.charts.Bar.convertOptions(options));
        // }
    }
</script>


<!-- Lottie web library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.10.1/lottie.min.js"></script>

<script>
    // Load and play Lottie animation
    var animation = lottie.loadAnimation({
        container: document.getElementById('lottie-animation'), // the DOM element where the animation will be rendered
        renderer: 'svg', // use 'svg' renderer for web
        loop: true, // the animation will loop
        autoplay: true, // animation will start playing automatically
        path: '/utils/assets/lotties/no-data-found.json' // the path to your Lottie JSON file
    });
</script>


</html>