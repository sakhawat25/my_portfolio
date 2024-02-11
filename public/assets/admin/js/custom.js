/*
 * For showing titles in a loop
 */
const title = document.getElementById("title");

const titles = title.getAttribute("data-typed-items");

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
    const siblingButtons = Array.from(parent.querySelectorAll("button")).filter(
        (button) => button !== clickedButton
    );
    siblingButtons.forEach((button) => button.classList.remove("hidden"));
}

// Makes input element readonly and hides cancel and save button
// function handleCancelButtonClick(clickedButton) {
//     const inputElementId = clickedButton.getAttribute("data-inputid");
//     const inputElement = document.getElementById(inputElementId);
//     inputElement.setAttribute("readonly", true);
//     const editButtonId = clickedButton.getAttribute("data-edit-btn-id");
//     const editButton = document.getElementById(editButtonId);
//     const saveButtonId = clickedButton.getAttribute("data-save-btn-id");
//     const saveButton = document.getElementById(saveButtonId);
//     editButton.classList.remove("hidden");
//     saveButton.classList.add("hidden");
//     clickedButton.classList.add("hidden");
// }

// Makes input element readonly, submits form and hides cancel and save button
function handleSaveButtonClick(clickedButton) {
    // Get element ids
    const inputElementId = clickedButton.getAttribute("data-inputid");
    const formElementId = clickedButton.getAttribute("data-form-id");
    const editButtonId = clickedButton.getAttribute("data-edit-btn-id");

    // Get elements
    const inputElement = document.getElementById(inputElementId);
    const formElement = document.getElementById(formElementId);
    const editButton = document.getElementById(editButtonId);

    // Perform actions
    inputElement.setAttribute("readonly", true);
    editButton.classList.remove("hidden");
    clickedButton.classList.add("hidden");

    // Perform form submission through AJAX
    const formData = new FormData(formElement);
    const formAction = formElement.action;

    // Make AJAX request
    fetch(formAction, {
        method: "POST", // Adjust method based on your form action
        body: formData,
    })
        .then((response) => response.json()) // Parse response as JSON
        .then((data) => {
            // Handle successful response
            console.log("Success:", data);
            inputElement.value = data[data.field];
        })
        .catch((error) => {
            if (error.response && error.response.status === 400) {
                // Validation error
                const errors = JSON.parse(error.response.data.errors);
                // Access and display specific errors by field
                let errorMessages = "<ul>";
                for (const field in errors) {
                    errorMessages += `<li>${errors[field][0]}</li>`;
                }
                errorMessages += "</ul>";
                const errorDiv = document.getElementById("errorDiv");
                errorDiv.innerHTML = errorMessages;
            } else {
                // Handle other errors
            }
        });
}

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
