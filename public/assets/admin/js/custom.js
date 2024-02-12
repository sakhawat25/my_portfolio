$(document).ready(function () {
    /*
     * For showing titles in a loop
     */
    const title = $("#title");

    const titles = title.attr("data-typed-items");

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
    const inputElements = document.querySelectorAll(".tagify");

    inputElements.forEach(
        (input) =>
            new Tagify(input, {
                transformTag: function (tagData) {
                    tagData.style =
                        "--tag-bg:#4fd1c5;--tag-text-color:#fff;--tag-hover:#38b2ac;--tag-remove-btn-color:#fff;";
                },
            })
    );

    /*
     * For action buttons on profile page
     */
    const container = document.querySelector(".action-buttons"); // Parent element

    container.addEventListener("click", (event) => {
        const clickedButton = event.target;

        if (clickedButton.matches(".edit-btn")) {
            console.log("edit button clicked");
            handleEditButtonClick(clickedButton);
        } else if (clickedButton.matches(".save-btn")) {
            console.log("save button clicked");
            event.preventDefault();
            handleSaveButtonClick(clickedButton);
        }
    });

    // Makes input element editable and hides edit button
    function handleEditButtonClick(clickedButton) {
        const inputElementId = clickedButton.getAttribute("data-inputid");
        const inputElement = document.getElementById(inputElementId);
        inputElement.removeAttribute("readonly");
        inputElement.focus();
        inputElement.selectionStart = inputElement.value.length;
        inputElement.selectionEnd = inputElement.value.length;
        clickedButton.classList.add("hidden");
        const parent = clickedButton.parentNode;
        const siblingButtons = Array.from(
            parent.querySelectorAll("button")
        ).filter((button) => button !== clickedButton);
        siblingButtons.forEach((button) => button.classList.remove("hidden"));
    }

    // Makes input element readonly, submits form and hides cancel and save button
    async function handleSaveButtonClick(clickedButton) {
        // Get element ids
        const inputElementId = clickedButton.getAttribute("data-inputid");
        const formElementId = clickedButton.getAttribute("data-form-id");
        const editButtonId = clickedButton.getAttribute("data-edit-btn-id");
        const errorDivId = clickedButton.getAttribute("data-error-div-id");

        // Get elements
        const inputElement = document.getElementById(inputElementId);
        const formElement = document.getElementById(formElementId);
        const editButton = document.getElementById(editButtonId);
        const errorDiv = document.getElementById(errorDivId);

        // Perform form submission through AJAX
        const formData = new FormData(formElement);
        const formAction = formElement.action;
    }

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

    $.get("/")
        .done((data) => console.log(data))
        .fail((error) => console.log(error));
});
