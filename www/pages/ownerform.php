<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gym Owner Form</title>
    <link rel="stylesheet" href="www/css/ownerform.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form id="ownerform" action="www/includes/owform.php" method="POST" enctype="multipart/form-data">
        <h1 class="title">Gym Owner Registration</h1>
        <div class="input-block">
            <input class="input" type="text" name="gymName" id="gymName" required placeholder="Gym Name">
        </div>
        <div class="input-block">
            <input class="input" type="text" name="location" id="location" required placeholder="Location">
        </div>
        <div class="input-block">
            <input class="input" type="text" name="openingHours" id="openingHours" required placeholder="ex:09:00">
        </div>
        <div class="input-block">
            <select class="input" name="targetGender" id="targetGender" required>
                <option value="" disabled selected>Target Gender</option>
                <option value="women">Women</option>
                <option value="men">Men</option>
                <option value="both">Both</option>
            </select>
        </div>
        <div class="input-block">
            <textarea id="activities" name="activities" rows="5" placeholder="Extra activities (Optional)"></textarea>
        </div>
        <div class="input-block">
            <textarea class="input" name="description" id="description" required rows="5" placeholder="Description"></textarea>
        </div>

        <!-- Timetable upload button -->
        <button class="container-btn-file">
            <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 50 50">
                <path d="M28.8125 .03125L.8125 5.34375C.339844 5.433594 0 5.863281 0 6.34375L0 43.65625C0 44.136719 .339844 44.566406 .8125 44.65625L28.8125 49.96875C28.875 49.980469 28.9375 50 29 50C29.230469 50 29.445313 49.929688 29.625 49.78125C29.855469 49.589844 30 49.296875 30 49L30 1C30 .703125 29.855469 .410156 29.625 .21875C29.394531 .0273438 29.105469 -.0234375 28.8125 .03125ZM32 6L32 13L34 13L34 15L32 15L32 20L34 20L34 22L32 22L32 27L34 27L34 29L32 29L32 35L34 35L34 37L32 37L32 44L47 44C48.101563 44 49 43.101563 49 42L49 8C49 6.898438 48.101563 6 47 6ZM36 13L44 13L44 15L36 15ZM6.6875 15.6875L11.8125 15.6875L14.5 21.28125C14.710938 21.722656 14.898438 22.265625 15.0625 22.875L15.09375 22.875C15.199219 22.511719 15.402344 21.941406 15.6875 21.21875L18.65625 15.6875L23.34375 15.6875L17.75 24.9375L23.5 34.375L18.53125 34.375L15.28125 28.28125C15.160156 28.054688 15.035156 27.636719 14.90625 27.03125L14.875 27.03125C14.8125 27.316406 14.664063 27.761719 14.4375 28.34375L11.1875 34.375L6.1875 34.375L12.15625 25.03125ZM36 20L44 20L44 22L36 22ZM36 27L44 27L44 29L36 29ZM36 35L44 35L44 37L36 37Z"></path>
            </svg>
            Upload your timetable
            <input class="file" name="timetable" type="file">
        </button>
        <br>
        <!-- Gym image upload button -->
        <div class="file-section">
            <div class="pic-profile">
            <label for="pic-profile" class="custum-file-upload">
                <div class="icon">
                    <svg viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" fill=""></path>
                        </g>
                    </svg>
                </div>
                <div class="text">
                    <span>Click to upload profile picture</span>
                </div>
                <input id="pic-profile" name="pic-profile" type="file">
            </label>
        </div>
        </div>

        <!-- Membership Plans -->
        <h2><center>Membership Plans</center></h2>
        <div id="membershipPlans">
            <div class="membership-plan">
                <h3>Plan 1</h3>
                <input class="input" type="number" name="membershipPrice[]" required placeholder="Price">
                <select class="input" name="membershipDuration[]" required>
                    <option value="" disabled selected>Select duration</option>
                    <option value="1 month">1 Month</option>
                    <option value="6 months">6 Months</option>
                    <option value="1 year">1 Year</option>
                </select>
                <input class="input" type="text" name="membershipOffer[]" placeholder="Offer (Optional)">
            </div>
            <div class="membership-plan">
                <h3>Plan 2</h3>
                <input class="input" type="number" name="membershipPrice[]" placeholder="Price">
                <select class="input" name="membershipDuration[]">
                    <option value="" disabled selected>Select duration</option>
                    <option value="1 month">1 Month</option>
                    <option value="6 months">6 Months</option>
                    <option value="1 year">1 Year</option>
                </select>
                <input class="input" type="text" name="membershipOffer[]" placeholder="Offer (Optional)">
            </div>
            <div class="membership-plan">
                <h3>Plan 3</h3>
                <input class="input" type="number" name="membershipPrice[]" placeholder="Price">
                <select class="input" name="membershipDuration[]">
                    <option value="" disabled selected>Select duration</option>
                    <option value="1 month">1 Month</option>
                    <option value="6 months">6 Months</option>
                    <option value="1 year">1 Year</option>
                </select>
                <input class="input" type="text" name="membershipOffer[]" placeholder="Offer (Optional)">
            </div>
        </div>

        <div class="input-block submit">
            <button type="submit" id="submit">Submit</button>
        </div>
    </form>

    <script src="www/js/form.js"></script>
    <script>
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
    </script>
</body>

</html>
