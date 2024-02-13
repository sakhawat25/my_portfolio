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
    $(".action-buttons").on("click", ".edit-btn", function(event) {
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
    $(".action-buttons").on("click", ".save-btn", async function(event) {
        const $clickedButton = $(event.target);
        const $inputElement = $("#" + $clickedButton.data("inputid"));
        const $formElement = $("#" + $clickedButton.data("form-id"));
        const $editButton = $("#" + $clickedButton.data("edit-btn-id"));
        const $errorDiv = $("#" + $clickedButton.data("error-div-id"));

        // Perform form submission through AJAX
        const formData = new FormData($formElement[0]);
        const formAction = $formElement[0].action;

        axios.post(formAction, formData)
            .then(response => {
                $inputElement.prop("disabled", true);
                $editButton.show();
                $clickedButton.hide();
            })
            .catch(error => {
                console.log('request is unsuccessful');

                if (error.request.status === 400) {
                    // Validation error
                    console.log('Its a validation error');
                }
            });
      });


    /*
     * For updating profile image on profile page
     */
    const profileImageInput = document.getElementById("image");

    profileImageInput.addEventListener("change", (event) => {
        const input = event.target;
        const file = input.files[0];
        const type = file.type;

        const output = document.getElementById("preview_img");

        output.src = URL.createObjectURL(file);
        output.onload = function () {
            URL.revokeObjectURL(output.src); // free memory
        };
    });
});
