<?php


require '../../../vendor/autoload.php';
include '../../../autoload.php';

use controllers\PostController;

$postController = new PostController();
$post = $postController->getPostById($_GET['id']);
// var_dump($post);


function getRelativePath($imgPath)
{
    $startPos = strpos($imgPath, 'uploads/');
    if ($startPos === false) {
        return 'Path segment not found';
    }
    return substr($imgPath, $startPos);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1><?= $post['title'] ?></h1>
    <p><?= $post['description'] ?></p>
    <?php
    foreach ($post['images'] as $image) {
        $imagePath = getRelativePath($image);
    ?>
        <img src="<?= $imagePath ?>" alt="" width="100">
    <?php
    }
    ?>
    <a href="edit.php?id=<?php echo $id = $post['id']; ?>">Edit</a>
    <a onclick="deletePost(<?= $post['id'] ?>)">Delete</a>
</body>

</html>