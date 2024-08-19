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
<?php
include("../../utils/components/admin/admin.links.php");
?>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        <?php
        include("../../utils/components/admin/admin.sidebar.php");
        ?>

        <div class=" flex flex-col flex-1 w-full">
            <?php
            include("../../utils/components/admin/admin.navigation.php");
            ?>
            <div class="m-4">


                <a href="create/">
                    <button
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        New Post
                    </button>
                </a>

                <?php
                foreach ($posts as $post) {
                    $coverImg = getRelativePath($post['images'][0])
                ?>
                    <div class="">
                        <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 mt-8 gap-[30px]">
                            <div class="blog relative rounded-md shadow dark:shadow-gray-800 overflow-hidden wow animate__animated animate__fadeInUp"
                                data-wow-delay=".7s">
                                <img src="<?= $coverImg ?>" alt="">
                                <div class="content p-6">
                                    <div>
                                        <a href="view.php?id=<?= $post['id'] ?>"
                                            class=" title h5 text-xl font-medium hover:text-indigo-600 duration-500 ease-in-out"><?= $post['title'] ?></a>
                                        <p class="text-slate-300 text-md hover:text-indigo-600 duration-500 ease-in-out cursor-pointer mt-3"><?= $post['description'] ?> </p>
                                    </div>
                                    <div class="flex justify-end items-center">
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <a href="edit.php?id=<?= $post['id'] ?>">

                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                            </a>
                                            </svg>
                                        </button>
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete">
                                            <a href="delete.php?id=<?= $post['id'] ?>">

                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                <?php }
                ?>
            </div>
        </div>

</body>

</html>