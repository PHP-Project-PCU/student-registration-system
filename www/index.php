<?php
include ('../autoload.php');
use controllers\MailController;

if (isset($_POST['submit'])) {

    $mailController = new MailController($_POST['stdEmail']);
    // $response = sendMail($_POST['email'], $_POST['subject'], $_POST['message']);
    $response = $mailController->sendMail();

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>

    <form action="" method="post" enctype="multipart/form-data">
        <h3>General Infromation</h3>
        <table>
            <tr>
                <td>Name</td>
            </tr>
            <tr>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Email</td>
            </tr>
            <tr>
                <td><input type="email" name="stdEmail"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Register" name="submit"></td>
            </tr>

        </table>
    </form>
</body>

</html>