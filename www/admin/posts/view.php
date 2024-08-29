<?php
require '../../../vendor/autoload.php';
include '../../../autoload.php';

use controllers\PostController;

$postController = new PostController();
$post = $postController->getPostById($_GET['id']);
$coverImg = getRelativePath($post['images'][0]);


function getRelativePath($imgPath)
{
    //base URL
    $baseUrl = "http://ucspyay.edu/";

    //convert backslashes to forward slashes
    $imgPath = str_replace('\\', '/', $imgPath);

    // Find the start position of the 'utils/' 
    $startPos = strpos($imgPath, 'utils/');

    if ($startPos === false) {
        return 'Path segment not found';
    }

    // Extract the relative path starting from 'utils/'
    $relativePath = substr($imgPath, $startPos);

    // Construct the full URL
    return $baseUrl . $relativePath;
};


function formatDate($date)
{
    return date("M d, Y", strtotime($date));
}
$date = formatDate($post['created_at']);
?>

<!DOCTYPE html>
<html lang="en">
<?php include("../../utils/components/admin/admin.links.php"); ?>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900">
        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 w-64 bg-white dark:bg-gray-800 z-10">
            <?php include("../../utils/components/admin/admin.sidebar.php"); ?>
        </div>

        <!-- Main Content Area -->
        <div class="flex flex-col flex-1 pl-64">
            <!-- Navbar -->
            <div class="fixed w-full z-10">
                <?php include("../../utils/components/admin/admin.navigation.php"); ?>
            </div>

            <!-- Content -->
            <div class="flex-1 overflow-y-auto md:pt-16 px-4 pb-4">
                <div class="p-4">
                    <div class="flex justify-between mb-4">
                        <button
                            onclick="history.back()"
                            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            &larr;
                        </button>
                        <div class="flex gap-2">
                            <a href="create/">
                                <button
                                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    New Post
                                </button>
                            </a>
                            <a href="edit.php?id=<?= $post['id'] ?>" aria-label="Edit"
                                class="flex items-center justify-center px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                </svg>
                            </a>
                            <a href="delete.php?id=<?= $post['id'] ?>" aria-label="Delete"
                                class="flex items-center justify-center px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 rounded-md shadow dark:shadow-gray-800 p-6">
                        <img src="<?= $coverImg ?>" alt="" class="inline-block h-96 w-full rounded-md mr-2 mb-2 object-cover">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white my-4"><?= $post['title'] ?></h3>
                        <p class="text-gray-700 text-sm my-4">Posted at: <?= $date ?></p>
                        <p class="text-md text-gray-700 dark:text-gray-300"><?= $post['description'] ?></p>
                        <div class="mt-4">
                            <?php foreach ($post['images'] as $key => $image): ?>
                                <?php if ($key != 0): ?>
                                    <img src="<?= getRelativePath($image) ?>" alt="" class="cursor-pointer inline-block w-48  rounded-md mr-2 mb-2" onclick="openLightbox(this);">
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Light Box -->
    <div id="lightbox" class="lightbox" onclick="closeLightbox()">
        <span class="close">&times;</span>
        <img class="lightbox-content" id="lightbox-img">
    </div>
</body>

</html>