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
    const showModal = modal.attr('data-show-modal');
    if (showModal) {
        // Show the modal
        modal.get(0).showModal();
    } else {
        // Hide the modal
        modal.get(0).close();
    }
});
