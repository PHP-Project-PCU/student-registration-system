<?php
include('../../autoload.php');

use core\helpers\HTTP;

session_start();

if (!isset($_SESSION['admin'])) {
  HTTP::redirect("/login");
  exit();
}
?>

<!DOCTYPE html>


<?php include('head.php') ?>

<body>
  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- Desktop sidebar -->
    <?php
    include('sidebar.php');
    ?>

    <div class="flex flex-col flex-1 w-full">
      <?php
      include('header.php');
      ?>
      <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Admission
          </h2>
          <!-- CTA -->

          <!-- Cards -->
          <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
              <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                  </path>
                </svg>
              </div>
              <div class="w-full">
                <p class="mb-2 text-xl font-bold text-gray-700 dark:text-gray-200 ">
                  ပထမနှစ်
                </p>
                <div class="flex items-center justify-between">
                  <div class="flex items-center flex-col">
                    <div>
                      <p>40</p>
                    </div>
                    <div>
                      <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                        လျှောက်လွှာအရေအတွက်
                      </p>
                    </div>
                  </div>
                  <div class="flex items-center flex-col">
                    <div>
                      <p>30</p>
                    </div>
                    <div>
                      <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                        စစ်ဆေးပြီး
                      </p>
                    </div>
                  </div>
                  <div class="flex items-center flex-col">
                    <div>
                      <p>10</p>
                    </div>
                    <div>
                      <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                        ပြင်ဆင်ရန်
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
              <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                  </path>
                </svg>
              </div>
              <div class="w-full">
                <p class="mb-2 text-xl font-bold text-gray-700 dark:text-gray-200 ">
                  ဒုတိယနှစ်
                </p>
                <div class="flex items-center justify-between">
                  <div class="flex items-center flex-col">
                    <div>
                      <p>40</p>
                    </div>
                    <div>
                      <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                        လျှောက်လွှာအရေအတွက်
                      </p>
                    </div>
                  </div>
                  <div class="flex items-center flex-col">
                    <div>
                      <p>30</p>
                    </div>
                    <div>
                      <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                        စစ်ဆေးပြီး
                      </p>
                    </div>
                  </div>
                  <div class="flex items-center flex-col">
                    <div>
                      <p>10</p>
                    </div>
                    <div>
                      <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                        ပြင်ဆင်ရန်
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
              <div class="p-3 mr-4 text-indigo-500 bg-indigo-100 rounded-full dark:text-indigo-100 dark:bg-indigo-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                  </path>
                </svg>
              </div>
              <div class="w-full">
                <p class="mb-2 text-xl font-bold text-gray-700 dark:text-gray-200 ">
                  တတိယနှစ်
                </p>
                <div class="flex items-center justify-between">
                  <div class="flex items-center flex-col">
                    <div>
                      <p>40</p>
                    </div>
                    <div>
                      <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                        လျှောက်လွှာအရေအတွက်
                      </p>
                    </div>
                  </div>
                  <div class="flex items-center flex-col">
                    <div>
                      <p>30</p>
                    </div>
                    <div>
                      <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                        စစ်ဆေးပြီး
                      </p>
                    </div>
                  </div>
                  <div class="flex items-center flex-col">
                    <div>
                      <p>10</p>
                    </div>
                    <div>
                      <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                        ပြင်ဆင်ရန်
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
              <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                  </path>
                </svg>
              </div>
              <div class="w-full">
                <p class="mb-2 text-xl font-bold text-gray-700 dark:text-gray-200 ">
                  စတုတ္ထနှစ်
                </p>
                <div class="flex items-center justify-between">
                  <div class="flex items-center flex-col">
                    <div>
                      <p>40</p>
                    </div>
                    <div>
                      <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                        လျှောက်လွှာအရေအတွက်
                      </p>
                    </div>
                  </div>
                  <div class="flex items-center flex-col">
                    <div>
                      <p>30</p>
                    </div>
                    <div>
                      <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                        စစ်ဆေးပြီး
                      </p>
                    </div>
                  </div>
                  <div class="flex items-center flex-col">
                    <div>
                      <p>10</p>
                    </div>
                    <div>
                      <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                        ပြင်ဆင်ရန်
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
              <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                  </path>
                </svg>
              </div>
              <div class="w-full">
                <p class="mb-2 text-xl font-bold text-gray-700 dark:text-gray-200 ">
                  ပဉ္စမနှစ်
                </p>
                <div class="flex items-center justify-between">
                  <div class="flex items-center flex-col">
                    <div>
                      <p>40</p>
                    </div>
                    <div>
                      <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                        လျှောက်လွှာအရေအတွက်
                      </p>
                    </div>
                  </div>
                  <div class="flex items-center flex-col">
                    <div>
                      <p>30</p>
                    </div>
                    <div>
                      <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                        စစ်ဆေးပြီး
                      </p>
                    </div>
                  </div>
                  <div class="flex items-center flex-col">
                    <div>
                      <p>10</p>
                    </div>
                    <div>
                      <p class="text-sm font-medium text-gray-700 dark:text-gray-200">
                        ပြင်ဆင်ရန်
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- New Table -->


          <!-- Charts -->


        </div>
      </main>
    </div>
  </div>
</body>

</html>



<script>
  console.log("hello")
  const pieConfig = {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [58, 33, 33],
        /**
         * These colors come from Tailwind CSS palette
         * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
         */
        backgroundColor: ['#0694a2', '#1c64f2', '#7e3af2'],
        label: 'Dataset 1',
      }, ],
      labels: ['Shoes', 'Shirts', 'Bags'],
    },
    options: {
      responsive: true,
      cutoutPercentage: 80,
      /**
       * Default legends are ugly and impossible to style.
       * See examples in charts.html to add your own legends
       *  */
      legend: {
        display: false,
      },
    },
  }

  // change this to the id of your chart element in HMTL
  const pieCtx = document.getElementById('pie')
  const pie = new Chart(pieCtx, pieConfig)
</script>