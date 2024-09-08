<!DOCTYPE html>
<html lang="en" class="light scroll-smooth">

<?php

include("./../utils/components/links.php");
include("./../utils/components/navigation.php");
$heroImageFile = "../utils/assets/img/ucspyay/ucsp-front-build.jpg";


?>

<style>

    .disc{
        list-style: disc;
    
    }
</style>



<body class="font-nunito text-base text-black dark:text-white dark:bg-slate-900 scroll-smooth">
    
      <!-- Start Hero -->
    <section class="relative table w-full py-36 lg:py-44 bg-no-repeat bg-cover">
        <!-- Background image with fixed position and blur effect -->
        <div class="absolute w-full inset-0 bg-[url('<?= $heroImageFile ?>')] bg-no-repeat bg-center bg-cover bg-fixed backdrop-blur-lg"></div>

        <!-- Dark overlay for better text contrast -->
        <div class="absolute inset-0 bg-black opacity-80"></div>

        <!-- Content container -->
        <div class="relative container">
            <div class="grid grid-cols-1 p-8 text-center mt-12 rounded-md border border-white transparent">
                <h3 class="mb-4 md:text-4xl text-3xl md:leading-normal leading-normal font-bold text-white">
                    "Faculty of Computer System and Technologies"
                </h3>
            </div>
            <!--end grid-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- End Hero -->
    <section class="relative overflow-hidden py-16">
        <div class="container relative md:mt-24 mt-16">
            <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                <div class="lg:col-span-4 md:col-span-5">
                    <div class="sticky top-20">
                        <ul class="flex-column text-center p-6 bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                            <li role="presentation">
                                <button class="px-4 py-2 text-base font-semibold rounded-md w-full hover:text-indigo-600 duration-500" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Vission and Mission</button>
                            </li>
                            <li role="presentation">
                                <button class="px-4 py-2 text-base font-semibold rounded-md w-full mt-3 duration-500" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Member</button>
                            </li>
                            <li role="presentation">
                                <button class="px-4 py-2 text-base font-semibold rounded-md w-full mt-3 duration-500" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Course</button>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="lg:col-span-8 md:col-span-7">
                    <div id="myTabContent" class="p-6 bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md">
                        <div class="" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <img src="assets/images/cowork/7.jpg" class="shadow rounded-md" alt="">
                            <div class="mt-6">
                                <h5 class="text-lg font-semibold mb-4">Vision</h5>
                                <p class="text-slate-400 mb-2">
                                   <ul class='disc'>
                                    <li>The Faculty of Computer System and Technology will have a transformative impact on computer technology through continnual innovation in research,creativity and entrepreneurship.</li>
                                    <li>Producing the technicians that are recognized by international countries and being a university that is conducting the standard quality of research compared with others.</li>
                                    </ul>
                                    </p><br>
                                <h5 class="text-lg font-semibold mb-4">Mission</h5>
                                <p class="text-slate-400 mb-2">

                                <ul class='disc'>
                                    <li>Promoting high quality teaching based on ethical professional and principled approaches.</li>
                                    <li>Nurturing students to be future technicians.</li>
                                    <li>Conducting state of the art research which can be applied for the benefit of industrial development.</li>
                                    <li>UCS(Pyay) is a national university where students are able to be the leaders of technology and catch up with international societies.</li>
                                    </ul> </p><br>
                                <h5 class="text-lg font-semibold mb-4">Objectives</h5>
                                <p class="text-slate-400 mb-2">
                                    <ul class='disc'>
                                   <li> To develop technical innivation and provide students to be qualified technicians.</li>
                                   <li> Not only to improve education but also to guide live developing ways for students.</li>
                                   <li> To nurture graduates with ethical standards and problem-solving skills.</li> </ul></p>
                                   
                            </div>
                        </div>
                        <div class="hidden" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                            <div class="relative md:py-24 py-16">
                                <div class="container relative">
                                    <div id="grid" class=" w-full grid grid-cols-2 mx-auto mt-4">
                                        <div class=" p-4 picture-item" data-groups='["development"]'>
                                            <div class="group relative block overflow-hidden rounded-md duration-500">
                                                <a href="portfolio-detail-one.html"><img src="./../utils/assets/img/ucspyay/ucsp-logo-light.jpg" class="rounded-md" alt="" width="200" height="300"></a>
                                                <div class="content pt-3">
                                                    <h5 class="mb-1"><a href="portfolio-detail-one.html" class="hover:text-indigo-600 duration-500 font-semibold">Pen and article</a></h5>

                                                </div>
                                            </div>
                                        </div>

                                        <div class=" p-4 picture-item" data-groups='["photography"]'>
                                            <div class="group relative block overflow-hidden rounded-md duration-500">
                                                <a href="portfolio-detail-one.html"><img src="./../utils/assets/img/ucspyay/ucsp-logo-light.jpg" class="rounded-md" alt="" width="200" height="300"></a>
                                                <div class="content pt-3">
                                                    <h5 class="mb-1"><a href="portfolio-detail-one.html" class="hover:text-indigo-600 duration-500 font-semibold">White mockup box</a></h5>

                                                </div>
                                            </div>
                                        </div>

                                        <div class=" p-4 picture-item" data-groups='["photography"]'>
                                            <div class="group relative block overflow-hidden rounded-md duration-500">
                                                <a href="portfolio-detail-one.html"><img src="./../utils/assets/img/ucspyay/ucsp-logo-light.jpg" class="rounded-md" alt="" width="200" height="300"></a>
                                                <div class="content pt-3">
                                                    <h5 class="mb-1"><a href="portfolio-detail-one.html" class="hover:text-indigo-600 duration-500 font-semibold">White mockup box</a></h5>

                                                </div>
                                            </div>
                                        </div>

                                        <div class=" p-4 picture-item" data-groups='["photography"]'>
                                            <div class="group relative block overflow-hidden rounded-md duration-500">
                                                <a href="portfolio-detail-one.html"><img src="./../utils/assets/img/ucspyay/ucsp-logo-light.jpg" class="rounded-md" alt="" width="200" height="300"></a>
                                                <div class="content pt-3">
                                                    <h5 class="mb-1"><a href="portfolio-detail-one.html" class="hover:text-indigo-600 duration-500 font-semibold">White mockup box</a></h5>

                                                </div>
                                            </div>
                                        </div>


                                        <div class=" p-4 picture-item" data-groups='["development"]'>
                                            <div class="group relative block overflow-hidden rounded-md duration-500">
                                                <a href="portfolio-detail-one.html"><img src="./../utils/assets/img/ucspyay/ucsp-logo-light.jpg" class="rounded-md" alt="" width="200" height="300"></a>
                                                <div class="content pt-3">
                                                    <h5 class="mb-1"><a href="portfolio-detail-one.html" class="hover:text-indigo-600 duration-500 font-semibold">Pen and article</a></h5>

                                                </div>
                                            </div>
                                        </div>

                                        <div class=" p-4 picture-item" data-groups='["photography"]'>
                                            <div class="group relative block overflow-hidden rounded-md duration-500">
                                                <a href="portfolio-detail-one.html"><img src="./../utils/assets/img/ucspyay/ucsp-logo-light.jpg" class="rounded-md" alt="" width="200" height="300"></a>
                                                <div class="content pt-3">
                                                    <h5 class="mb-1"><a href="portfolio-detail-one.html" class="hover:text-indigo-600 duration-500 font-semibold">White mockup box</a></h5>

                                                </div>
                                            </div>
                                        </div>

                                        <div class=" p-4 picture-item" data-groups='["photography"]'>
                                            <div class="group relative block overflow-hidden rounded-md duration-500">
                                                <a href="portfolio-detail-one.html"><img src="./../utils/assets/img/ucspyay/ucsp-logo-light.jpg" class="rounded-md" alt="" width="200" height="300"></a>
                                                <div class="content pt-3">
                                                    <h5 class="mb-1"><a href="portfolio-detail-one.html" class="hover:text-indigo-600 duration-500 font-semibold">White mockup box</a></h5>

                                                </div>
                                            </div>
                                        </div>

                                        <div class=" p-4 picture-item" data-groups='["photography"]'>
                                            <div class="group relative block overflow-hidden rounded-md duration-500">
                                                <a href="portfolio-detail-one.html"><img src="./../utils/assets/img/ucspyay/ucsp-logo-light.jpg" class="rounded-md" alt="" width="200" height="300"></a>
                                                <div class="content pt-3">
                                                    <h5 class="mb-1"><a href="portfolio-detail-one.html" class="hover:text-indigo-600 duration-500 font-semibold">White mockup box</a></h5>

                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                </div><!--end container-->
                            </div>

                        </div>

                    <div class="hidden " id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        <img src="assets/images/cowork/9.jpg" class="shadow rounded-md" alt="">
                        <div class="mt-6">
                            <h5 class="text-lg font-semibold mb-4">Courses</h5>
                            
                            ➢ Digital Fundamental<br>
                            ➢ Computer Organization <br>
                            ➢ Data and Computer Communication Electronic I<br>
                            ➢ Linear Control Systems <br>
                            ➢ Engineering Circuit II  <br>
                            ➢ Introduction to Microcontroller <br>
                            ➢ Computer Architecture II<br>
                            ➢ Control System I<br>
                            ➢ Computer Networking II<br>
                            ➢ Advanced Networking<br>
                            ➢ Electrical Circuits I<br>
                            ➢ Microprocessor Architecture and Interfacing<br>
                            ➢ Introduction to Embedded Systems<br>
                            
                                
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
     <?php
    include("./../utils/components/footer.php");
     ?>


    <!-- JAVASCRIPTS -->
    <script src="../utils/assets/libs/wow.js/wow.min.js"></script>
    <script src="../utils/assets/libs/tobii/js/tobii.min.js"></script>
    <script src="../utils/assets/libs/tiny-slider/min/tiny-slider.js"></script>
    <script src="../utils/assets/libs/feather-icons/feather.min.js"></script>
    <script src="../utils/assets/js/plugins.init.js"></script>
    <script src="../utils/assets/js/app.js"></script>
    <!-- JAVASCRIPTS -->
</body>
</html>