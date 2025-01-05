let inputs = document.querySelectorAll("input");
let initialValues = {};
let savedValues = {};

// Load form data dynamically from the server
function loadFormData() {
    resetLocalStorage();

    document.querySelector('.username').value = document.querySelector('.username').getAttribute("value");
    document.querySelector('.namee').value = document.querySelector('.namee').getAttribute("value");
    document.querySelector('.phone').value = document.querySelector('.phone').getAttribute("value");
    document.querySelector('.input-mail').value = document.querySelector('.input-mail').getAttribute("value");
    document.querySelector('.statuss').value = document.querySelector('.statuss').getAttribute("value");
    document.querySelector('.agee').value = document.querySelector('.agee').getAttribute("value");
    document.querySelector('.genderr').value = document.querySelector('.genderr').getAttribute("value");
    document.querySelector('.biography').value = document.querySelector('.biography').getAttribute("value");
}

function resetLocalStorage() {
    localStorage.clear();
}

function saveValues() {
    savedValues = {
        username: document.querySelector(".username").value,
        name: document.querySelector(".namee").value,
        phone: document.querySelector(".phone").value,
        age: document.querySelector(".agee").value,
        status: document.querySelector(".statuss").value,
        gender: document.querySelector(".genderr").value,
        email: document.querySelector(".input-mail").value,
        bio: document.querySelector(".biography").value
    };
}

function updateInitialValues() {
    initialValues = { ...savedValues };
}

function discardChanges() {
    document.querySelector(".username").value = savedValues.username;
    document.querySelector(".namee").value = savedValues.name;
    document.querySelector(".phone").value = savedValues.phone;
    document.querySelector(".input-mail").value = savedValues.email;
    document.querySelector(".agee").value = savedValues.age;
    document.querySelector(".statuss").value = savedValues.status;
    document.querySelector(".biography").value = savedValues.bio;
    document.querySelector(".genderr").value = savedValues.gender;
}

document.querySelector(".edit").addEventListener('click', () => {
    saveValues();
    inputs.forEach(input => input.disabled = false);
    document.querySelector(".button-b").style.visibility = "visible";
    document.querySelector(".button-c").style.visibility = "visible";
});

document.querySelector(".button-b").addEventListener('click', function (event) {
    event.preventDefault();

    if (!validateForm()) {
        return;
    }

    const formData = new FormData();
    formData.append('username', document.querySelector(".username").value);
    formData.append('name', document.querySelector(".namee").value);
    formData.append('phone', document.querySelector(".phone").value);
    formData.append('age', document.querySelector(".agee").value);
    formData.append('status', document.querySelector(".statuss").value);
    formData.append('gender', document.querySelector(".genderr").value);
    formData.append('email', document.querySelector(".input-mail").value);
    formData.append('bio', document.querySelector(".biography").value);

    const fileInput = document.getElementById("upload-picture");
    if (fileInput.files.length > 0) {
        formData.append('profilePicture', fileInput.files[0]);
    }

    fetch('../includes/update_profile.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Profile updated successfully!");
            updateInitialValues();
            inputs.forEach(input => input.disabled = true);
            document.querySelector(".button-b").style.visibility = "hidden";
            document.querySelector(".button-c").style.visibility = "hidden";

            if (fileInput.files.length > 0) {
                // Update the profile picture dynamically
                profilePicture.src = URL.createObjectURL(fileInput.files[0]);
            }
        } else {
            alert("Error updating profile: " + data.message);
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("An error occurred while updating your profile.");
    });
});
document.querySelector(".deleteacc").addEventListener("click", function () {
  // Confirm deletion
  if (!confirm("Are you sure you want to delete your account? This action cannot be undone.")) {
      return;
  }

  // Hardcoded user_id for testing
  const userId = 4;

  // Send a request to the server to delete the account
  fetch('../includes/delete_profile.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({ user_id: 4 })
})
.then(response => {
    // Check if the response is actually JSON
    return response.json();
})
.then(data => {
    if (data.success) {
        alert("Your account has been successfully deleted.");
        window.location.href = "../pages/home.php";
    } else {
        alert("Error deleting account: " + data.message);
    }
})
.catch(error => {
    console.error("Error:", error);
    alert("An error occurred while deleting your account.");
});


});



document.querySelector(".button-c").addEventListener('click', () => {
    discardChanges();
    inputs.forEach(input => input.disabled = true);
    document.querySelector(".button-b").style.visibility = "hidden";
    document.querySelector(".button-c").style.visibility = "hidden";
    updateInitialValues();
    clearErrors();
});

const profilePicture = document.querySelector(".image");
const uploadPicture = document.getElementById("upload-picture");

// Open file input when profile picture is clicked
profilePicture.addEventListener("click", () => {
    uploadPicture.click();
});

// Handle the image file selection
uploadPicture.addEventListener("change", () => {
    const file = uploadPicture.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            profilePicture.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

document.querySelector('.dark-mode-toggle').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
});

window.addEventListener('load', function() {
    if (localStorage.getItem('darkMode') === 'true') {
        document.body.classList.add('dark-mode');
    }
});

window.addEventListener('load', function() {
    if (localStorage.getItem('scrollPosition')) {
        window.scrollTo(0, localStorage.getItem('scrollPosition'));
    }
});

window.addEventListener('scroll', function() {
    localStorage.setItem('scrollPosition', window.scrollY);
});

function showError(inputSelector, message) {
    const inputElement = document.querySelector(inputSelector);
    let errorElement = inputElement.nextElementSibling;

    if (!errorElement || !errorElement.classList.contains('error-message')) {
        errorElement = document.createElement('span');
        errorElement.className = 'error-message';
        errorElement.style.color = 'red';
        errorElement.style.fontSize = '0.875em';
        inputElement.parentNode.insertBefore(errorElement, inputElement.nextSibling);
    }

    errorElement.textContent = message;
}

function clearErrors() {
    const errorMessages = document.querySelectorAll('.error-message');
    errorMessages.forEach((errorElement) => {
        errorElement.textContent = '';
    });
}

function isValidAge(ageString) {
    const age = parseInt(ageString);
    return !isNaN(age) && age >= 14 && age <= 70;
}

function validateForm() {
    clearErrors();
    let isValid = true;

    const username = document.querySelector(".username").value;
    const name = document.querySelector(".namee").value;
    const phone = document.querySelector(".phone").value;
    const email = document.querySelector(".input-mail").value;
    const age = document.querySelector(".agee").value;

    const phoneRegex = /^([0]{1}[5-7]{1}[0-9]{8})$/;
    const emailRegex = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;

    if (username.length < 5) {
        showError(".username", "Username too short.");
        isValid = false;
    }
    if (name.length < 5) {
        showError(".namee", "Name too short.");
        isValid = false;
    }
    if (!phoneRegex.test(phone)) {
        showError(".phone", "Invalid phone number.");
        isValid = false;
    }
    if (!emailRegex.test(email)) {
        showError(".input-mail", "Invalid email.");
        isValid = false;
    }
    if (!isValidAge(age)) {
        showError(".agee", "Age must be between 14 and 70.");
        isValid = false;
    }

    return isValid;

    
}

window.addEventListener('load', loadFormData);
