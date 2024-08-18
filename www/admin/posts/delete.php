<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

use controllers\PostController;

$postController = new PostController();
$posts = $postController->deletePost($_GET['id']);
header("Location:index.php");
