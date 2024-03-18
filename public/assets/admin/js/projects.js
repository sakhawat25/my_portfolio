$(document).ready(function() {
    /*
     * Populate tinymce with description input element
     */
    tinymce.init({
        selector: "#description",
        plugins: "lists",
        menubar: false,
        statusbar: false,
        toolbar_mode: "sliding",
        toolbar:
            "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify bullist numlist | outdent indent",
    });

    /*
     * For tages input box on add project page
     */
    const inputElements = $(".tagify");

    inputElements.each(
        (index, input) =>
            new Tagify(input, {
                transformTag: function (tagData) {
                    tagData.style =
                        "--tag-bg:#4fd1c5;--tag-text-color:#fff;--tag-hover:#38b2ac;--tag-remove-btn-color:#fff;";
                },
            })
    );

    /*
     * For updating image on add project page
     */

    const $projectImageContainer = $(".project-image-container");
    const $selectImageButton = $("#select-image-button");
    const $projectImageInputElement = $("#project-image-input");

    $projectImageContainer.on("mouseover", (event) => {
        $("#select-image-button").show();
    });

    $projectImageContainer.on("mouseleave", (event) => {
        $("#select-image-button").hide();
    });

    $selectImageButton.on("click", (event) => {
        event.preventDefault();
        $projectImageInputElement.click();
    });

    $projectImageInputElement.on("change", (event) => {
        const allowedFileExtensions = [".jpg", ".jpeg", ".png"];
        const maxFileSizeMB = 1; // 1 MB
        const file = event.target.files[0];

        // Check file extension
        const index = file.name.lastIndexOf(".");
        const fileExtension = file.name.slice(index).toLowerCase();
        if ($.inArray(fileExtension, allowedFileExtensions) === -1) {
            alert("Only jpg,jpeg and png formats are allowed to upload image!");
            // Clear the file input
            $projectImageInputElement.val("");
            return;
        }

        // Check file size
        const fileSizeMB = file.size / (1024 * 1024); // Convert bytes to MB
        if (fileSizeMB > maxFileSizeMB) {
            alert("File size exceeds the maximum limit of 1 MB!");
            // Clear the file input
            $projectImageInputElement.val("");
            return;
        }

        // Read the selected file and display it in the image input
        pdfjsLib.GlobalWorkerOptions.workerSrc =
            "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js";
        const reader = new FileReader();
        reader.onload = function(event) {
            const imageUrl = event.target.result;
            // Set the image source
            $("#project-image").attr("src", imageUrl);
        };
        reader.readAsDataURL(file);
    });
});
