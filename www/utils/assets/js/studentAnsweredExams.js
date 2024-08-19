$(document).ready(function () {
    // Initialize allRowsData array to store all rows data
    var allRowsData = [];

    $("#addNew").on('click', function (event) {
        event.preventDefault();

        // Retrieve current data from the form
        var studentAnsweredExams = {
            exam_name: $("#exam_name").val(),
            exam_major: $("#exam_major").val(),
            exam_roll_num: $("#exam_roll_num").val(),
            exam_year: $("#exam_year").val(),
            exam_status: $("#exam_status").val()
        };

        // Push current data to the allRowsData array
        allRowsData.push([
            studentAnsweredExams.exam_name,
            studentAnsweredExams.exam_major,
            studentAnsweredExams.exam_roll_num,
            studentAnsweredExams.exam_year,
            studentAnsweredExams.exam_status
        ]);

        console.log("All rows data:", allRowsData);

        // Get the table by its ID
        var table = document.getElementById("examTable");

        // Create a new row element
        var newRow = table.insertRow();

        // Create cells in the new row
        var cell0 = newRow.insertCell(0);
        var cell1 = newRow.insertCell(1);
        var cell2 = newRow.insertCell(2);
        var cell3 = newRow.insertCell(3);
        var cell4 = newRow.insertCell(4);

        // Creating options for exam_name dropdown
        const examNameOptions = `
            <option ${studentAnsweredExams.exam_name === 'ပထမနှစ်စာမေးပွဲ' ? 'selected' : ''}>ပထမနှစ်စာမေးပွဲ</option>
            <option ${studentAnsweredExams.exam_name === 'ဒုတိယနှစ်စာမေးပွဲ' ? 'selected' : ''}>ဒုတိယနှစ်စာမေးပွဲ</option>
            <option ${studentAnsweredExams.exam_name === 'တတိယနှစ်စာမေးပွဲ' ? 'selected' : ''}>တတိယနှစ်စာမေးပွဲ</option>
            <option ${studentAnsweredExams.exam_name === 'စတုတ္ထနှစ်စာမေးပွဲ' ? 'selected' : ''}>စတုတ္ထနှစ်စာမေးပွဲ</option>
        `;

        // Creating options for exam_major dropdown
        const examMajorOptions = `
            <option ${studentAnsweredExams.exam_major === 'CST' ? 'selected' : ''}>CST</option>
            <option ${studentAnsweredExams.exam_major === 'CS' ? 'selected' : ''}>CS</option>
            <option ${studentAnsweredExams.exam_major === 'CT' ? 'selected' : ''}>CT</option>
        `;

        // Creating options for exam_status dropdown
        const examStatusOptions = `
            <option ${studentAnsweredExams.exam_status === 'အောင်' ? 'selected' : ''}>အောင်</option>
            <option ${studentAnsweredExams.exam_status === 'ရှုံး' ? 'selected' : ''}>ရှုံး</option>
        `;

        // Set cell values
        cell0.innerHTML = `
            <select class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                ${examNameOptions}
            </select>
        `;
        cell1.innerHTML = `
            <select class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                ${examMajorOptions}
            </select>
        `;
        cell2.innerHTML = `
            <input name="exam_roll_num" value="${studentAnsweredExams.exam_roll_num}" class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0" placeholder="">
        `;
        cell3.innerHTML = `
            <input name="exam_year" value="${studentAnsweredExams.exam_year}" class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0" placeholder="">
        `;
        cell4.innerHTML = `
            <select class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-indigo-600 dark:border-gray-800 dark:focus:border-indigo-600 focus:ring-0">
                ${examStatusOptions}
            </select>
        `;

        // Optionally, clear form values for the next entry
        $("#exam_name").val('');
        $("#exam_major").val('');
        $("#exam_roll_num").val('');
        $("#exam_year").val('');
        $("#exam_status").val('');
    });
});
