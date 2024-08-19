$(document).ready(function () {
    $("#submit").on("click", function (event) {
        // Prevent the form from submitting
        event.preventDefault();

        // Get all form elements
        var allFields = $("#stdAdmissionForm").find("input, select, textarea");

        // Define the dimensions of the preview window
        var width = 800; // Increased width for better image preview
        var height = 800; // Increased height for better image preview

        // Calculate the position for centering the window
        var left = (screen.width / 2) - (width / 2);
        var top = (screen.height / 2) - (height / 2);

        // Create a new window with the calculated position
        var previewWindow = window.open("", "PreviewWindow", `width=${width},height=${height},top=${top},left=${left}`);

        // Construct the preview content
        var previewContent = "<html><head><title>Form Preview</title></head><body>";
        previewContent += "<h2>Form Preview</h2>";
        previewContent += "<form id='formPreview'>";

        // Array to store promises for image previews
        var imagePromises = [];

        // Iterate over each form field to display its name and value
        allFields.each(function () {
            var fieldName = $(this).attr("name");
            var fieldValue = $(this).val();




            if ($(this).is(':radio')) {
                if ($(this).is(':checked')) {
                    previewContent += `<p>${fieldName}: ${fieldValue}</p>`;
                }
            } else if ($(this).is(':file')) {
                var files = $(this).prop('files');
                if (files.length > 0) {
                    previewContent += `<p>${fieldName}:</p>`;
                    // Read and display each file
                    $.each(files, function (index, file) {
                        var reader = new FileReader();
                        var imagePromise = new Promise((resolve) => {
                            reader.onload = function (e) {
                                previewContent += `<div>
                                    <p>${file.name}</p>
                                    <img src="${e.target.result}" style="max-width: 300px; max-height: 300px;"/>
                                </div>`;
                                resolve();
                            };
                            reader.readAsDataURL(file);
                        });
                        imagePromises.push(imagePromise);
                    });
                } else {
                    previewContent += `<p>${fieldName}: No file selected</p>`;
                }
            } else {
                previewContent += `<p>${fieldName}: ${fieldValue || "No value"}</p>`;
            }
        });

        // Wait for all image promises to resolve before finalizing the preview content
        Promise.all(imagePromises).then(() => {
            previewContent += "<button type='button' onclick='window.close()'>Close</button>";
            previewContent += "</form>";
            previewContent += "</body></html>";

            // Write the preview content to the new window
            previewWindow.document.write(previewContent);
            previewWindow.document.close();
        });
    });
});


