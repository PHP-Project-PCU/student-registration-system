<?php


require '../../../vendor/autoload.php';
include '../../../autoload.php';

use controllers\PostController;

$postController = new PostController();
$posts = $postController->index();


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
    <?php
    foreach ($posts as $post) {
    ?>
        <h1><?= $post['title'] ?></h1>
        <p><?= $post['description'] ?></p>
        <?php
        foreach ($post['images'] as $image) {
            $imagePath = getRelativePath($image);
        ?>
            <img src="<?= $imagePath ?>" alt="" width="100">


        <?php
        } ?>
        <a href="view.php?id=<?= $post['id'] ?>">View</a>
        <a href="edit.php?id=<?= $post['id'] ?>">Edit</a>
        <a href="delete.php?id=<?= $post['id'] ?>">Delete</a>
    <?php }
    ?>
</body>

</html>