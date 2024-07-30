<?php
include ('../../../autoload.php');
use controllers\AuthController;
use core\helpers\HTTP;

session_start();

if (isset($_SESSION['admin'])) {
    HTTP::redirect('/');
}


if (isset($_POST['userName']) and isset($_POST['password'])) {
    $username = $_POST['userName'];
    $password = md5($_POST['password']);
    $admin = new AuthController(null, $username, $password);
    $success = $admin->adminLogin();
    if ($success) {

        $_SESSION['admin'] = $admin->adminLogin();



        HTTP::redirect("/");

    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="http://ucsp.edu/utils/tailwindcss/tailwindcss.js"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-8 bg-white rounded-lg shadow-md">
        <div>
            <h2 class="text-3xl font-extrabold text-center text-gray-900">Sign In</h2>
        </div>
        <form class="mt-8 space-y-6" action="./" method="post">
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="user-name" class="sr-only">User name</label>
                    <input id="user-name" name="userName" type="text" autocomplete="text" required
                        class="relative block w-full px-3 py-2 border border-gray-300 rounded-none appearance-none rounded-t-md placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="example@001">
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="relative block w-full px-3 py-2 border border-gray-300 rounded-none appearance-none rounded-b-md placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Password">
                </div>
            </div>
            <div>
                <button type="submit"
                    class="relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md group hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Sign In
                </button>
            </div>
        </form>
    </div>
</body>

</html>