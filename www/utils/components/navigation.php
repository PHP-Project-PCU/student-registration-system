<?php
include "C:/xampp/htdocs/student-registration-system/www/utils/assets/constants/StudentAdmissionConstants.php";

$ucspLogoDark = StudentAdmissionConstants::$BASE_URL . "/utils/assets/img/ucspyay/ucsp-logo-dark.png";
$ucspLogoLight = StudentAdmissionConstants::$BASE_URL . "/utils/assets/img/ucspyay/ucsp-logo-light.jpg";
$currentPath = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$baseURL = StudentAdmissionConstants::$BASE_URL . '/';
$homeURL = (trim($currentPath, '/') === 'www' ? '' : str_replace(trim($currentPath, '/'), '', $baseURL)); // http://ucspyay.edu
$currentUri = trim($currentPath, '/'); // about
echo $currentPath;
function isActive($uri)
{
    global $currentUri;
    $uri = trim($uri, '/');
    // echo $uri;
    if ($currentUri === $uri) {
        return 'active';
    } else {
        return '';
    }
}
?>

<!-- Start Navbar -->
<nav id="topnav" class="defaultscroll is-sticky nav-sticky">
    <div class="container relative flex justify-between">
        <!-- Logo container-->
        <a class="logo flex items-center gap-2 justify-center " href="<?php echo $homeURL ?>">
            <div class="">
                <img src="<?php echo $ucspLogoDark ?>" width="60" class="inline-block dark:hidden" alt="">
                <img src="<?php echo $ucspLogoLight ?>" width="60" class="hidden dark:inline-block rounded-lg" alt="">
            </div>
            <div class="">
                <p class="text-sm font-bold">UCSPyay</p>
                <p class="text-xs">ကွန်ပျူတာတက္ကသိုလ်(ပြည်)</p>
            </div>

        </a>

        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <!--Login button Start-->
        <!-- <ul class="buy-button list-none mb-0  ">
                    <li class="inline mb-0">
                        <a href="#" class="size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-indigo-600/5 hover:bg-indigo-600 border border-indigo-600/10 hover:border-indigo-600 text-indigo-600 hover:text-white"><i data-feather="settings" class="size-4"></i></a>
                    </li>
                </ul> -->
        <!--Login button End-->

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li class="<?php echo isActive(''); ?>"><a href="<?php echo $homeURL ?>" class="sub-menu-item">Home</a>
                </li>

                <li class="has-submenu parent-parent-menu-item">
                    <a href="javascript:void(0)">Academic</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Academic Programs
                            </a><span class="submenu-arrow "></span>
                            <ul class="submenu">
                                <li class="<?php echo isActive('b-c-sc'); ?>"><a href="<?php echo $homeURL ?>b-c-sc"
                                        class="sub-menu-item">B.C.Sc</a></li>
                                <li class="<?php echo isActive('b-c-tech'); ?>"><a href="<?php echo $homeURL ?>b-c-tech"
                                        class="sub-menu-item">B.C.Tech</a></li>
                            </ul>
                        </li>
                        <li class="<?php echo isActive('academic-calender'); ?>"><a href="academic-calender"
                                class="sub-menu-item">Academic Calender</a></li>
                        <li><a href="https://lms.ucspyay.edu.mm" target="_blank" class="sub-menu-item">LMS Moodle</a>
                        </li>
                    </ul>
                </li>

                <li class="has-submenu parent-parent-menu-item">
                    <a href="javascript:void(0)">Admissions</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li class="<?php echo isActive('freshers'); ?>"><a href="<?php echo $homeURL ?>admissions/freshers"
                                class="sub-menu-item">Freshers</a></li>
                        <li class="<?php echo isActive('credit-transfer'); ?>"><a href="<?php echo $homeURL ?>admissions/credit-transfer"
                                class="sub-menu-item">Credit Transfer</a></li>

                    </ul>
                </li>

                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)">Faculties</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li class="<?php echo isActive('faculty-of-computer-system-and-technologies'); ?>"><a
                                href="<?php echo $homeURL ?>faculty-of-computer-system-and-technologies"
                                class="sub-menu-item"> Faculty of Computer System and
                                Technologies </a></li>
                        <li class="<?php echo isActive('cs'); ?>"><a href="<?php echo $homeURL ?>cs"
                                class="sub-menu-item">Faculty of Computer Science</a>
                        </li>
                        <li class="<?php echo isActive('faculty-of-computing'); ?>"><a
                                href="<?php echo $homeURL ?>faculty-of-computing" class="sub-menu-item">Faculty of
                                Computing</a></li>
                        <li class="<?php echo isActive('faculty-of-information-science'); ?>"><a
                                href="<?php echo $homeURL ?>faculty-of-information-science"
                                class="sub-menu-item">Faculty of Information Science</a></li>
                        <li class="<?php echo isActive('faculty-of-it-Supporting-and-maintenance'); ?>"><a
                                href="<?php echo $homeURL ?>faculty-of-it-Supporting-and-maintenance"
                                class="sub-menu-item">Faculty of IT Supporting and Maintenance</a></li>
                        <li class="<?php echo isActive($homeURL . 'myanmar'); ?>"><a
                                href="<?php echo $homeURL ?>myanmar" class="sub-menu-item">Myanmar</a></li>
                        <li class="<?php echo isActive('english'); ?>"><a href="<?php echo $homeURL ?>english"
                                class="sub-menu-item">English</a></li>
                        <li class="<?php echo isActive('physics'); ?>"><a href="<?php echo $homeURL ?>physics"
                                class="sub-menu-item">Physics</a></li>
                        <li class="<?php echo isActive('adminstration'); ?>"><a
                                href="<?php echo $homeURL ?>adminstration" class="sub-menu-item">Adminstration</a></li>
                        <li class="<?php echo isActive('finance'); ?>"><a href="<?php echo $homeURL ?>finance"
                                class="sub-menu-item">Finance</a></li>
                        <li class="<?php echo isActive('student-affiair'); ?>"><a
                                href="<?php echo $homeURL ?>student-affiair" class="sub-menu-item">Student affiair</a>
                        </li>
                    </ul>
                </li>

                <li class="<?php echo isActive('news'); ?> "><a href="<?php echo $homeURL ?>news"
                        class="sub-menu-item">News</a></li>

                <li><a href="https://ucspyay.librarika.com" target="_blank" class="sub-menu-item">Library</a></li>

                <li class="<?php echo isActive('about'); ?> "><a href="<?php echo $homeURL ?>about"
                        class=" sub-menu-item">About us</a></li>
            </ul>
            <!--end navigation menu-->
        </div>
        <!--end navigation-->
    </div>
    <!--end container-->
</nav>
<!--end header-->
<!-- End Navbar -->