<!DOCTYPE html>
<html lang="en" class="light scroll-smooth">

<?php
include("./utils/components/links.php");
include("./utils/components/navigation.php");
$heroVideoFilePath = "utils/assets/img/ucspyay/cu-short.mp4";
$youtubeCoverImgPath = "utils/assets/img/ucspyay/uc-build-1.jpg";
$ucspLogoImgPath = "utils/assets/img/ucspyay/ucsp-logo-light.jpg";



require '../vendor/autoload.php';
include '../autoload.php';

use controllers\PostController;

$postController = new PostController();
$posts = $postController->getPostsByLimit(5);

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
?>

<body class="font-nunito text-base text-black dark:text-white dark:bg-slate-900 scroll-smooth">
    <!-- Start Hero -->
    <section class="relative overflow-hidden py-16">
        <!-- Video Background -->
        <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover z-0">
            <source src="<?= $heroVideoFilePath ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <!-- Overlay (Optional) -->
        <div class="absolute inset-0 bg-indigo-600/5 dark:bg-indigo-600/10 z-1"></div>
        <div class="container relative z-2">
            <div class="grid grid-cols-1 md:mt-44 mt-32 text-center py-4">
                <div class="wow">
                    <h4
                        class="text-white font-bold lg:leading-normal leading-normal text-4xl lg:text-5xl mb-5 animate__animated animate__flipInX">
                        University of Computer Studies, Pyay</h4>
                    <p class="text-white text-lg max-w-xl mx-auto animate__animated animate__jello">
                        ကွန်ပျူတာတက္ကသိုလ်(ပြည်)</p>
                    <div class="mt-6">
                        <a href="/admissions/freshers"
                            class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md animate__animated animate__flipInX">Student
                            Admissions</a>
                    </div>
                </div>
            </div>
            <!--end grid-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- End Hero -->

    <!-- Counter Section -->
    <section class="py-6">
        <div class="container relative">
            <div class="grid md:grid-cols-4 grid-cols-2 justify-center gap-[30px]">
                <div class="mx-auto text-center py-4">
                    <p></p>
                    <p class="text-6xl sm:text-4xl font-bold text-indigo-600 counter-value" data-target="2007" data-start="2000">2000</p>
                    <p class="font-bold">Established</p>
                </div>
                <div class="mx-auto text-center py-4">
                    <p></p>
                    <p class="text-6xl font-bold text-indigo-600 counter-value" data-target="17" data-start="0">0</p>
                    <p class="font-bold">Years</p>
                </div>
                <div class="mx-auto text-center py-4">
                    <p></p>
                    <p class="text-6xl font-bold text-indigo-600 counter-value" data-target="50" data-start="1">1</p>
                    <p class="font-bold">Lecturers</p>
                </div>
                <div class="mx-auto text-center py-4">
                    <p></p>
                    <p class="text-6xl font-bold text-indigo-600 counter-value" data-target="1376" data-start="1300">1300</p>
                    <p class="font-bold">Graduates</p>
                </div>
            </div>
            <!--end grid-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- Counter Section -->

    <div class="container relative md:mt-24 mt-16">
        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Welcome to our
                university</h3>
            <p class="text-slate-400 max-w-xl mx-auto">Our university is</p>
            <p class="text-slate-400 max-w-xl mx-auto">To give the students a higher standard education. Give better
                education service,</p>
            <p class="text-slate-400 max-w-xl mx-auto">To provide human resources and enhance the development of the
                country.</p>
        </div>
        <!--end grid-->
    </div>

    <!-- Youtube Video Session Start -->
    <section class="relative md:py-24 py-16 md:pt-0 pt-0">
        <div class="container relative">
            <div class="grid grid-cols-1 justify-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                <div class="relative z-1">
                    <div class="grid grid-cols-1 md:text-start text-center justify-center">
                        <div class="relative">
                            <img src="<?= $youtubeCoverImgPath ?>" alt="School Image" class="rounded-md z-10">
                            <div class="absolute bottom-2/4 translate-y-2/4 start-0 end-0 text-center">
                                <a href="#!" data-type="youtube" data-id="NbjtynGOIGM"
                                    class="lightbox size-20 rounded-full shadow-lg dark:shadow-gray-800 inline-flex items-center justify-center bg-white dark:bg-slate-900 text-indigo-600 dark:text-white">
                                    <i class="mdi mdi-play inline-flex items-center justify-center text-2xl"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="content md:mt-8">
                        <div class="grid lg:grid-cols-12 grid-cols-1 md:text-start text-center justify-center">
                            <div class="lg:col-start-2 lg:col-span-10">
                                <div class="grid md:grid-cols-2 grid-cols-1 items-center">
                                    <div class="mt-8">
                                        <div class="section-title text-md-start">
                                            <h6 class="text-white/50 text-lg font-semibold">UCSPyay</h6>
                                            <h3
                                                class="md:text-3xl text-2xl md:leading-normal leading-normal font-semibold text-white mt-2">
                                                “ပညာ၀ေဆာ၊ သီရိခေတ္တရာ” </h3>
                                        </div>
                                    </div>
                                    <div class="mt-8">
                                        <div class="section-title text-md-start">
                                            <span class="text-white/50 max-w-xl mx-auto mb-2">University of Computer
                                                Studies (Pyay) is government funded university located in Pyay, Bago
                                                Region with an emphasis is on computer engineering at the undergraduate
                                                and graduate levels. Founded in 2004…</span>
                                            <a href="about" class="text-white">Read More <i
                                                    class="uil uil-angle-right-b align-middle"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row -->
        </div>
        <!--end container-->
        <div class="absolute bottom-0 start-0 end-0 sm:h-2/3 h-4/5 bg-gradient-to-b from-indigo-500 to-indigo-600">
        </div>
    </section>
    <!-- Youtube Video Session End -->

    <!-- News Session Start -->
    <div class="container relative md:mt-24 mt-16">
        <div class="grid md:grid-cols-12 grid-cols-1 items-center wow animate__animated animate__fadeInUp"
            data-wow-delay=".1s">
            <div class="md:col-span-6">
                <h6 class="text-indigo-600 text-sm font-bold uppercase mb-2">Blogs</h6>
                <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Reads Our Latest
                    <br> News & Blog
                </h3>
            </div>
            <div class="md:col-span-6">
                <p class="text-slate-400 max-w-xl">.</p>
            </div>
        </div>
        <!--end grid-->

        <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 mt-8 gap-[30px]">
            <?php foreach ($posts as $post) {
                $coverImg = getRelativePath($post['images'][0]);
            ?>
                <div class="blog relative rounded-md shadow dark:shadow-gray-800 overflow-hidden wow animate__animated animate__fadeInUp"
                    data-wow-delay=".7s">
                    <div class="w-full h-48 overflow-hidden">
                        <img src="<?= $coverImg ?>" alt="" class="w-full h-full object-cover">
                    </div>

                    <div class="content p-6">
                        <a href="posts.php?id=<?= $post['id'] ?>"
                            class="title h5 text-lg font-medium hover:text-indigo-600 duration-500 ease-in-out">
                            <?= htmlspecialchars(strlen($post['title']) > 100 ? substr($post['title'], 0, 100) . '...' : $post['title']) ?>
                        </a>
                        <p class="text-slate-400 mt-3">
                            <?= htmlspecialchars(strlen($post['description']) > 100 ? substr($post['description'], 0, 100) . '...' : $post['description']) ?>
                        </p>
                        <p class="text-gray-400 my-2 text-sm"><?= formatDate($post['created_at']) ?></p>


                        <div class="mt-4">
                            <a href="posts.php?id=<?= $post['id'] ?>"
                                class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-normal hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Read
                                More <i class="uil uil-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
        <!--end grid-->
    </div>
    <!--end container-->
    </section>
    <!--News Session End-->

    <?php
    include("./utils/components/footer.php");
    ?>

    <!-- Start Cookie Popup -->
    <div
        class="cookie-popup fixed max-w-lg bottom-3 end-3 start-3 sm:start-0 mx-auto bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md py-5 px-6 z-50">
        <p class="text-slate-400">This website uses cookies to provide you with a great user experience. By using it,
            you accept our <a href="https://shreethemes.in/" target="_blank"
                class="text-emerald-600 dark:text-emerald-500 font-semibold">use of cookies</a></p>
        <div class="cookie-popup-actions text-end">
            <button class="absolute border-none bg-none p-0 cursor-pointer font-semibold top-2 end-2"><i
                    class="uil uil-times text-dark dark:text-slate-200 text-2xl"></i></button>
        </div>
    </div>

    <!-- JAVASCRIPTS -->
    <script src="utils/assets/libs/wow.js/wow.min.js"></script>
    <script src="utils/assets/libs/tobii/js/tobii.min.js"></script>
    <script src="utils/assets/libs/tiny-slider/min/tiny-slider.js"></script>
    <script src="utils/assets/libs/feather-icons/feather.min.js"></script>
    <script src="utils/assets/js/plugins.init.js"></script>
    <script src="utils/assets/js/app.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const counters = document.querySelectorAll('.counter-value');
            const duration = 5000; // Total duration in milliseconds (5 seconds)

            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const start = +counter.getAttribute('data-start');
                const range = target - start;
                const stepTime = duration / range;

                let count = start;
                const updateCounter = () => {
                    count++;
                    counter.textContent = count;
                    if (count < target) {
                        setTimeout(updateCounter, stepTime);
                    } else {
                        counter.textContent = target;
                    }
                };

                updateCounter();
            });
        });
    </script>
    <!-- JAVASCRIPTS -->
</body>

</html>