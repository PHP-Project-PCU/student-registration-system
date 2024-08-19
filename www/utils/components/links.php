<?php
// Get the current script path relative to the root
$currentPath = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));

// Determine how many levels up you need to go
if ($currentPath === '/www' || $currentPath === '/') {
    $relativePath = ''; // For the root index.php
} else {
    $relativePath = '/../';
}


?>

<head>
    <meta charset="UTF-8">
    <title>UCSPyay - University of Computer Studies, Pyay</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="UCSPyay - University of Computer Studies, Pyay">
    <meta name="keywords"
        content="myanmar, university, business, technology, creative, cryptocurrency, it solutions, ai, pyay, computer university">
    <meta name="author" content="UCSPyay">
    <meta name="website" content="https://ucspyay.edu.mm/">
    <meta name="email" content="admin@ucspyay.edu.mm">
    <meta name="version" content="2.2.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo $relativePath; ?>utils/assets/img/ucspyay/ucsp-logo-light.jpg">

    <!-- Css -->
    <link href="<?php echo $relativePath; ?>utils/assets/libs/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?php echo $relativePath; ?>utils/assets/libs/tobii/css/tobii.min.css" rel="stylesheet">
    <link href="<?php echo $relativePath; ?>utils/assets/libs/tiny-slider/tiny-slider.css" rel="stylesheet">
    <!-- Main Css -->
    <link href="<?php echo $relativePath; ?>utils/assets/libs/%40iconscout/unicons/css/line.css" type="text/css"
        rel="stylesheet">
    <link href="<?php echo $relativePath; ?>utils/assets/libs/%40mdi/font/css/materialdesignicons.min.css"
        rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo $relativePath; ?>utils/assets/css/tailwind.min.css">

</head>