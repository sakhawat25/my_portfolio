$(document).ready(function () {
    /*
     * For showing titles in a loop
     */
    const $title = $("#title");
    const titles = $title.data("typed-items");
    const titlesArray = titles.split(",");

    var typed = new Typed("#title", {
        strings: titlesArray,
        loop: true,
        typeSpeed: 100,
        backSpeed: 50,
        backDelay: 2000,
    });

    /*
     * For titles input on profile page
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
     * For edit button on profile page
     */
    $(".action-buttons").on("click", ".edit-btn", function (event) {
        const $clickedButton = $(event.target);
        const $inputElement = $("#" + $clickedButton.data("inputid"));
        const $saveButton = $clickedButton.next(".save-btn");

        // Temporarily remove content, focus, then append it back
        const currentValue = $inputElement.val();
        $inputElement.val("").prop("disabled", false).val(currentValue).focus();

        $clickedButton.hide();
        $saveButton.show();
    });

    /*
     * For save button on profile page
     */
    $(".action-buttons").on("click", ".save-btn", async function (event) {
        const $clickedButton = $(event.target);
        const $inputElement = $("#" + $clickedButton.data("inputid"));
        const $formElement = $("#" + $clickedButton.data("form-id"));
        const $editButton = $("#" + $clickedButton.data("edit-btn-id"));
        const $errorDiv = $("#" + $clickedButton.data("error-div-id"));

        $inputElement.addClass("loading");

        // Perform form submission through AJAX
        const formData = new FormData($formElement[0]);
        const formAction = $formElement[0].action;

        axios
            .post(formAction, formData)
            .then((response) => {
                // Successful request
                $inputElement.removeClass("loading").prop("disabled", true);
                $editButton.show();
                $clickedButton.hide();
                $errorDiv.hide();
            })
            .catch((error) => {
                if (error.request.status === 400) {
                    // Validation error
                    console.log("Its a validation error");
                    const inputElementName = $inputElement[0].name;
                    const $errorsObject = JSON.parse(
                        error.response.data.errors
                    );
                    const $validationErrorsArray =
                        $errorsObject[inputElementName];

                    $errorDiv.text($validationErrorsArray[0]);
                    $errorDiv.show();
                } else {
                    // Another error
                    console.log("Error: ", error);
                }
            });
    });

    /*
     * For updating profile image on profile page
     */

    const $profilePictureContainer = $(".profile-picture-container");
    const $selectPictureButton = $("#select-picture-button");
    const $profileImageInputElement = $("#profile-image");

    $profilePictureContainer.on("mouseover", (event) => {
        $("#select-picture-button").show();
    });

    $profilePictureContainer.on("mouseleave", (event) => {
        $("#select-picture-button").hide();
    });

    $selectPictureButton.on("click", (event) => {
        $profileImageInputElement.click();
    });

    $profileImageInputElement.on("change", (event) => {
        const $form = $(event.target)[0].form;
        $form.submit();
    });

    /*
     * For closing flash messages
     */
    $closeErrorButton = $("#close-error-message-button");

    $closeErrorButton.on("click", (event) => {
        $(event.target).parent().hide();
    });

    $closeSuccessButton = $("#close-success-message-button");

    $closeSuccessButton.on("click", (event) => {
        $(event.target).parent().hide();
    });

    /*
     * For updating cv image on profile page
     */

    const $cvPictureContainer = $(".cv-container");
    const $selectCVButton = $("#select-cv-button");
    const $cvImageInputElement = $("#cv-image-input");

    $cvPictureContainer.on("mouseover", (event) => {
        $("#select-cv-button").show();
    });

    $cvPictureContainer.on("mouseleave", (event) => {
        $("#select-cv-button").hide();
    });

    $selectCVButton.on("click", (event) => {
        event.preventDefault();
        $cvImageInputElement.click();
    });

    $cvImageInputElement.on("change", (event) => {
        const allowedFileExtensions = [".pdf"];
        const maxFileSizeMB = 2; // 2 MB
        const file = event.target.files[0];

        // Check file extension
        const index = file.name.lastIndexOf(".");
        const fileExtension = file.name.slice(index).toLowerCase();
        if ($.inArray(fileExtension, allowedFileExtensions) === -1) {
            alert("Only PDF format is allowed to update your CV!");
            return;
        }

        // Check file size
        const fileSizeMB = file.size / (1024 * 1024); // Convert bytes to MB
        if (fileSizeMB > maxFileSizeMB) {
            alert("File size exceeds the maximum limit of 1 MB!");
            return;
        }

        // Proceed with asynchronous conversion and rendering
        pdfjsLib.GlobalWorkerOptions.workerSrc =
            "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js";

        const reader = new FileReader();
        reader.onload = async function (e) {
            const typedarray = new Uint8Array(e.target.result);

            // Load PDF using pdf.js
            const pdf = await pdfjsLib.getDocument(typedarray).promise;

            // Fetch the first page
            const page = await pdf.getPage(1);
            const viewport = page.getViewport({ scale: 1.0 });

            // Prepare canvas for rendering
            const canvas = document.createElement("canvas");
            const context = canvas.getContext("2d");
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            // Render PDF page to canvas
            const renderContext = {
                canvasContext: context,
                viewport: viewport,
            };
            await page.render(renderContext).promise;

            // Convert canvas to base64 image data
            const imageDataURL = canvas.toDataURL("image/png");

            // Render the image on the element with ID "cv-picture"
            $("#cv-picture").attr("src", imageDataURL);

            $("#cv_image").val(imageDataURL);
        };

        reader.readAsArrayBuffer(file);
    });

    /*
     * View Cv button click event handler
     */
    $("#view-cv-button").on("click", (event) => {
        event.preventDefault();
        var fileInput = document.getElementById("cv-image-input");
        var file = fileInput.files[0];

        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var pdfBlob = new Blob([e.target.result], {
                    type: "application/pdf",
                });
                var pdfUrl = URL.createObjectURL(pdfBlob);
                window.open(pdfUrl, "_blank");
            };
            reader.readAsArrayBuffer(file);
        } else {
            const pdfFileUrl = $(event.target).data("cv-path");
            // window.open(pdfFileUrl, "_blank");

            // Make a GET request using Axios
            axios
                .get(pdfFileUrl, { responseType: "blob" })
                .then((response) => {
                    // Convert the response data to a blob
                    const blob = new Blob([response.data], {
                        type: "application/pdf",
                    });

                    // Create a blob URL
                    const blobUrl = URL.createObjectURL(blob);

                    // Open the blob URL in a new tab using jQuery
                    $("<a>", {
                        href: blobUrl,
                        target: "_blank",
                    })[0].click();
                })
                .catch((error) => {
                    console.error("Error fetching file:", error);
                });
        }
    });
});
