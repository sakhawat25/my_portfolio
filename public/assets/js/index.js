$(document).ready(function() {
    $('#submit-contact-btn').click(function(event) {
        event.preventDefault();

        $('#contactus-validation-list').html('');

        const $formElement = $("#contactus-form");

        // Perform form submission through AJAX
        const formData = new FormData($formElement[0]);
        const formAction = $formElement[0].action;

        axios
            .post(formAction, formData)
            .then((response) => {
                // Successful request
                console.log('request is successful');

                alert('Your message has been received successfully.');

                // Clear all form elements
                $formElement[0].reset();
            })
            .catch((error) => {
                if (error.request.status === 422) {
                    // Validation error
                    console.log("Its a validation error");
                    const errorsObject = error.response.data.errors;
                    let items = '';
                    for (const key in errorsObject) {
                        const errorMessage = errorsObject[key][0];
                        items += `<li class="my-1">${errorMessage}</li>`;
                    }

                    $('#contactus-validation-list').append(items);
                    return;
                } else {
                    // Another error
                    console.log("Error: ", error);
                }
            });

        return;
    });
});
