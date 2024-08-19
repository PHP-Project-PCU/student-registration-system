<?php
require '../../../../vendor/autoload.php';
include '../../../../autoload.php';

use controllers\PostController;

$result = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_btn'])) {
    $data = [
        'title' => $_POST['title'],
        'description' => $_POST['description']
    ];
    $images = $_FILES['images'];
    $postController = new PostController();
    $result = $postController->createPost($data, $images);
    if ($result == true) {
        header("Location: ../");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
include("../../../utils/components/admin/admin.links.php");
?>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        <?php
        include("../../../utils/components/admin/admin.sidebar.php");
        ?>

        <div class=" flex flex-col flex-1 w-full">
            <?php
            include("../../../utils/components/admin/admin.navigation.php");
            ?>
            <div class="m-4">
                <h1>Create Post</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="title">Title:</label>
                    <input type="text" name="title" required><br>

                    <label for="description">Description:</label>
                    <textarea name="description" required></textarea><br>

                    <label for="images">Images:</label>
                    <input type="file" name="images[]" multiple required><br>

                    <input type="submit" name="create_btn" value="Create Post">
                </form>
            </div>
        </div>
    </div>
</body>

</html>