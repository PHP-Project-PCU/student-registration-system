<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

use controllers\PostController;

$postController = new PostController();
$post = $postController->getPostById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_btn'])) {
    $data = [
        'title' => $_POST['title'],
        'description' => $_POST['description']
    ];
    $images = $_FILES['images'];
    $result = $postController->updatePost($_GET['id'], $data, $images);
    if ($result === true) {
        header('Location: index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
</head>

<body>
    <h1>Edit Post</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required><br>

        <label for="description">Description:</label>
        <textarea name="description" required><?= htmlspecialchars($post['description']) ?></textarea><br>

        <label for="images">Images:</label>
        <input type="file" name="images[]" multiple><br>

        <input type="submit" name="edit_btn" value="Update Post">
    </form>
</body>

</html>