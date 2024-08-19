<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

use controllers\PostController;

$postController = new PostController();
$posts = $postController->index();

function getRelativePath($imgPath)
{
    $baseUrl = "http://ucspyay.edu/";
    $imgPath = str_replace('\\', '/', $imgPath);
    $startPos = strpos($imgPath, 'utils/');
    if ($startPos === false) {
        return 'Path segment not found';
    }
    $relativePath = substr($imgPath, $startPos);
    return $baseUrl . $relativePath;
};

function formatDate($date)
{
    return date("M d, Y", strtotime($date));
}
?>


<!DOCTYPE html>
<html lang="en">

<?php include("../../utils/components/admin/admin.links.php"); ?>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900">
        <!-- Sidebar -->
        <div class="w-64 bg-white dark:bg-gray-800 z-10 hidden md:block">
            <?php include("../../utils/components/admin/admin.sidebar.php"); ?>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col">
            <!-- Navbar -->
            <div class="sticky top-0 w-full z-10 bg-white dark:bg-gray-800">
                <?php include("../../utils/components/admin/admin.navigation.php"); ?>
            </div>

            <!-- Posts Section -->
            <div class="flex-1 overflow-y-auto pt-4 px-4 pb-4 md:pl-8">
                <div class="m-4">
                    <button
                        onclick="window.location.href='create'"
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        New Post
                    </button>
                    <div class="mt-8">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            <?php foreach ($posts as $post) {
                                $coverImg = getRelativePath($post['images'][0]);
                            ?>

                                <div class="blog relative rounded-md shadow dark:shadow-gray-800 overflow-hidden">
                                    <img src="<?= $coverImg ?>" alt="" class="w-full h-48 object-cover">
                                    <div class="content p-6 ">
                                        <a href="view.php?id=<?= $post['id'] ?>"
                                            class="">
                                            <h3 class="text-xl text-slate-500 hover:text-indigo-600 dark:text-gray-200 font-semibold">
                                                <?= htmlspecialchars(strlen($post['title']) > 100 ? substr($post['title'], 0, 100) . '...' : $post['title']) ?>
                                            </h3>
                                            <p class="text-gray-500 hover:text-indigo-600 dark:text-gray-200 text-md mt-3">
                                                <?= htmlspecialchars(strlen($post['description']) > 100 ? substr($post['description'], 0, 100) . '...' : $post['description']) ?>
                                            </p>
                                        </a>
                                        <div class="flex justify-between items-center mt-4">
                                            <p class="text-gray-400 text-sm"><?= formatDate($post['created_at']) ?></p>
                                            <div class="flex space-x-2">
                                                <a href="edit.php?id=<?= $post['id'] ?>" aria-label="Edit"
                                                    class="flex items-center justify-center p-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                        </path>
                                                    </svg>
                                                </a>
                                                <a href="delete.php?id=<?= $post['id'] ?>" aria-label="Delete"
                                                    class="flex items-center justify-center p-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>