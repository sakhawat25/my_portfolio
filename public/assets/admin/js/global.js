$(document).ready(function() {
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
});
