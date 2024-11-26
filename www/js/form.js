document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector(".form");
    const gymName = document.getElementById("gymName");
    const location = document.getElementById("location");
    const openingHours = document.getElementById("openingHours");
    const facilities = document.getElementById("facilities");
    const targetGender = document.getElementById("targetGender");
    const activities = document.getElementById("activities");
    const description = document.getElementById("description");
    const membershipPlans = document.getElementById("membershipPlans");
    const timetableFile = document.querySelector(".container-btn-file input[type='file']");
    const imageFile = document.getElementById("file");
    const submitButton = document.getElementById("submit");

    // Function to show error message with smooth transition
    function showError(element, message) {
        const errorMessage = document.createElement("span");
        errorMessage.classList.add("error-message");
        errorMessage.textContent = message;

        // Only show the message if it doesn't already exist
        if (!element.nextElementSibling || !element.nextElementSibling.classList.contains("error-message")) {
            element.insertAdjacentElement("afterend", errorMessage);
            setTimeout(() => errorMessage.classList.add("visible"), 10); // Add 'visible' class with a slight delay for smooth transition
        }
    }

    // Function to clear error message with fade-out effect
    function clearError(element) {
        const errorMessage = element.nextElementSibling;
        if (errorMessage && errorMessage.classList.contains("error-message")) {
            errorMessage.classList.remove("visible");
            setTimeout(() => errorMessage.remove(), 300); // Remove the error message after animation
        }
    }

    // Function to validate text fields with optional regex
    function validateField(field, message, pattern = null) {
        const isValid = pattern ? pattern.test(field.value.trim()) : field.value.trim() !== "";

        if (!isValid) {
            showError(field, message); // Show error if field is invalid
            return false;
        } else {
            clearError(field); // Clear error if field is valid
            return true;
        }
    }

    // Function to validate file fields
    function validateFile(fileInput, message) {
        if (!fileInput.files || fileInput.files.length === 0) {
            showError(fileInput, message); // Show error if no file is selected
            return false;
        } else {
            clearError(fileInput); // Clear error if file is selected
            return true;
        }
    }

    // Regex pattern for "hh:mm Day" format (e.g., "09:00 Monday")
    const openingHoursPattern = /^([01]\d|2[0-3]):[0-5]\d\s+(Monday|Tuesday|Wednesday|Thursday|Friday|Saturday|Sunday)$/;

    // Function to validate the form before submission
    submitButton.addEventListener("click", function (event) {
        event.preventDefault(); // Prevent form submission to allow validation

        let isValid = true;

        // Validate text input fields
        isValid &= validateField(gymName, "Gym name is required.");
        isValid &= validateField(location, "Location is required.");
        isValid &= validateField(openingHours, "Opening hours must be in 'hh:mm Day' format (e.g., '09:00 Monday').", openingHoursPattern);
        isValid &= validateField(facilities, "Facilities information is required.");
        isValid &= validateField(description, "Description is required.");
        isValid &= validateField(membershipPlans, "Membership plans are required.");

        // Validate dropdown selection (Target Gender)
        if (targetGender.value === "") {
            showError(targetGender, "Please select a target gender.");
            isValid = false;
        } else {
            clearError(targetGender); // Clear error if option is selected
        }

        // Validate file inputs (Timetable and Image)
        isValid &= validateFile(timetableFile, "Please upload your timetable.");
        isValid &= validateFile(imageFile, "Please upload an image.");

        // Submit the form if all validations are passed
        if (isValid) {
            form.submit(); // Form will submit if all inputs are valid
        } else {
            // Reload the page after a short delay if validation failed
            setTimeout(() => window.location.reload(), 4000); // Reload after 4 seconds
        }
    });
});
