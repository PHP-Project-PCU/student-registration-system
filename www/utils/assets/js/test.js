var allRowsData = [];
var index = 0;
var exam_name;
var exam_major;
var exam_roll_num;
var exam_year;
var exam_status;
var table;

$(document).ready(function () {
    $("#addNew").on('click', function (event) {
        event.preventDefault();

        table = document.getElementById("examTable");

        exam_name = $(`#exam_name${index}`).val();
        exam_major = $(`#exam_major${index}`).val();
        exam_roll_num = $(`#exam_roll_num${index}`).val();
        exam_year = $(`#exam_year${index}`).val();
        exam_status = $(`#exam_status${index}`).val();

        // console.log(exam_name);
        // console.log(exam_major);
        // console.log(exam_roll_num);
        // console.log(exam_year);
        // console.log(exam_status);



        index++;

        var newRow = table.insertRow();

        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);
        var cell3 = newRow.insertCell(2);
        var cell4 = newRow.insertCell(3);
        var cell5 = newRow.insertCell(4);
        var cell6 = newRow.insertCell(5);

        cell1.innerHTML = `
        <select id="exam_name${index}" name="exam_name" class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
            <option>-</option>
            <option>ပထမနှစ်စာမေးပွဲ</option>
            <option>ဒုတိယနှစ်စာမေးပွဲ</option>
            <option>တတိယနှစ်စာမေးပွဲ</option>
            <option>စတုတ္ထနှစ်စာမေးပွဲ</option>
        </select>`;
        cell2.innerHTML = `
        <select id="exam_major${index}" name="exam_major" class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
            <option>-</option>
            <option>CST</option>
            <option>CS</option>
            <option>CT</option>
        </select>`;
        cell3.innerHTML = `
        <input id="exam_roll_num${index}" name="exam_roll_num" class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0" placeholder="">`;
        cell4.innerHTML = `
        <input id="exam_year${index}" name="exam_year" class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0" placeholder="">`;
        cell5.innerHTML = `
        <select id="exam_status${index}" name="exam_status" class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
            <option>-</option>
            <option>အောင်</option>
            <option>ရှုံး</option>
        </select>`;
        cell6.innerHTML = `
       <svg xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-6 deleteRow" data-row-index="${index}">
            <path stroke-linecap="round" stroke-linejoin="round"
            d="M6 18L18 6M6 6l12 12" />
        </svg>`;

        var individuallyStudentData = {
            "name": exam_name,
            "major": exam_major,
            "roll_num": exam_roll_num,
            "year": exam_year,
            "status": exam_status
        }

        allRowsData.push([
            individuallyStudentData.name,
            individuallyStudentData.major,
            individuallyStudentData.roll_num,
            individuallyStudentData.year,
            individuallyStudentData.status,
        ]);

        console.log(allRowsData);
    });

    // $(document).on('click', '.deleteRow', function () {
    //     var rowIndex = $(this).data('row-index');

    //     if (rowIndex > 0) { // Ensure the initial row is not deleted
    //         table.deleteRow(rowIndex);

    //         // Remove the corresponding data from the allRowsData array
    //         allRowsData.splice(rowIndex - 1, 1);

    //         index--; // Decrease the index to maintain the correct ID for new rows
    //     }

    //     // if (index === 0) {
    //     //     $(".deleteRow").hide();
    //     // }

    //     console.log(allRowsData);
    // });


    // $(".deleteRow").hide();
});
