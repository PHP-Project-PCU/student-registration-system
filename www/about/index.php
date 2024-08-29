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

                <!-- Vison & Mission -->
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
                                    <ul>
                                        <li class="hover:text-indigo-600">
                                            <a href="<?php echo $homeURL ?>faculty-of-computer-system-and-technologies"> ➢ Bechelor of Computer Science (B.C.Sc)</a> <br><br>
                                        </li>
                                        <li class="hover:text-indigo-600">
                                            <a href="<?php echo $homeURL ?>faculty-of-computer-system-and-technologies"> ➢ Bechelor of Computer Technology (B.C.Tech)</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                        <!-- Department -->
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
                                        <a href="<?php echo $homeURL ?>faculty-of-computing">➢ Faculty of Computing</a>
                                    </li>

                                    <li class="hover:text-indigo-600">
                                        <a href="<?php echo $homeURL ?>faculty-of-information-science"> ➢ Faculty of Information Science</a>
                                    </li>

                                    <li class="hover:text-indigo-600">
                                        <a href="<?php echo $homeURL ?>faculty-of-it-Supporting-and-maintenance"> ➢ Faculty of IT Supporting and Maintenance</a>
                                    </li>

                                    <li class="hover:text-indigo-600">
                                        <a href="<?php echo $homeURL ?>myanmar"> ➢ Myanmar</a>
                                    </li>

                                    <li class="hover:text-indigo-600">
                                        <a href="<?php echo $homeURL ?>english"> ➢ English</a>
                                    </li>

                                    <li class="hover:text-indigo-600">
                                        <a href="<?php echo $homeURL ?>physics"> ➢ Physics</a>
                                    </li>

                                    <li class="hover:text-indigo-600">
                                        <a href="<?php echo $homeURL ?>finance">➢ Finance</a>
                                    </li>

                                    <li class="hover:text-indigo-600">
                                        <a href="<?php echo $homeURL ?>student-affiair">➢ Student Affiair</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Course -->
                        <div class="hidden " id="course" role="tabpanel" aria-labelledby="course-tab">
                            <img src="assets/images/cowork/9.jpg" class="shadow rounded-md" alt="">
                            <div class="mt-6">
                                <div class="grid grid-cols-1 mt-8">
                                    <ul class="md:w-fit w-full mx-auto flex-wrap justify-center text-center p-3 bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md" id="myTab" data-tabs-toggle="#StarterContent" role="tablist">
                                        <li role="presentation" class="md:inline-block block md:w-fit w-full">
                                            <button class="px-6 py-2 font-semibold rounded-md w-full hover:text-indigo-600 duration-500" id="first-tab" data-tabs-target="#first" type="button" role="tab" aria-controls="first" aria-selected="true">First Year</button>
                                        </li>
                                        <li role="presentation" class="md:inline-block block md:w-fit w-full">
                                            <button class="px-6 py-2 font-semibold rounded-md w-full duration-500" id="second-tab" data-tabs-target="#second" type="button" role="tab" aria-controls="second" aria-selected="false">Second Year</button>
                                        </li>
                                        <li role="presentation" class="md:inline-block block md:w-fit w-full">
                                            <button class="px-6 py-2 font-semibold rounded-md w-full duration-500" id="third-tab" data-tabs-target="#third" type="button" role="tab" aria-controls="third" aria-selected="false">Third Year</button>
                                        </li>
                                        <li role="presentation" class="md:inline-block block md:w-fit w-full">
                                            <button class="px-6 py-2 font-semibold rounded-md w-full duration-500" id="fourth-tab" data-tabs-target="#fourth" type="button" role="tab" aria-controls="fourth" aria-selected="false">Fourth Year</button>
                                        </li>

                                        <li role="presentation" class="md:inline-block block md:w-fit w-full">
                                            <button class="px-6 py-2 font-semibold rounded-md w-full duration-500" id="fifth-tab" data-tabs-target="#fifth" type="button" role="tab" aria-controls="fifth" aria-selected="false">Fifth Year</button>
                                        </li>
                                    </ul>

                                    <!-- First Year -->
                                    <div id="StarterContent" class="mt-1">
                                        <div class="" id="first" role="tabpanel" aria-labelledby="first-tab">
                                            <div class="grid grid-cols-1">
                                                <br>
                                                <table class="table-auto">
                                                    <thead>
                                                        <tr>
                                                            <td></td>
                                                            <td class="text-center font-weight-bold">B.C.Sc./ B.C.Tech.</td>
                                                            <td class="text-center font-weight-bold">B.C.Sc./ B.C.Tech.</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center font-weight-bold">#</td>
                                                            <td class="text-center font-weight-bold">First Semester</td>
                                                            <td class="text-center font-weight-bold">Second Semester</td>
                                                        </tr>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Myanmar</td>
                                                            <td>Supporting Skil</td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>English</td>
                                                            <td>Myanmar </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Physics</td>
                                                            <td>English</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Calculus I</td>
                                                            <td>Physics</td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Principle of IT</td>
                                                            <td>Discrete Mathematics</td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>Supporting Skill</td>
                                                            <td>Object Oriented Programming</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <!-- Second Year -->
                                        <div id="StarterContent" class="mt-1">
                                            <div class="" id="second" role="tabpanel" aria-labelledby="second-tab">
                                                <div class="grid grid-cols-1">
                                                    <br>
                                                    <table class="table-auto">
                                                        <thead>
                                                            <tr>
                                                                <td></td>
                                                                <td class="text-center font-weight-bold">B.C.Sc.</td>
                                                                <td class="text-center font-weight-bold">B.C.Tech.</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center font-weight-bold">#</td>
                                                                <td class="text-center font-weight-bold">First Semester</td>
                                                                <td class="text-center font-weight-bold">Frist Semester</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>English</td>
                                                                <td>English</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Calculus II</td>
                                                                <td>Calculus II </td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Java Programming</td>
                                                                <td>Java Programming</td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>Digital Fundamental</td>
                                                                <td>Digital Fundamental</td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <td>Database Management System</td>
                                                                <td>Database Management System</td>
                                                            </tr>
                                                            <tr>
                                                                <td>6</td>
                                                                <td>Web platform-based Development</td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                        <thead>
                                                            <tr>
                                                                <td class="text-center font-weight-bold">#</td>
                                                                <td class="text-center font-weight-bold">Second Semester</td>
                                                                <td class="text-center font-weight-bold">Second Semester</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>English</td>
                                                                <td>English</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Data Structure and Algorithm</td>
                                                                <td>Data Structure and Algorithm</td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Linear Algebra</td>
                                                                <td>Linear Algebra</td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>Software Engineering</td>
                                                                <td>Software Engineering</td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <td>JAVASCRIPTS</td>
                                                                <td> </td>
                                                            </tr>
                                                            <tr>
                                                                <td>6</td>
                                                                <td>Supporting Skil (J2EE) </td>
                                                                <td> </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <!-- Third Year -->
                                            <div id="StarterContent" class="mt-1">
                                                <div class="" id="third" role="tabpanel" aria-labelledby="third-tab">
                                                    <div class="grid grid-cols-1">
                                                        <br>
                                                        <table class="table-auto">
                                                            <thead>
                                                                <tr>
                                                                    <td></td>
                                                                    <td class="text-center font-weight-bold">B.C.Sc./ B.C.Tech.</td>
                                                                    <td class="text-center font-weight-bold">B.C.Sc./ B.C.Tech.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-center font-weight-bold">#</td>
                                                                    <td class="text-center font-weight-bold">First Semester</td>
                                                                    <td class="text-center font-weight-bold">Frist Semester</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>English</td>
                                                                    <td>English</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Computer Organization</td>
                                                                    <td>Computer Organization </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Mathematics of Computing III</td>
                                                                    <td>Mathematics of Computing III</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Data and Computer Communications</td>
                                                                    <td>Data and Computer Communications</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Software Engineering</td>
                                                                    <td>Electronics I</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Computer Application Techniques III </td>
                                                                    <td>Linear Control Systems</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Advanced Programming Language</td>
                                                                    <td>Engineering Circuits II</td>
                                                                </tr>
                                                            </tbody>
                                                            <thead>
                                                                <tr>
                                                                    <td class="text-center font-weight-bold">#</td>
                                                                    <td class="text-center font-weight-bold">Second Semester</td>
                                                                    <td class="text-center font-weight-bold">Second Semester</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>English</td>
                                                                    <td>English</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Operating System</td>
                                                                    <td>Operating System</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Mathematics of Computing (III)</td>
                                                                    <td>Mathematics of Computing (III)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Computer Networking </td>
                                                                    <td>Computer Networking </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Database Management System </td>
                                                                    <td>Electronics</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Computer Application Technique (III)</td>
                                                                    <td>Computer Architecture </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Ethics</td>
                                                                    <td>Microprocessor Architecture and Interfacing </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <!-- Fourth Year -->
                                                <div id="StarterContent" class="mt-1">
                                                    <div class="" id="fourth" role="tabpanel" aria-labelledby="fourth-tab">
                                                        <div class="grid grid-cols-1">
                                                            <br>
                                                            <table class="table-auto">
                                                                <thead>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td class="text-center font-weight-bold">B.C.Sc.</td>
                                                                        <td class="text-center font-weight-bold">B.C.Tech.</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center font-weight-bold">#</td>
                                                                        <td class="text-center font-weight-bold">First Semester</td>
                                                                        <td class="text-center font-weight-bold">Frist Semester</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>English</td>
                                                                        <td>English</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Operations Research </td>
                                                                        <td>Computer Architecture II </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Mathematics of Computing IV </td>
                                                                        <td>Mathematics of Computing IV </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>4</td>
                                                                        <td>Design and Analysis Algorithm </td>
                                                                        <td>Introduction to Microcontroller</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>5</td>
                                                                        <td>Database Management System </td>
                                                                        <td>Control System II </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>6</td>
                                                                        <td>Software Engineering </td>
                                                                        <td>Computer Networking II</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>7</td>
                                                                        <td>Artificial intelligence </td>
                                                                        <td>Artificial intelligence </td>
                                                                    </tr>
                                                                </tbody>
                                                                <thead>
                                                                    <tr>
                                                                        <td class="text-center font-weight-bold">#</td>
                                                                        <td class="text-center font-weight-bold">Second Semester</td>
                                                                        <td class="text-center font-weight-bold">Second Semester</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>English</td>
                                                                        <td>English</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Digital Business and E-commerce Management </td>
                                                                        <td>Database Management System </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Mathematics of Computing IV </td>
                                                                        <td>Mathematics of Computing IV </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>4</td>
                                                                        <td>Operating System </td>
                                                                        <td>Introduction to Embedded Systems </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>5</td>
                                                                        <td>Management Information System + Information Security and IT Risk Management</td>
                                                                        <td>Computer Architecture (II) </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>6</td>
                                                                        <td>Unified Modelling Language</td>
                                                                        <td>Cryptography</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>7</td>
                                                                        <td>Computer Graphics</td>
                                                                        <td>Computer Security </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <!-- Fifth Year -->
                                                    <div id="StarterContent" class="mt-1">
                                                        <div class="" id="fifth" role="tabpanel" aria-labelledby="fifth-tab">
                                                            <div class="grid grid-cols-1">
                                                                <br>
                                                                <table class="table-auto">
                                                                    <thead>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td class="text-center font-weight-bold">B.C.Sc.</td>
                                                                            <td class="text-center font-weight-bold">B.C.Tech.</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-center font-weight-bold">#</td>
                                                                            <td class="text-center font-weight-bold">First Semester</td>
                                                                            <td class="text-center font-weight-bold">Frist Semester</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td>English</td>
                                                                            <td>English</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>2</td>
                                                                            <td>Mathematics of Computing V </td>
                                                                            <td>Mathematics of Computing V </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>3</td>
                                                                            <td>Distributed Computing System + Advanced Networking </td>
                                                                            <td>Distributed Computing System + Advanced Networking </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>4</td>
                                                                            <td>Information Security and IT Risk Management </td>
                                                                            <td>Fuzzy Logic Control System</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>5</td>
                                                                            <td>Elective-Computing Applied Algorithms </td>
                                                                            <td>Embedded System </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>6</td>
                                                                            <td>Elective-Artificial Intelligence+Natural Language Processing </td>
                                                                            <td>Image Processing and Computer Vision </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>7</td>
                                                                            <td>Elective-Data Mining </td>
                                                                            <td> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>8</td>
                                                                            <td>Elective-Enterprise Resource Planning </td>
                                                                            <td> </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <
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