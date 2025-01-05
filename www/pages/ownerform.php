<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gym Owner Form</title>
    <link rel="stylesheet" href="../css/ownerform.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form id="ownerform" action="../includes/owform.php" method="POST" enctype="multipart/form-data">     
        <h1 class="title">Gym Owner Registration</h1>
        <div class="input-block">
            <input class="input" type="text" name="gymName" id="gymName" required placeholder="Gym Name">
        </div>
        <div class="input-block">
            <input class="input" type="text" name="location" id="location" required placeholder="Location">
        </div>
        <div class="input-block">
            <input class="input" type="text" name="openingHours" id="openingHours" required placeholder="Opening Hours">
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
            <textarea id="activities" name="activities" rows="5" placeholder="Extra activities"></textarea>
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
        
        <!-- Gym image upload button -->
        <div class="input-block fileupload">
            <label for="gymImage" class="custom-file-upload">
                <div class="text">
                    <span>Click to upload image</span>
                </div>
                <input id="gymImage" name="gymImage" type="file">
            </label>
        </div>
       <!-- Membership Plans -->
       <h2>Membership Plans</h2>
    <div id="membershipPlans">
        <div class="membership-plan">
            <h3>Plan 1</h3>
            <input class="input" type="number" name="membershipPrice[]" required placeholder="Price">
            <select class="input" name="membershipDuration[]" required>
                <option value="1 month">1 Month</option>
                <option value="6 months">6 Months</option>
                <option value="1 year">1 Year</option>
            </select>
            <input class="input" type="text" name="membershipOffer[]" placeholder="Offer (Optional)">
        </div>
        <div class="membership-plan">
            <h3>Plan 2</h3>
            <input class="input" type="number" name="membershipPrice[]" required placeholder="Price">
            <select class="input" name="membershipDuration[]" required>
                <option value="1 month">1 Month</option>
                <option value="6 months">6 Months</option>
                <option value="1 year">1 Year</option>
            </select>
            <input class="input" type="text" name="membershipOffer[]" placeholder="Offer (Optional)">
        </div>
        <div class="membership-plan">
            <h3>Plan 3</h3>
            <input class="input" type="number" name="membershipPrice[]" required placeholder="Price">
            <select class="input" name="membershipDuration[]" required>
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

<script src="../js/form.js"></script>
<script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("ownerform");

            form.addEventListener("submit", function (event) {
                const requiredFields = ["gymName", "location", "openingHours", "targetGender", "description"];
                let isValid = true;

                requiredFields.forEach((field) => {
                    const input = document.getElementById(field);
                    if (!input.value.trim()) {
                        alert(`${field} is required.`);
                        isValid = false;
                    }
                });

                const timetableInput = document.getElementById("timetable");
                const gymImageInput = document.getElementById("gymImage");

                if (!timetableInput.files.length) {
                    alert("Timetable file is required.");
                    isValid = false;
                }

                if (!gymImageInput.files.length) {
                    alert("Gym image is required.");
                    isValid = false;
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
