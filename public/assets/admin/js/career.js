$(document).ready(function() {
    /*
     * For toggling hidden class on end date field academics page
     */
    $("#currently_working").on("change", (event) => {
        // Check if the checkbox is checked
        if ($(event.target).is(":checked")) {
            $("#end_date_wrapper").hide();
        } else {
            $("#end_date_wrapper").show();
        }
    });

    $("#edit_currently_working").on("change", (event) => {
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
    const addExperienceModal = $("#addExperienceModal");
    const showAddExperienceModal = addExperienceModal.attr("data-show-modal");
    if (showAddExperienceModal) {
        // Show the modal
        addExperienceModal.get(0).showModal();
    } else {
        // Hide the modal
        addExperienceModal.get(0).close();
    }

    const editExperienceModal = $("#editExperienceModal");
    const showEditExperienceModal = editExperienceModal.attr("data-show-modal");
    if (showEditExperienceModal) {
        // Show the modal
        editExperienceModal.get(0).showModal();
    } else {
        // Hide the modal
        editExperienceModal.get(0).close();
    }


    /*
     * Show modals on add and edit
     */
    $("#addExperienceButton").on("click", function () {
        $("#addExperienceModal").get(0).showModal();

        tinymce.init({
            selector: "#description",
            plugins: "lists",
            menubar: false,
            toolbar_mode: "sliding",
            toolbar:
                "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify bullist numlist | outdent indent",
        });
    });

    $("#editExperienceButton").on("click", (event) => {
        const url = $(event.target).attr("data-target-url");

        axios
            .get(url)
            .then((response) => {
                // Successful request
                console.log("Request is successful.");

                // Populate input fields and show edit education modal
                const data = response.data;
                $("#edit_position").val(data.position);
                $("#edit_organization").val(data.organization);
                $("#edit_start_date").val(data.start_date);
                $("#edit_end_date").val(data.end_date);
                $("#edit_sort").val(data.sort);
                $("#edit_description").val(data.description);

                $("#editExperienceForm").attr(
                    "action",
                    updateRoute.replace(":id", data.id)
                );

                if (data.currently_working) {
                    $("#edit_currently_working").prop("checked", true);
                    $("#edit_end_date_wrapper").hide();
                } else {
                    $("#edit_currently_working").prop("checked", false);
                    $("#edit_end_date_wrapper").show();
                }

                $("#editExperienceModal").get(0).showModal();

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

    /*
     * Delete experience button
     */
    $(".deleteExperienceButton").click(function (e) {
        e.preventDefault(); // Prevent default form submission

        var confirmation = confirm("Are you sure?"); // Display confirmation dialog
        if (confirmation) {
            $(this).closest("form").submit(); // Submit the form if user confirms
        }
    });

    /*
     * For skills input box on career page
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
     * Edit Technical Skill
     */
    $(".edit-btn").click((event) => {
        event.preventDefault();
        const $clickedButton = $(event.target);
        const $nameInputElement = $("#" + $clickedButton.data("name-input-id"));
        const $levelInputElement = $("#" + $clickedButton.data("level-input-id"));
        const $updateButton = $clickedButton.prev(".update-btn");
        const $cancelButton = $clickedButton.next(".cancel-btn");

        // Temporarily remove content, focus, then append it back
        let currentValue = $nameInputElement.val();
        $nameInputElement.val("").prop("disabled", false).val(currentValue).focus();

        currentValue = $levelInputElement.val();
        $levelInputElement.val("").prop("disabled", false).val(currentValue);

        $clickedButton.hide();
        $updateButton.show();
        $cancelButton.show();
    });

    /*
     * Reset Editable Technical Skill Box
     */
    $(".cancel-btn").click((event) => {
        event.preventDefault();
        const $clickedButton = $(event.target);
        const $nameInputElement = $("#" + $clickedButton.data("name-input-id"));
        const $levelInputElement = $("#" + $clickedButton.data("level-input-id"));
        const $updateButton = $clickedButton.siblings(".update-btn");
        const $editButton = $clickedButton.siblings(".edit-btn");

        // Temporarily remove content, focus, then append it back
        let currentValue = $nameInputElement.val();
        $nameInputElement.val("").prop("disabled", true).val(currentValue).focus();

        currentValue = $levelInputElement.val();
        $levelInputElement.val("").prop("disabled", true).val(currentValue);

        $clickedButton.hide();
        $updateButton.hide();
        $editButton.show();
    });
});
