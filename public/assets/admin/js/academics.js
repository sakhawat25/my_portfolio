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
     * Show hide modal by default
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
     * Show edit education modal on edit button click
     */
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

                if (data.currently_studying) {
                    $("#edit_currently_studying").prop('checked', true);
                    $("#edit_end_date_wrapper").hide();
                } else {
                    $("#edit_currently_studying").prop('checked', false);
                    $("#edit_end_date_wrapper").show();
                }

                $("#edit_grade_type > option").each(function() {
                    if (this.value === data.grade_type) {
                        $(this).prop("selected", true)
                    }
                });

                $("#editEducationModal").get(0).showModal();
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
});
