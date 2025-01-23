document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("ownerform");

    form.addEventListener("submit", function (event) {
        let isValid = true; // Tracks overall form validity

        // Helper function to validate a field
        function validateField(input, errorMessage) {
            if (!input.value.trim()) {
                alert(errorMessage);
                isValid = false;
            }
        }

        // Validate required text fields
        const requiredTextFields = [
            { id: "gymName", message: "Gym Name is required." },
            { id: "location", message: "Location is required." },
            { id: "openingHours", message: "Opening Hours are required." },
            { id: "description", message: "Description is required." },
        ];
        requiredTextFields.forEach((field) => {
            const input = document.getElementById(field.id);
            validateField(input, field.message);
        });

        // Validate target gender
        const targetGender = document.getElementById("targetGender");
        if (!targetGender.value) {
            alert("Target Gender is required.");
            isValid = false;
        }

        // Validate file uploads
        const timetableInput = document.querySelector('input[name="timetable"]');
        if (!timetableInput.files.length) {
            alert("Timetable file is required.");
            isValid = false;
        }

        const gymImageInput = document.getElementById("gymImage");
        if (!gymImageInput.files.length) {
            alert("Gym image is required.");
            isValid = false;
        }

        // Validate Plan 1 (mandatory)
        const firstPlan = document.querySelector("#membershipPlans .membership-plan:first-child");
        const plan1Price = firstPlan.querySelector('input[name="membershipPrice[]"]');
        const plan1Duration = firstPlan.querySelector('select[name="membershipDuration[]"]');

        if (!plan1Price.value.trim()) {
            alert("Price for Plan 1 is required.");
            isValid = false;
        }
        if (!plan1Duration.value) {
            alert("Duration for Plan 1 is required.");
            isValid = false;
        }

        // Prevent submission if validation fails
        if (!isValid) {
            event.preventDefault();
        }
    });
});
