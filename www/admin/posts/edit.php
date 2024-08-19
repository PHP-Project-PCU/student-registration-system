<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

use controllers\PostController;

$postController = new PostController();
$post = $postController->getPostById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_btn'])) {
    $data = [
        'title' => $_POST['title'],
        'description' => $_POST['description']
    ];

    // Handle file uploads if images are provided
    $images = $_FILES['images']['name'][0] != "" ? $_FILES['images'] : null;
    $result = $postController->updatePost($_GET['id'], $data, $images);

    if ($result === true) {
        header('Location: index.php');
        exit;  // Ensure no further code is executed after redirect
    } else {
        echo '<p class="text-red-500">Failed to update the post. Please try again.</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include("../../utils/components/admin/admin.links.php"); ?>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900">

        <!-- Sidebar -->
        <?php include("../../utils/components/admin/admin.sidebar.php"); ?>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 w-full">
            <!-- Navigation -->
            <?php include("../../utils/components/admin/admin.navigation.php"); ?>

            <!-- Page Content -->
            <div class="m-4">
                <!-- Back Button -->
                <button onclick="history.back()"
                    class="px-4 py-2 my-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Back
                </button>

                <!-- Edit Post Form -->
                <h3 class="mb-4 text-2xl font-semibold text-gray-800 dark:text-gray-300">Edit post</h3>
                <form action="" method="POST" enctype="multipart/form-data">
                    <!-- Title -->
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Title</span>
                        <input name="title" required
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Title" value="<?= htmlspecialchars($post['title']) ?>" />
                    </label>

                    <!-- Description -->
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Description</span>
                        <textarea name="description" required
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            rows="10"><?= htmlspecialchars($post['description']) ?></textarea>
                    </label>

                    <!-- Images -->
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Images</span>
                        <input name="images[]" id="images" type="file" multiple
                            class="w-full mt-3 cursor-pointer bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-lg outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0 file:bg-indigo-600 file:text-white file:border-none file:rounded-l-lg file:py-2 file:px-4 file:mr-3 file:cursor-pointer">
                    </label>

                    <!-- Update Button -->
                    <button name="update_btn"
                        class="px-4 py-2 mt-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>