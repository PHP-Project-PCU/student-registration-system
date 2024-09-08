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
                    "Department of Finance"
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
                                   <ul>
                                    <li>Budget of the country will be systematic expenditure and will not be decimated with systematic practical financial conventionality.</li>
                                    </ul>
                                    </p><br>
                                <h5 class="text-lg font-semibold mb-4">Mission</h5>
                                <p class="text-slate-400 mb-2">
                                   <ul>
                                    <li>Expenditure is processing to spend and income that money is taken to fully obtain between allocation financial year.</li>
                    
                                    </ul> </p><br>
                                <h5 class="text-lg font-semibold mb-4">Activities of the Finance Department</h5>
                                <h6 class="text-lg font-semibold mb-4">Activities for Income</h6>
                                <p class="text-slate-400 mb-2">
                                    <ol>
                                   <li> On time depositing income connected by voucher.</li> 
                                   <li> Filling up daily income accounts.</li>
                                   <li> On time depositing income connected by voucher.</li>
                                    </ol>
                                </p>
                                <h6 class="text-lg font-semibold mb-4">Activities for Expenditure</h6>
                                <p class="text-slate-400 mb-2">
                                    <ol>
                                    <li>Filling up in the list of the respective department after giving salaries of the staff by billing.</li>
                                    <li>Filling up in the list of the respective department after giving travel allowance such as domestic travel expense, abroad travel expenses.</li>
                                    <li>Filling up in the list of the respective department after giving expenditures receipt for workers on daily wages, tax, transportation charges,
                                         Engine oil, diesel, petrol, Electrical meter changes, phone bill and exhibition.</li>
                                    <li>Filling up in the list of the respective department for maintenance expenses such as machine, building, road and others.</li>
                                    <li>Filling up in the list of the respective department for making tinder systems of capitals, making contracts and payment . 
                                        When the officials of the respective department check the accounts after the financial year, we have to check the accounts again and again to see less mistakes and report for the checked accounts.</li>
                                    </ol>
                                </p>

                                   
                            </div>
                        </div>
                        <div class="hidden" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                            <div class="relative md:py-24 py-16">
                                <div class="container relative">
                                    <div id="grid" class=" w-full grid grid-cols-2 mx-auto mt-4">
                                        <div class=" p-4 picture-item" data-groups='["development"]'>
                                            <div class="group relative block overflow-hidden rounded-md duration-500">
                                                <a href="portfolio-detail-one.html"><img src="../utils/assets/img/ucspyay/UCSPyay-logo.jpg" class="rounded-md" alt="" width="200" height="300"></a>
                                                <div class="content pt-3">
                                                    <h5 class="mb-1"><a href="portfolio-detail-one.html" class="hover:text-indigo-600 duration-500 font-semibold">Pen and article</a></h5>

                                                </div>
                                            </div>
                                        </div>

                                        <div class=" p-4 picture-item" data-groups='["photography"]'>
                                            <div class="group relative block overflow-hidden rounded-md duration-500">
                                                <a href="portfolio-detail-one.html"><img src="../utils/assets/img/ucspyay/UCSPyay-logo.jpg" class="rounded-md" alt="" width="200" height="300"></a>
                                                <div class="content pt-3">
                                                    <h5 class="mb-1"><a href="portfolio-detail-one.html" class="hover:text-indigo-600 duration-500 font-semibold">White mockup box</a></h5>

                                                </div>
                                            </div>
                                        </div>

                                        <div class=" p-4 picture-item" data-groups='["photography"]'>
                                            <div class="group relative block overflow-hidden rounded-md duration-500">
                                                <a href="portfolio-detail-one.html"><img src="../utils/assets/img/ucspyay/UCSPyay-logo.jpg" class="rounded-md" alt="" width="200" height="300"></a>
                                                <div class="content pt-3">
                                                    <h5 class="mb-1"><a href="portfolio-detail-one.html" class="hover:text-indigo-600 duration-500 font-semibold">White mockup box</a></h5>
                                                </div>
                                            </div>
                                        </div>

                                        <div class=" p-4 picture-item" data-groups='["photography"]'>
                                            <div class="group relative block overflow-hidden rounded-md duration-500">
                                                <a href="portfolio-detail-one.html"><img src="../utils/assets/img/ucspyay/UCSPyay-logo.jpg" class="rounded-md" alt="" width="200" height="300"></a>
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
                            <ul class='disc'>
                                <li>Digital Fundamental</li>
                                <li>Computer Organization </li>
                                <li>Data and Computer Communication Electronic I</li>
                                <li>Linear Control Systems </li>
                                <li>Engineering Circuit II  </li>
                                <li>Introduction to Microcontroller </li>
                                <li> Computer Architecture II</li>
                                <li>Control System I</li>
                                <li>Computer Networking II</li>
                                <li>Advanced Networking</li>
                                <li>Electrical Circuits I</li>
                                <li>Microprocessor Architecture and Interfacing</li>
                                <li>Introduction to Embedded Systems</li>
                            </ul>
                                
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