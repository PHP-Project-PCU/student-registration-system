$(document).ready(function () {
    $("#submit").on("click", function (event) {
        // Prevent the form from submitting
        event.preventDefault();

        // Serialize the form data
        // var formData = $("#myForm").serializeArray();

        // Define the dimensions of the preview window
        var width = 600;
        var height = 400;

        // Calculate the position for centering the window
        var left = (screen.width / 2) - (width / 2);
        var top = (screen.height / 2) - (height / 2);

        // Create a new window with the calculated position
        var previewWindow = window.open("", "PreviewWindow", `width=${width},height=${height},top=${top},left=${left}`);

        // Construct the preview content
        var previewContent = "<html><head><title>Form Preview</title></head><body>";
        previewContent += "<h2>Form Preview</h2>";
        previewContent += "<form>";

        // $.each(formData, function(index, field) {
        //     previewContent += "<div class='form-group'>";
        //     previewContent += "<label for='" + field.name + "'>" + field.name.charAt(0).toUpperCase() + field.name.slice(1) + ":</label>";
        //     previewContent += "<input type='text' class='form-control' id='" + field.name + "' name='" + field.name + "' value='" + field.value + "' readonly>";
        //     previewContent += "</div>";
        // });

        previewContent += "<button type='button' onclick='window.close()'>Close</button>";
        previewContent += "</form>";
        previewContent += "</body></html>";

        // Write the preview content to the new window
        previewWindow.document.write(previewContent);
        previewWindow.document.close();
    });
});
