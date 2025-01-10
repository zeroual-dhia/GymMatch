document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("#ownerform");
    const submitButton = document.getElementById("submit");

    // Function to show error messages
    function showError(element, message) {
        const errorMessage = document.createElement("span");
        errorMessage.classList.add("error-message");
        errorMessage.textContent = message;

        if (!element.nextElementSibling || !element.nextElementSibling.classList.contains("error-message")) {
            element.insertAdjacentElement("afterend", errorMessage);
            setTimeout(() => errorMessage.classList.add("visible"), 10);
        }
    }

    // Function to clear error messages
    function clearError(element) {
        const errorMessage = element.nextElementSibling;
        if (errorMessage && errorMessage.classList.contains("error-message")) {
            errorMessage.classList.remove("visible");
            setTimeout(() => errorMessage.remove(), 300);
        }
    }

    // Validation function
    function validateField(field, message) {
        if (field.value.trim() === "") {
            showError(field, message);
            return false;
        } else {
            clearError(field);
            return true;
        }
    }

    // Handle form submission
    submitButton.addEventListener("click", async function (event) {
       // Prevent default form submission

        let isValid = true;

        isValid &= validateField(document.getElementById("gymName"), "Gym name is required.");
        isValid &= validateField(document.getElementById("location"), "Location is required.");
        isValid &= validateField(document.getElementById("openingHours"), "Opening hours are required.");
        isValid &= validateField(document.getElementById("activities"), "Activities are required.");
        isValid &= validateField(document.getElementById("description"), "Description is required.");
        const targetGender = document.getElementById("targetGender");
        if (targetGender.value === "") {
            showError(targetGender, "Please select a target gender.");
            isValid = false;
        } else {
            clearError(targetGender);
        }

        if (!isValid) {
            return; // Stop submission if validation fails
        }

        const formData = new FormData(form);

        try {
            const response = await fetch(form.action, {
                method: "POST",
                body: formData,
            });

            if (response.ok) {
                alert("Form submitted successfully!");
                form.reset(); // Reset the form
            } else {
                alert("Submission failed. Please try again.");
            }
        } catch (error) {
            console.error("Submission error:", error);
            alert("An error occurred. Please try again.");
        }
    });
});








