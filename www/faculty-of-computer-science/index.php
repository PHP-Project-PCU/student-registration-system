<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">

<?php
include("./../utils/components/links.php");
include("./../utils/components/navigation.php");
$heroImageFile = "./../utils/assets/img/ucspyay/uc-build-1.jpg";

?>


<body class="font-nunito text-base text-black dark:text-white dark:bg-slate-900 scroll-smooth">


    <section class="relative overflow-hidden py-16">
    


        
        <div class="container relative md:mt-24 mt-16">
            <h1 class="text-2xl ...">Faulty Of Computer Science</h1>
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
                                    Provide quality undergraduate education in both the theoretical and applied foundations of computer science and train students to effectively apply this education to solve real-world problems thus amplifying their potential for lifelong high-quality careers and give them a competitive advantage in the ever-changing challenging global world environment.</p>
                                <h5 class="text-lg font-semibold mb-4">Mission</h5>
                                <p class="text-slate-400 mb-2">
                                    To create, share and apply knowledge in Computer Science, including in interdisciplinary areas that extends the scope of Computer Science and benefit humanity; to educate students to be successful, ethical, and effective problem-solvers and life-long learners who will contribute positively to the economic well-being of our region and nation.</p>
                                <h5 class="text-lg font-semibold mb-4">Objectives</h5>
                                <p class="text-slate-400 mb-2">
                                    The goals are to prepare students for graduate training in some specialized area of Computer Science, to prepare students for jobs in the real-world and to provide support courses such as Programming, Operating System (Linux OS), Artificial Intelligence and so on.</p>

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




                                    </div>
                                </div><!--end container-->
                            </div>

                        </div>




                    </div>



                    <div class="hidden " id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        <img src="assets/images/cowork/9.jpg" class="shadow rounded-md" alt="">
                        <div class="mt-6">
                            <h5 class="text-lg font-semibold mb-4">Course</h5>
                            <p class="text-red-900">➢ Principle of IT<br>
                                ➢ Java Programming<br>
                                ➢ Advanced Programming Language<br>
                                ➢ Analysis of Algorithm<br>
                                ➢ Artificial Intelligence + Prolog<br>
                                ➢ Distributed computing Systems<br>
                                ➢ Advanced Artificial Intelligence<br>
                                ➢ Computer Programming Technique<br>
                                ➢ Advanced Data Structure<br>
                                ➢ Advanced Java Programming</p>

                        </div>
                    </div>


                </div>
            </div>
        </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->


    <!-- Footer Start -->
    <footer class="footer bg-dark-footer mt-20 relative text-gray-200 dark:text-gray-200">
        <div class="container relative">
            <div class="grid grid-cols-12">
                <div class="col-span-12">
                    <div class="py-[60px] px-0">
                        <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                            <div class="lg:col-span-4 md:col-span-12">
                                <a href="#" class="text-[22px] focus:outline-none">
                                    <img src="../utils/assets/images/ucspyay/UCSPyay-logo.jpg" width="100" class="hidden sm:block rounded-lg" alt="UCSPyay">
                                    <img src="../utils/assets/images/ucspyay/UCSPyay-logo.jpg" width="50" class="sm:hidden rounded-lg" alt="UCSPyay">
                                </a>
                                <p class="mt-6 text-gray-300">Start working with Tailwind CSS that can provide everything you need to generate awareness, drive traffic, connect.</p>
                                <ul class="list-none mt-6">
                                    <li class="inline"><a href="http://linkedin.com/company/" target="_blank" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center border border-gray-800 rounded-md hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600"><i class="uil uil-linkedin" title="Linkedin"></i></a></li>
                                    <li class="inline"><a href="https://www.facebook.com/" target="_blank" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center border border-gray-800 rounded-md hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600"><i class="uil uil-facebook-f align-middle" title="facebook"></i></a></li>
                                    <li class="inline"><a href="https://twitter.com/" target="_blank" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center border border-gray-800 rounded-md hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600"><i class="uil uil-twitter align-middle" title="twitter"></i></a></li>
                                    <li class="inline"><a href="mailto:admin@ucspyay.edu.mm" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center border border-gray-800 rounded-md hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600"><i class="uil uil-envelope align-middle" title="email"></i></a></li>
                                </ul><!--end icon-->
                            </div><!--end col-->

                            <div class="lg:col-span-2 md:col-span-4">
                                <h5 class="tracking-[1px] text-gray-100 font-semibold">Academic</h5>
                                <ul class="list-none footer-list mt-6">
                                    <li><a href="page-aboutus.html" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b"></i> About us</a></li>
                                    <li class="mt-[10px]"><a href="page-services.html" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b"></i> Services</a></li>
                                    <li class="mt-[10px]"><a href="page-team.html" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b"></i> Team</a></li>
                                    <li class="mt-[10px]"><a href="page-pricing.html" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b"></i> Pricing</a></li>
                                    <li class="mt-[10px]"><a href="portfolio-creative-four.html" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b"></i> Project</a></li>
                                    <li class="mt-[10px]"><a href="blog.html" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b"></i> Blog</a></li>
                                    <li class="mt-[10px]"><a href="auth-login.html" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b"></i> Login</a></li>
                                </ul>
                            </div><!--end col-->

                            <div class="lg:col-span-3 md:col-span-4">
                                <h5 class="tracking-[1px] text-gray-100 font-semibold">Usefull Links</h5>
                                <ul class="list-none footer-list mt-6">
                                    <li><a href="page-terms.html" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b"></i> Terms of Services</a></li>
                                    <li class="mt-[10px]"><a href="page-privacy.html" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b"></i> Privacy Policy</a></li>
                                    <li class="mt-[10px]"><a href="documentation.html" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b"></i> Documentation</a></li>
                                    <li class="mt-[10px]"><a href="changelog.html" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b"></i> Changelog</a></li>
                                    <li class="mt-[10px]"><a href="widget.html" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="uil uil-angle-right-b"></i> Widget</a></li>
                                </ul>
                            </div><!--end col-->

                            <div class="lg:col-span-3 md:col-span-4">
                                <h5 class="tracking-[1px] text-gray-100 font-semibold">Newsletter</h5>
                                <p class="mt-6">Sign up and receive the latest tips via email.</p>
                                <form>
                                    <div class="grid grid-cols-1">
                                        <div class="my-3">
                                            <label class="form-label">Write your email <span class="text-red-600">*</span></label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="mail" class="size-4 absolute top-3 start-4"></i>
                                                <input type="email" class="form-input ps-12 rounded w-full py-2 px-3 h-10 bg-gray-800 border-0 text-gray-100 focus:shadow-none focus:ring-0 placeholder:text-gray-200" placeholder="Email" name="email" required="">
                                            </div>
                                        </div>

                                        <button type="submit" id="submitsubscribe" name="send" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md">Subscribe</button>
                                    </div>
                                </form>
                            </div><!--end col-->
                        </div><!--end grid-->
                    </div><!--end col-->
                </div>
            </div><!--end grid-->
        </div><!--end container-->

        <!-- <div class="py-[30px] px-0 border-t border-slate-800">
                <div class="container relative text-center">
                    <div class="grid md:grid-cols-2 items-center">
                        <div class="md:text-start text-center">
                            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Techwind. Design with <i class="mdi mdi-heart text-red-600"></i> by <a href="https://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
                        </div>

                        <ul class="list-none md:text-end text-center mt-6 md:mt-0">
                            <li class="inline"><a href="#"><img src="assets/images/payments/american-ex.png" class="max-h-6 inline" title="American Express" alt=""></a></li>
                            <li class="inline"><a href="#"><img src="assets/images/payments/discover.png" class="max-h-6 inline" title="Discover" alt=""></a></li>
                            <li class="inline"><a href="#"><img src="assets/images/payments/master-card.png" class="max-h-6 inline" title="Master Card" alt=""></a></li>
                            <li class="inline"><a href="#"><img src="assets/images/payments/paypal.png" class="max-h-6 inline" title="Paypal" alt=""></a></li>
                            <li class="inline"><a href="#"><img src="assets/images/payments/visa.png" class="max-h-6 inline" title="Visa" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div> -->
    </footer><!--end footer-->
    <!-- Footer End -->

    <!-- Start Cookie Popup -->
    <div class="cookie-popup fixed max-w-lg bottom-3 end-3 start-3 sm:start-0 mx-auto bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md py-5 px-6 z-50">
        <p class="text-slate-400">This website uses cookies to provide you with a great user experience. By using it, you accept our <a href="https://shreethemes.in/" target="_blank" class="text-emerald-600 dark:text-emerald-500 font-semibold">use of cookies</a></p>
        <div class="cookie-popup-actions text-end">
            <button class="absolute border-none bg-none p-0 cursor-pointer font-semibold top-2 end-2"><i class="uil uil-times text-dark dark:text-slate-200 text-2xl"></i></button>
        </div>
    </div>
    <!--Note: Cookies Js including in plugins.init.js (path like; assets/js/plugins.init.js) and Cookies css including in _helper.scss (path like; scss/_helper.scss)-->
    <!-- End Cookie Popup -->

    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 end-5 size-9 text-center bg-indigo-600 text-white leading-9"><i class="uil uil-arrow-up"></i></a>
    <!-- Back to top -->

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
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>

<!-- Mirrored from shreethemes.in/techwind/landing/index-saas.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Mar 2024 01:35:43 GMT -->

</html>