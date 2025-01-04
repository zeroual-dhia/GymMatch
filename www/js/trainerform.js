document.querySelector("form").addEventListener("submit", function (e) {
  e.preventDefault(); // Prevent form submission

  // Clear previous error messages
  document.querySelectorAll(".error-message").forEach((msg) => msg.remove());

  let isValid = true;

  // Validation function
  const addErrorMessage = (input, message) => {
    const error = document.createElement("div");
    error.className = "error-message";
    error.style.color = "red";
    error.textContent = message;
    input.parentElement.appendChild(error);
    isValid = false;
  };

  // Full Name validation
  const fullName = document.getElementById("trainerName");
  if (fullName && fullName.value.trim().length < 5) {
    addErrorMessage(fullName, "Full Name must be at least 5 characters.");
  }

  // Address validation
  const address = document.getElementById("Address");
  if (address && address.value.trim().length < 8) {
    addErrorMessage(address, "Address must be at least 8 characters.");
  }

  // Email validation
  const email = document.getElementById("email");
  if (email && !email.value.trim().match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
    addErrorMessage(email, "Please enter a valid email address.");
  }

  // Phone Number validation
  const phoneNumber = document.getElementById("phone number");
  if (phoneNumber && !phoneNumber.value.trim().match(/^\+213[567]\d{8}$/)) {
    addErrorMessage(
      phoneNumber,
      "Phone number must start with +2135, +2136, or +2137 followed by 8 digits."
    );
  }

  // Gender validation
  const gender = document.getElementById("Gender");
  if (gender && !gender.value) {
    addErrorMessage(gender, "Please select your gender.");
  }

  // Services validation
  const services = document.getElementById("Services");
  if (services && !services.value) {
    addErrorMessage(services, "Please select at least one service.");
  }

  // Gender Preference validation
  const genderPreference = document.getElementById("Gender preference");
  if (genderPreference && !genderPreference.value) {
    addErrorMessage(genderPreference, "Please select a gender preference.");
  }

  // Profile Picture validation
  const profileImage = document.getElementById("pic-profile"); // Corrected ID
  if (profileImage && !profileImage.files.length) {
    addErrorMessage(profileImage, "Please upload a profile picture.");
  }

  // CV Upload validation
  const cvUpload = document.getElementById("CV"); // Corrected ID
  if (cvUpload && !cvUpload.files.length) {
    addErrorMessage(cvUpload, "Please upload your CV.");
  }

  // If all inputs are valid, proceed with form submission
  if (isValid) {
    alert("Form submitted successfully!");
    e.target.submit();
  }
});
