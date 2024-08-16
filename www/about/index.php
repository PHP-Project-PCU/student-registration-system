<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">

<?php
include("./../utils/components/links.php");
include("./../utils/components/navigation.php");
$heroImageFile = "../utils/assets/img/ucspyay/ucsp-front-build.jpg";
?>

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
                    About us
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
            <h1 class="text-2xl ...">About the University of Computer Studies (Pyay)</h1><br>
            <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                <div class="lg:col-span-4 md:col-span-5">
                    <div class="sticky top-20">
                        <ul class="flex-column text-center p-6 bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                            <li role="presentation">
                                <button class="px-4 py-2 text-base font-semibold rounded-md w-full hover:text-indigo-600 duration-500" id="vision-tab" data-tabs-target="#vision" type="button" role="tab" aria-controls="vision" aria-selected="true">Vision and Mission</button>
                            </li>
                            <li role="presentation">
                                <button class="px-4 py-2 text-base font-semibold rounded-md w-full mt-3 duration-500" id="degree-tab" data-tabs-target="#degree" type="button" role="tab" aria-controls="degree" aria-selected="false">Degree Offered</button>
                            </li>
                            <li role="presentation">
                                <button class="px-4 py-2 text-base font-semibold rounded-md w-full mt-3 duration-500" id="department-tab" data-tabs-target="#department" type="button" role="tab" aria-controls="department" aria-selected="false">Department</button>
                            </li>
                            <li role="presentation">
                                <button class="px-4 py-2 text-base font-semibold rounded-md w-full mt-3 duration-500" id="course-tab" data-tabs-target="#course" type="button" role="tab" aria-controls="course" aria-selected="false">Course</button>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="lg:col-span-8 md:col-span-7">
                    <div id="myTabContent" class="p-6 bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md">
                        <div class="" id="vision" role="tabpanel" aria-labelledby="vision-tab">
                            <img src="assets/images/cowork/7.jpg" class="shadow rounded-md" alt="">
                            <div class="mt-6">
                                <h5 class="text-lg font-semibold mb-4">Objectives</h5>
                                <p class="text-slate-400 mb-2">
                                    Computer University (Pyay) is government funded university located in Pyay, Bago Region with an emphasis is on computer engineering at the undergraduate and graduate levels.
                                    Founded in 2004 as a Government Computer College(GCC) and during the first year of GCC only computer application trainings were offered. Starting from 2005, undergraduate student admissions have begun.
                                    In 2007, Government Computer College(Pyay) became a university named Computer University (Pyay). </p>

                                <h5 class="text-lg font-semibold mb-4">Vision</h5>
                                <p class="text-slate-400 mb-2">
                                    Our vision is to provide human resources and enhance the development of the country.</p>

                                <h5 class="text-lg font-semibold mb-4">Mission</h5>
                                <p class="text-slate-400 mb-2">
                                    Our mission is to give the students a higher standard education. Give better education service.

                            </div>
                        </div>
                        <div class="hidden" id="degree" role="tabpanel" aria-labelledby="degree-tab">
                            <div class="relative md:py-24 py-16">
                                <div class="container relative">
                                    <p class="text-red-900">
                                        ➢ Bechelor of Computer Science (B.C.Sc)<br><br>

                                        ➢ Bechelor of Computer Technology (B.C.Tech)
                                    </p>

                                </div>

                            </div>
                        </div>

                        <div class="hidden " id="department" role="tabpanel" aria-labelledby="department-tab">
                            <img src="assets/images/cowork/9.jpg" class="shadow rounded-md" alt="">
                            <div class="mt-6">
                                <h5 class="text-lg font-semibold mb-4">Department</h5>
                                <ul>
                                    <li class="hover:text-indigo-600">
                                        <a href="<?php echo $homeURL ?>faculty-of-computer-system-and-technologies">➢ Faculty of Computer System and Technologies</a>
                                    </li>

                                    <li class="hover:text-indigo-600">
                                        <a href="<?php echo $homeURL ?>faculty-of-computer-science"> ➢ Faculty of Computer Science </a>
                                    </li>

                                    <li class="hover:text-indigo-600">
                                        <a href="'faculty-of-computing'">➢ Faculty of Computing</a>
                                    </li>

                                    <li class="hover:text-indigo-600">
                                        <a href="'faculty-of-information-science'"> ➢ Faculty of Information Science</a>
                                    </li>

                                    <li class="hover:text-indigo-600">
                                        <a href="'faculty-of-it-Supporting-and-maintenance'"> ➢ Faculty of IT Supporting and Maintenance</a>
                                    </li>

                                    <li class="hover:text-indigo-600">
                                        <a href="'myanmar'"> ➢ Myanmar</a>
                                    </li>

                                    <li class="hover:text-indigo-600">
                                        <a href="'english'"> ➢ English</a>
                                    </li>

                                    <li class="hover:text-indigo-600">
                                        <a href="physics"> ➢ Physics</a>
                                    </li>

                                    <li class="hover:text-indigo-600">
                                        <a href="'finance'">➢ Finance</a>
                                    </li>

                                    <li class="hover:text-indigo-600">
                                        <a href="'student-affiair'">➢ Student affiair</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="hidden " id="course" role="tabpanel" aria-labelledby="course-tab">
                            <img src="assets/images/cowork/9.jpg" class="shadow rounded-md" alt="">
                            <div class="mt-6">
                                <!-- <h5 class="text-lg font-semibold mb-4">Courses</h5> -->
                                <div class="grid grid-cols-1 mt-8">
                                    <ul class="md:w-fit w-full mx-auto flex-wrap justify-center text-center p-3 bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md" id="myTab" data-tabs-toggle="#StarterContent" role="tablist">
                                        <li role="presentation" class="md:inline-block block md:w-fit w-full">
                                            <button class="px-6 py-2 font-semibold rounded-md w-full hover:text-indigo-600 duration-500" id="tuesday-tab" data-tabs-target="#tuesday" type="button" role="tab" aria-controls="tuesday" aria-selected="true">Tuesday</button>
                                        </li>
                                        <li role="presentation" class="md:inline-block block md:w-fit w-full">
                                            <button class="px-6 py-2 font-semibold rounded-md w-full duration-500" id="wednesday-tab" data-tabs-target="#wednesday" type="button" role="tab" aria-controls="wednesday" aria-selected="false">Wednesday</button>
                                        </li>
                                        <li role="presentation" class="md:inline-block block md:w-fit w-full">
                                            <button class="px-6 py-2 font-semibold rounded-md w-full duration-500" id="thursday-tab" data-tabs-target="#thursday" type="button" role="tab" aria-controls="thursday" aria-selected="false">Thursday</button>
                                        </li>
                                        <li role="presentation" class="md:inline-block block md:w-fit w-full">
                                            <button class="px-6 py-2 font-semibold rounded-md w-full duration-500" id="friday-tab" data-tabs-target="#friday" type="button" role="tab" aria-controls="friday" aria-selected="false">Friday</button>
                                        </li>

                                        <li role="presentation" class="md:inline-block block md:w-fit w-full">
                                            <button class="px-6 py-2 font-semibold rounded-md w-full duration-500" id="monday-tab" data-tabs-target="#monday" type="button" role="tab" aria-controls="monday" aria-selected="false">Monday</button>
                                        </li>
                                    </ul>

                                    <div id="StarterContent" class="mt-1">
                                        <div class="" id="tuesday" role="tabpanel" aria-labelledby="tuesday-tab">
                                            <div class="grid grid-cols-1">
                                                <div class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900">
                                                    <table class="w-full text-start">
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">09:00AM - 10:00AM</td>
                                                                <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                                                    <div class="flex items-center">
                                                                        <img src="assets/images/event/eve-sch/1.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                                        <div class="ms-4">
                                                                            <a href="#" class="hover:text-indigo-600 text-lg font-semibold">Digital Conference Event Intro</a>
                                                                            <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                                                    <span class="block">Speaker</span>
                                                                    <span class="block text-black dark:text-white text-md mt-1">Raymond Turner</span>
                                                                </td>
                                                                <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                                    <a href="#" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">10:30AM - 11:30AM</td>
                                                                <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                                                    <div class="flex items-center">
                                                                        <img src="assets/images/event/eve-sch/2.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                                        <div class="ms-4">
                                                                            <a href="#" class="hover:text-indigo-600 text-lg font-semibold">Conference On User Interface</a>
                                                                            <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                                                    <span class="block">Speaker</span>
                                                                    <span class="block text-black dark:text-white text-md mt-1">Cindy Morrison</span>
                                                                </td>
                                                                <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                                    <a href="#" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">12:00PM - 01:00PM</td>
                                                                <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                                                    <div class="flex items-center">
                                                                        <img src="assets/images/event/eve-sch/3.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                                        <div class="ms-4">
                                                                            <a href="#" class="hover:text-indigo-600 text-lg font-semibold">Business World Event Intro</a>
                                                                            <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                                                    <span class="block">Speaker</span>
                                                                    <span class="block text-black dark:text-white text-md mt-1">Vincent Adams</span>
                                                                </td>
                                                                <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                                    <a href="#" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">02:00PM - 03:00PM</td>
                                                                <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                                                    <div class="flex items-center">
                                                                        <img src="assets/images/event/eve-sch/4.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                                        <div class="ms-4">
                                                                            <a href="#" class="hover:text-indigo-600 text-lg font-semibold">Business Conference for professional</a>
                                                                            <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                                                    <span class="block">Speaker</span>
                                                                    <span class="block text-black dark:text-white text-md mt-1">Ana Heweit</span>
                                                                </td>
                                                                <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                                    <a href="#" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="hidden" id="wednesday" role="tabpanel" aria-labelledby="wednesday-tab">
                                            <div class="grid grid-cols-1">
                                                <div class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900">
                                                    <table class="w-full text-start">
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">09:00AM - 10:00AM</td>
                                                                <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                                                    <div class="flex items-center">
                                                                        <img src="assets/images/event/eve-sch/5.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                                        <div class="ms-4">
                                                                            <a href="#" class="hover:text-indigo-600 text-lg font-semibold">Digital Conference Event Intro</a>
                                                                            <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                                                    <span class="block">Speaker</span>
                                                                    <span class="block text-black dark:text-white text-md mt-1">Raymond Turner</span>
                                                                </td>
                                                                <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                                    <a href="#" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">10:30AM - 11:30AM</td>
                                                                <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                                                    <div class="flex items-center">
                                                                        <img src="assets/images/event/eve-sch/6.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                                        <div class="ms-4">
                                                                            <a href="#" class="hover:text-indigo-600 text-lg font-semibold">Conference On User Interface</a>
                                                                            <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                                                    <span class="block">Speaker</span>
                                                                    <span class="block text-black dark:text-white text-md mt-1">Cindy Morrison</span>
                                                                </td>
                                                                <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                                    <a href="#" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">12:00PM - 01:00PM</td>
                                                                <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                                                    <div class="flex items-center">
                                                                        <img src="assets/images/event/eve-sch/7.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                                        <div class="ms-4">
                                                                            <a href="#" class="hover:text-indigo-600 text-lg font-semibold">Business World Event Intro</a>
                                                                            <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                                                    <span class="block">Speaker</span>
                                                                    <span class="block text-black dark:text-white text-md mt-1">Vincent Adams</span>
                                                                </td>
                                                                <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                                    <a href="#" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">02:00PM - 03:00PM</td>
                                                                <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                                                    <div class="flex items-center">
                                                                        <img src="assets/images/event/eve-sch/8.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                                        <div class="ms-4">
                                                                            <a href="#" class="hover:text-indigo-600 text-lg font-semibold">Business Conference for professional</a>
                                                                            <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                                                    <span class="block">Speaker</span>
                                                                    <span class="block text-black dark:text-white text-md mt-1">Ana Heweit</span>
                                                                </td>
                                                                <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                                    <a href="#" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="hidden" id="thursday" role="tabpanel" aria-labelledby="thursday-tab">
                                            <div class="grid grid-cols-1">
                                                <div class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900">
                                                    <table class="w-full text-start">
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">09:00AM - 10:00AM</td>
                                                                <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                                                    <div class="flex items-center">
                                                                        <img src="assets/images/event/eve-sch/9.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                                        <div class="ms-4">
                                                                            <a href="#" class="hover:text-indigo-600 text-lg font-semibold">Digital Conference Event Intro</a>
                                                                            <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                                                    <span class="block">Speaker</span>
                                                                    <span class="block text-black dark:text-white text-md mt-1">Raymond Turner</span>
                                                                </td>
                                                                <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                                    <a href="#" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">10:30AM - 11:30AM</td>
                                                                <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                                                    <div class="flex items-center">
                                                                        <img src="assets/images/event/eve-sch/10.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                                        <div class="ms-4">
                                                                            <a href="#" class="hover:text-indigo-600 text-lg font-semibold">Conference On User Interface</a>
                                                                            <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                                                    <span class="block">Speaker</span>
                                                                    <span class="block text-black dark:text-white text-md mt-1">Cindy Morrison</span>
                                                                </td>
                                                                <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                                    <a href="#" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">12:00PM - 01:00PM</td>
                                                                <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                                                    <div class="flex items-center">
                                                                        <img src="assets/images/event/eve-sch/11.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                                        <div class="ms-4">
                                                                            <a href="#" class="hover:text-indigo-600 text-lg font-semibold">Business World Event Intro</a>
                                                                            <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                                                    <span class="block">Speaker</span>
                                                                    <span class="block text-black dark:text-white text-md mt-1">Vincent Adams</span>
                                                                </td>
                                                                <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                                    <a href="#" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">02:00PM - 03:00PM</td>
                                                                <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                                                    <div class="flex items-center">
                                                                        <img src="assets/images/event/eve-sch/12.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                                        <div class="ms-4">
                                                                            <a href="#" class="hover:text-indigo-600 text-lg font-semibold">Business Conference for professional</a>
                                                                            <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                                                    <span class="block">Speaker</span>
                                                                    <span class="block text-black dark:text-white text-md mt-1">Ana Heweit</span>
                                                                </td>
                                                                <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                                    <a href="#" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="hidden" id="friday" role="tabpanel" aria-labelledby="friday-tab">
                                            <div class="grid grid-cols-1">
                                                <div class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900">
                                                    <table class="w-full text-start">
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">09:00AM - 10:00AM</td>
                                                                <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                                                    <div class="flex items-center">
                                                                        <img src="assets/images/event/eve-sch/5.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                                        <div class="ms-4">
                                                                            <a href="#" class="hover:text-indigo-600 text-lg font-semibold">Digital Conference Event Intro</a>
                                                                            <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                                                    <span class="block">Speaker</span>
                                                                    <span class="block text-black dark:text-white text-md mt-1">Raymond Turner</span>
                                                                </td>
                                                                <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                                    <a href="#" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">10:30AM - 11:30AM</td>
                                                                <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                                                    <div class="flex items-center">
                                                                        <img src="assets/images/event/eve-sch/6.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                                        <div class="ms-4">
                                                                            <a href="#" class="hover:text-indigo-600 text-lg font-semibold">Conference On User Interface</a>
                                                                            <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                                                    <span class="block">Speaker</span>
                                                                    <span class="block text-black dark:text-white text-md mt-1">Cindy Morrison</span>
                                                                </td>
                                                                <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                                    <a href="#" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">12:00PM - 01:00PM</td>
                                                                <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                                                    <div class="flex items-center">
                                                                        <img src="assets/images/event/eve-sch/7.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                                        <div class="ms-4">
                                                                            <a href="#" class="hover:text-indigo-600 text-lg font-semibold">Business World Event Intro</a>
                                                                            <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                                                    <span class="block">Speaker</span>
                                                                    <span class="block text-black dark:text-white text-md mt-1">Vincent Adams</span>
                                                                </td>
                                                                <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                                    <a href="#" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">02:00PM - 03:00PM</td>
                                                                <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                                                    <div class="flex items-center">
                                                                        <img src="assets/images/event/eve-sch/8.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                                        <div class="ms-4">
                                                                            <a href="#" class="hover:text-indigo-600 text-lg font-semibold">Business Conference for professional</a>
                                                                            <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                                                    <span class="block">Speaker</span>
                                                                    <span class="block text-black dark:text-white text-md mt-1">Ana Heweit</span>
                                                                </td>
                                                                <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                                    <a href="#" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="hidden" id="monday" role="tabpanel" aria-labelledby="monday-tab">
                                            <div class="grid grid-cols-1">
                                                <div class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900">
                                                    <table class="w-full text-start">
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">09:00AM - 10:00AM</td>
                                                                <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                                                    <div class="flex items-center">
                                                                        <img src="assets/images/event/eve-sch/5.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                                        <div class="ms-4">
                                                                            <a href="#" class="hover:text-indigo-600 text-lg font-semibold">Digital Conference Event Intro</a>
                                                                            <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                                                    <span class="block">Speaker</span>
                                                                    <span class="block text-black dark:text-white text-md mt-1">Raymond Turner</span>
                                                                </td>
                                                                <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                                    <a href="#" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">10:30AM - 11:30AM</td>
                                                                <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                                                    <div class="flex items-center">
                                                                        <img src="assets/images/event/eve-sch/6.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                                        <div class="ms-4">
                                                                            <a href="#" class="hover:text-indigo-600 text-lg font-semibold">Conference On User Interface</a>
                                                                            <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                                                    <span class="block">Speaker</span>
                                                                    <span class="block text-black dark:text-white text-md mt-1">Cindy Morrison</span>
                                                                </td>
                                                                <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                                    <a href="#" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">12:00PM - 01:00PM</td>
                                                                <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                                                    <div class="flex items-center">
                                                                        <img src="assets/images/event/eve-sch/7.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                                        <div class="ms-4">
                                                                            <a href="#" class="hover:text-indigo-600 text-lg font-semibold">Business World Event Intro</a>
                                                                            <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                                                    <span class="block">Speaker</span>
                                                                    <span class="block text-black dark:text-white text-md mt-1">Vincent Adams</span>
                                                                </td>
                                                                <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                                    <a href="#" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[200px] text-slate-400">02:00PM - 03:00PM</td>
                                                                <td class="p-3 border-b border-gray-100 dark:border-gray-700 min-w-[540px] py-12 px-5">
                                                                    <div class="flex items-center">
                                                                        <img src="assets/images/event/eve-sch/8.jpg" class="rounded-full size-24 shadow-md dark:shadow-gray-700" alt="">

                                                                        <div class="ms-4">
                                                                            <a href="#" class="hover:text-indigo-600 text-lg font-semibold">Business Conference for professional</a>
                                                                            <p class="text-slate-400 mt-2">The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px] text-slate-400">
                                                                    <span class="block">Speaker</span>
                                                                    <span class="block text-black dark:text-white text-md mt-1">Ana Heweit</span>
                                                                </td>
                                                                <td class="text-end border-b border-gray-100 dark:border-gray-700 py-12 px-5 min-w-[180px]">
                                                                    <a href="#" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-medium hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Buy Ticket <i class="uil uil-arrow-right"></i></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end grid-->
                        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->

    <!-- Switcher -->
    <div class="fixed top-[30%] -right-2 z-50">
        <span class="relative inline-block rotate-90">
            <input type="checkbox" class="checkbox opacity-0 absolute" id="chk" />
            <label class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-800 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8" for="chk">
                <i class="uil uil-moon text-[20px] text-yellow-500"></i>
                <i class="uil uil-sun text-[20px] text-yellow-500"></i>
                <span class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] left-[2px] size-7"></span>
            </label>
        </span>
    </div>
    <!-- Switcher -->

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

<?php
include("./../utils/components/footer.php");

?>