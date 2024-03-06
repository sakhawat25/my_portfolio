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

    /*
     * Show hide modal by default
     */
    const modal = $("#addEducationModal");
    const showModal = modal.attr("data-show-modal");
    if (showModal) {
        // Show the modal
        modal.get(0).showModal();
    } else {
        // Hide the modal
        modal.get(0).close();
    }

    $("#editEducationButton").on("click", (event) => {
        const url = $(event.target).attr("data-target-url");

        axios
            .get(url)
            .then((response) => {
                // Successful request
                console.log("Request is successful.");

                // Populate input fields and show edit education modal
                const data = response.data;

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
