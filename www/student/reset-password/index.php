<?php
include('../../../autoload.php');

use controllers\StudentAuthController;
use core\helpers\HTTP;

if (isset($_POST['student_new_password']) and isset($_POST['student_confirm_password'])) {
    $studentNewPassword = md5($_POST['student_new_password']);
    $studentConfirmPassword = md5($_POST['student_confirm_password']);

    if ($studentNewPassword === $studentConfirmPassword) {
        $studentAuthController = new StudentAuthController();

        $studentUpdatePasswordData = array(
            "password" => $studentConfirmPassword,
            "studentId" => $_GET['id']
        );

        $updateFlag = $studentAuthController->updateStudentPassword($studentUpdatePasswordData);

        if ($updateFlag) {
            // $hashPasswordData
            // $studentAuthController->updateStudentResetStatus(intval($_GET['id']))
            header("location: /");
            // $_SESSION['reset_status'] = $resetStatus->reset_status;
            // HTTP::redirect("/login", "reset=$resetStatus->reset_status");
            exit();
        } else {
            echo "Password reset failed. Please try again.";
        }
    } else {
        echo "Passwords do not match. Please try again.";
    }
}
?>


<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Password - UCSPYAY</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="http://ucspyay.edu/utils/assets/css/tailwind.output.css" />
    <script src="http://ucspyay.edu/utils/assets/js/alpine.min.js" defer></script>
    <script src="http://ucspyay.edu/utils/assets/js/init-alpine.js"></script>
</head>

<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
                        src="http://ucspyay.edu/utils/assets/img/login-office.jpeg" alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                        src="http://ucspyay.edu/utils/assets/img/login-office-dark.jpeg" alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <form action="" method="post">
                        <div class="w-full">
                            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                                Reset Password
                            </h1>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">New Password</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="adminmyo" type='password' name='student_new_password' />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Confirm Password</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="***************" type="password" name='student_confirm_password' />
                            </label>

                            <!-- You should use a button here, as the anchor is only used for the example  -->
                            <button
                                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                type='submit'>
                                Reset Password
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>

</html>