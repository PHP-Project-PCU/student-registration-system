/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
// console.log("hello")
// const pieConfig = {
//   type: 'doughnut',
//   data: {
//     datasets: [
//       {
//         data: [60,40],
//         /**
//          * These colors come from Tailwind CSS palette
//          * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
//          */
//         backgroundColor: ['#0694a2', '#1c64f2'],
//         label: 'Dataset 1',
//       },
//     ],
//     labels: ["Male", "Female"],
//   },
//   options: {
//     responsive: true,
//     cutoutPercentage: 80,
//     /**
//      * Default legends are ugly and impossible to style.
//      * See examples in charts.html to add your own legends
//      *  */
//     legend: {
//       display: false,
//     },
//   },
// }



// // // change this to the id of your chart element in HMTL
// // const pieCtx = document.getElementById('pie')
// // window.myPie = new Chart(pieCtx, pieConfig)



// const config = {
//   type: 'pie',
//   data:{
//     labels: [
//       'Red',
//       'Blue',
//       'Yellow'
//     ],
//     datasets: [{
//       label: 'My First Dataset',
//       data: [300, 50, 100],
//       backgroundColor: [
//         'rgb(255, 99, 132)',
//         'rgb(54, 162, 235)',
//         'rgb(255, 205, 86)'
//       ],
//       hoverOffset: 4
//     }]
//   },
// };


// const pieCtx = document.getElementById('pie')
// window.myPie = new Chart(pieCtx, config)


/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
const pieConfig = {
  type: 'doughnut',
  data: {
    datasets: [
      {
        data: [33, 33, 33],
        /**
         * These colors come from Tailwind CSS palette
         * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
         */
        backgroundColor: ['#0694a2', '#1c64f2', '#7e3af2'],
        label: 'Dataset 1',
      },
    ],
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
window.myPie = new Chart(pieCtx, pieConfig)
