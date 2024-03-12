$(document).ready(function () {
    /*
     * For toggling hidden class on end date field academics page
     */
    $("#currently_studying").on("change", (event) => {
        // Check if the checkbox is checked
        if ($(event.target).is(":checked")) {
            $("#end_date_wrapper").hide();
        } else {
            $("#end_date_wrapper").show();
        }
    });

    $("#edit_currently_studying").on("change", (event) => {
        // Check if the checkbox is checked
        if ($(event.target).is(":checked")) {
            $("#edit_end_date_wrapper").hide();
        } else {
            $("#edit_end_date_wrapper").show();
        }
    });

    /*
     * Show hide modals by default
     */
    const addEducationModal = $("#addEducationModal");
    const showAddEducationModal = addEducationModal.attr("data-show-modal");
    if (showAddEducationModal) {
        // Show the modal
        addEducationModal.get(0).showModal();
    } else {
        // Hide the modal
        addEducationModal.get(0).close();
    }

    const addCertificateModal = $("#addCertificateModal");
    const showAddCertificateModal = addCertificateModal.attr("data-show-modal");
    if (showAddCertificateModal) {
        // Show the modal
        addCertificateModal.get(0).showModal();
    } else {
        // Hide the modal
        addCertificateModal.get(0).close();
    }

    const editEducationModal = $("#editEducationModal");
    const showEditEducationModal = editEducationModal.attr("data-show-modal");
    if (showEditEducationModal) {
        // Show the modal
        editEducationModal.get(0).showModal();
    } else {
        // Hide the modal
        editEducationModal.get(0).close();
    }

    /*
     * Show modals on add and edit
     */
    $("#addEducationButton").on("click", function () {
        $("#addEducationModal").get(0).showModal();

        tinymce.init({
            selector: "#description",
            plugins: "lists",
            menubar: false,
            toolbar_mode: "sliding",
            toolbar:
                "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify bullist numlist | outdent indent",
        });
    });

    $("#addCertificateButton").on("click", function () {
        $("#addCertificateModal").get(0).showModal();

        tinymce.init({
            selector: "#description",
            plugins: "lists",
            menubar: false,
            toolbar_mode: "sliding",
            toolbar:
                "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify bullist numlist | outdent indent",
        });
    });

    $("#editEducationButton").on("click", (event) => {
        const url = $(event.target).attr("data-target-url");

        axios
            .get(url)
            .then((response) => {
                // Successful request
                console.log("Request is successful.");

                // Populate input fields and show edit education modal
                const data = response.data;
                $("#edit_title").val(data.title);
                $("#edit_institution").val(data.institution);
                $("#edit_grade").val(data.grade);
                $("#edit_start_date").val(data.start_date);
                $("#edit_end_date").val(data.end_date);
                $("#edit_sort").val(data.sort);
                $("#edit_description").val(data.description);

                $("#editEducationForm").attr(
                    "action",
                    updateRoute.replace(":id", data.id)
                );

                if (data.currently_studying) {
                    $("#edit_currently_studying").prop("checked", true);
                    $("#edit_end_date_wrapper").hide();
                } else {
                    $("#edit_currently_studying").prop("checked", false);
                    $("#edit_end_date_wrapper").show();
                }

                $("#edit_grade_type > option").each(function () {
                    if (this.value === data.grade_type) {
                        $(this).prop("selected", true);
                    }
                });

                $("#editEducationModal").get(0).showModal();

                tinymce.init({
                    selector: "#edit_description",
                    plugins: "lists",
                    menubar: false,
                    toolbar_mode: "sliding",
                    toolbar:
                        "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify bullist numlist | outdent indent",
                });
            })
            .catch((error) => {
                if (error.request.status === 404) {
                    // Resource not found
                    console.log("Resource not found!");

                    // show alert box
                    window.alert("Record not found!");
                } else {
                    // Another error
                    console.log("Error: ", error);
                }
            });
    });

    $("#editCertificateButton").on("click", (event) => {
        const url = $(event.target).attr("data-target-url");

        axios
            .get(url)
            .then((response) => {
                // Successful request
                console.log("Request is successful.");

                // Populate input fields and show edit education modal
                const data = response.data;
                $("#edit_certificate_title").val(data.title);
                $("#edit_provider").val(data.provider);
                $("#edit_issue_date").val(data.issue_date);
                $("#edit_expiry_date").val(data.expiry_date);
                $("#edit_certificate_sort").val(data.sort);
                $("#edit-certificate-image").attr("src", publicImageUrl + "/" + data.image);
                $("#edit_certificate_description").val(data.description);

                $("#editCertificateForm").attr(
                    "action",
                    updateCertificateRoute.replace(":id", data.id)
                );

                $("#editCertificateModal").get(0).showModal();

                tinymce.init({
                    selector: "#edit_certificate_description",
                    plugins: "lists",
                    menubar: false,
                    toolbar_mode: "sliding",
                    toolbar:
                        "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify bullist numlist | outdent indent",
                });
            })
            .catch((error) => {
                console.log(error);
                if (error.request.status === 404) {
                    // Resource not found
                    console.log("Resource not found!");

                    // show alert box
                    window.alert("Record not found!");
                } else {
                    // Another error
                    console.log("Error: ", error);
                }
            });
    });

    /*
     * Delete education button
     */
    $(".deleteEducationButton").click(function (e) {
        e.preventDefault(); // Prevent default form submission

        var confirmation = confirm("Are you sure?"); // Display confirmation dialog
        if (confirmation) {
            $(this).closest("form").submit(); // Submit the form if user confirms
        }
    });

    /*
     * Delete certificate button
     */
    $(".deleteCertificateButton").click(function (e) {
        e.preventDefault(); // Prevent default form submission

        var confirmation = confirm("Are you sure?"); // Display confirmation dialog
        if (confirmation) {
            $(this).closest("form").submit(); // Submit the form if user confirms
        }
    });

    /*
     * For updating certificate image on academics page
     */
    const $certificatePictureContainer = $(".certificate-container");
    const $selectCertificateButton = $("#select-certificate-button");
    const $certificateImageInputElement = $("#certificate-image-input");

    $certificatePictureContainer.on("mouseover", (event) => {
        $("#select-certificate-button").show();
    });

    $certificatePictureContainer.on("mouseleave", (event) => {
        $("#select-certificate-button").hide();
    });

    $selectCertificateButton.on("click", (event) => {
        event.preventDefault();
        $certificateImageInputElement.click();
    });

    $certificateImageInputElement.on("change", (event) => {
        const allowedFileExtensions = [".jpg", ".jpeg", ".png"];
        const maxFileSizeMB = 1; // 2 MB
        const file = event.target.files[0];

        // Check file extension
        const index = file.name.lastIndexOf(".");
        const fileExtension = file.name.slice(index).toLowerCase();
        if ($.inArray(fileExtension, allowedFileExtensions) === -1) {
            alert("Only jpg, jpeg and png formats are allowed to update your certificate!");
            // Clear the file input
            $certificateImageInputElement.val("");
            return;
        }

        // Check file size
        const fileSizeMB = file.size / (1024 * 1024); // Convert bytes to MB
        if (fileSizeMB > maxFileSizeMB) {
            alert("File size exceeds the maximum limit of 1 MB!");
            // Clear the file input
            $certificateImageInputElement.val("");
            return;
        }

        // Read the selected file and display it in the image input
        pdfjsLib.GlobalWorkerOptions.workerSrc =
            "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js";
        const reader = new FileReader();
        reader.onload = function(event) {
            const imageUrl = event.target.result;
            // Set the image source
            $("#certificate-image").attr("src", imageUrl);
        };
        reader.readAsDataURL(file);
    });


    const $editCertificatePictureContainer = $(".edit-certificate-container");
    const $editSelectCertificateButton = $("#edit-select-certificate-button");
    const $editCertificateImageInputElement = $("#edit-certificate-image-input");

    $editCertificatePictureContainer.on("mouseover", (event) => {
        $("#edit-select-certificate-button").show();
    });

    $editCertificatePictureContainer.on("mouseleave", (event) => {
        $("#edit-select-certificate-button").hide();
    });

    $editSelectCertificateButton.on("click", (event) => {
        event.preventDefault();
        $editCertificateImageInputElement.click();
    });

    $editCertificateImageInputElement.on("change", (event) => {
        const allowedFileExtensions = [".jpg", ".jpeg", ".png"];
        const maxFileSizeMB = 1; // 2 MB
        const file = event.target.files[0];

        // Check file extension
        const index = file.name.lastIndexOf(".");
        const fileExtension = file.name.slice(index).toLowerCase();
        if ($.inArray(fileExtension, allowedFileExtensions) === -1) {
            alert("Only jpg, jpeg and png formats are allowed to update your certificate!");
            // Clear the file input
            $certificateImageInputElement.val("");
            return;
        }

        // Check file size
        const fileSizeMB = file.size / (1024 * 1024); // Convert bytes to MB
        if (fileSizeMB > maxFileSizeMB) {
            alert("File size exceeds the maximum limit of 1 MB!");
            // Clear the file input
            $certificateImageInputElement.val("");
            return;
        }

        // Read the selected file and display it in the image input
        pdfjsLib.GlobalWorkerOptions.workerSrc =
            "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js";
        const reader = new FileReader();
        reader.onload = function(event) {
            const imageUrl = event.target.result;
            // Set the image source
            $("#edit-certificate-image").attr("src", imageUrl);
        };
        reader.readAsDataURL(file);
    });

    /*
     * For opening certificate image in a new tab
     */
    $("#view-certificate-button").on("click", (event) => {
        event.preventDefault();

        const srcAttributeValue = $("#certificate-image").attr("src");

        // Check if the src attribute starts with the prefix for JPEG or PNG images
        if (srcAttributeValue.startsWith("data:image/jpeg;base64,") || srcAttributeValue.startsWith("data:image/png;base64,") || srcAttributeValue.startsWith("data:image/jpg;base64,")) {
            // Extract base64 data
            const base64Data = srcAttributeValue.replace(/^data:image\/(png|jpeg|jpg);base64,/, '');

            // Convert base64 to binary
            const binaryData = atob(base64Data);

            // Create Uint8Array from binary data
            const arrayBuffer = new ArrayBuffer(binaryData.length);
            const uint8Array = new Uint8Array(arrayBuffer);
            for (let i = 0; i < binaryData.length; i++) {
                uint8Array[i] = binaryData.charCodeAt(i);
            }

            // Create Blob from Uint8Array
            const imageBlob = new Blob([uint8Array], { type: 'image/png' }); // Change type if your image is JPEG or another format
            const imageUrl = URL.createObjectURL(imageBlob);
            window.open(imageUrl, "_blank");
        }

        else {
            // Open the image in a new tab
            window.open(srcAttributeValue, '_blank');
        }
    });

    $("#edit-view-certificate-button").on("click", (event) => {
        event.preventDefault();

        const srcAttributeValue = $("#edit-certificate-image").attr("src");

        // Check if the src attribute starts with the prefix for JPEG or PNG images
        if (srcAttributeValue.startsWith("data:image/jpeg;base64,") || srcAttributeValue.startsWith("data:image/png;base64,") || srcAttributeValue.startsWith("data:image/jpg;base64,")) {
            // Extract base64 data
            const base64Data = srcAttributeValue.replace(/^data:image\/(png|jpeg|jpg);base64,/, '');

            // Convert base64 to binary
            const binaryData = atob(base64Data);

            // Create Uint8Array from binary data
            const arrayBuffer = new ArrayBuffer(binaryData.length);
            const uint8Array = new Uint8Array(arrayBuffer);
            for (let i = 0; i < binaryData.length; i++) {
                uint8Array[i] = binaryData.charCodeAt(i);
            }

            // Create Blob from Uint8Array
            const imageBlob = new Blob([uint8Array], { type: 'image/png' }); // Change type if your image is JPEG or another format
            const imageUrl = URL.createObjectURL(imageBlob);
            window.open(imageUrl, "_blank");
        }

        else {
            // Open the image in a new tab
            window.open(srcAttributeValue, '_blank');
        }
    });
});
