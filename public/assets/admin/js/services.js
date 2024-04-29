$(document).ready(function () {
    /*
     * Show hide modals by default
     */
    const addServiceModal = $("#addServiceModal");
    const showAddServiceModal = addServiceModal.attr("data-show-modal");
    if (showAddServiceModal) {
        // Show the modal
        addServiceModal.get(0).showModal();
    } else {
        // Hide the modal
        addServiceModal.get(0).close();
    }

    const editServiceModal = $("#editServiceModal");
    const showEditServiceModal = editServiceModal.attr("data-show-modal");
    if (showEditServiceModal) {
        // Show the modal
        editServiceModal.get(0).showModal();
    } else {
        // Hide the modal
        editServiceModal.get(0).close();
    }

    /*
     * Show modals on add and edit
     */
    $("#addServiceButton").on("click", function () {
        $("#addServiceModal").get(0).showModal();
    });

    $(".edit-service-button").on("click", (event) => {
        const url = $(event.target).attr("data-target-url");

        axios
            .get(url)
            .then((response) => {
                // Successful request
                console.log("Request is successful.");

                // Populate input fields and show edit education modal
                const data = response.data;
                $("#edit_title").val(data.title);
                $("#edit_sort").val(data.sort);
                $("#edit_description").val(data.description);
                $("#edit-logo-image").attr("src", publicImageUrl + "/" + data.logo);

                $("#editServiceForm").attr(
                    "action",
                    updateRoute.replace(":id", data.id)
                );

                $("#editServiceModal").get(0).showModal();
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

    /*
     * Delete service button
     */
    $(".deleteServiceButton").click(function (e) {
        e.preventDefault(); // Prevent default form submission

        var confirmation = confirm("Are you sure?"); // Display confirmation dialog
        if (confirmation) {
            $(this).closest("form").submit(); // Submit the form if user confirms
        }
    });

    /*
     * For updating service logo
     */
    const $serviceLogoContainer = $(".service-logo-container");
    const $selectLogoButton = $("#select-logo-button");
    const $serviceLogoInputElement = $("#service-logo-input");

    $serviceLogoContainer.on("mouseover", (event) => {
        console.log('you hovered.');
        $("#select-logo-button").show();
    });

    $serviceLogoContainer.on("mouseleave", (event) => {
        $("#select-logo-button").hide();
    });

    $selectLogoButton.on("click", (event) => {
        event.preventDefault();
        $serviceLogoInputElement.click();
    });

    $serviceLogoInputElement.on("change", (event) => {
        const allowedFileExtensions = [".jpg", ".jpeg", ".png"];
        const maxFileSizeMB = 1; // 1 MB
        const file = event.target.files[0];

        // Check file extension
        const index = file.name.lastIndexOf(".");
        const fileExtension = file.name.slice(index).toLowerCase();
        if ($.inArray(fileExtension, allowedFileExtensions) === -1) {
            alert("Only jpg, jpeg and png formats are allowed to update your certificate!");
            // Clear the file input
            $serviceLogoInputElement.val("");
            return;
        }

        // Check file size
        const fileSizeMB = file.size / (1024 * 1024); // Convert bytes to MB
        if (fileSizeMB > maxFileSizeMB) {
            alert("File size exceeds the maximum limit of 1 MB!");
            // Clear the file input
            $serviceLogoInputElement.val("");
            return;
        }

        // Read the selected file and display it in the image input
        pdfjsLib.GlobalWorkerOptions.workerSrc =
            "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js";
        const reader = new FileReader();
        reader.onload = function(event) {
            const imageUrl = event.target.result;
            // Set the image source
            $("#service-image").attr("src", imageUrl);
        };
        reader.readAsDataURL(file);
    });


    const $editServiceLogoContainer = $(".edit-logo-container");
    const $editSelectLogoButton = $("#edit-select-logo-button");
    const $editLogoInputElement = $("#edit-logo-input");

    $editServiceLogoContainer.on("mouseover", (event) => {
        $("#edit-select-logo-button").show();
    });

    $editServiceLogoContainer.on("mouseleave", (event) => {
        $("#edit-select-logo-button").hide();
    });

    $editSelectLogoButton.on("click", (event) => {
        event.preventDefault();
        $editLogoInputElement.click();
    });

    $editLogoInputElement.on("change", (event) => {
        const allowedFileExtensions = [".jpg", ".jpeg", ".png"];
        const maxFileSizeMB = 1; // 1 MB
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
            $("#edit-logo-image").attr("src", imageUrl);
        };
        reader.readAsDataURL(file);
    });

    /*
     * For opening certificate image in a new tab
     */
    $("#view-logo-button").on("click", (event) => {
        event.preventDefault();

        const srcAttributeValue = $("#service-image").attr("src");

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

    $("#edit-view-logo-button").on("click", (event) => {
        event.preventDefault();

        const srcAttributeValue = $("#edit-logo-image").attr("src");

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
