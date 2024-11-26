document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default submission

    // Get form fields
    const nameField = document.getElementById('name');
    const emailField = document.getElementById('email');
    const messageField = document.getElementById('message');

    const name = nameField.value.trim();
    const email = emailField.value.trim();
    const message = messageField.value.trim();

    // Clear existing error messages
    document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

    // Regular expressions for validation
    const nameRegex = /^[a-zA-Z\s]+$/; // Only letters and spaces
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // Track validation success
    let isValid = true;

    // Validate Name
    if (name === '') {
        showError(nameField, 'Name is required.');
        isValid = false;
    } else if (!nameRegex.test(name)) {
        showError(nameField, 'Name can only contain letters and spaces.');
        isValid = false;
    }

    // Validate Email
    if (email === '') {
        showError(emailField, 'Email is required.');
        isValid = false;
    } else if (!emailRegex.test(email)) {
        showError(emailField, 'Please enter a valid email address.');
        isValid = false;
    }

    // Validate Message
    if (message === '') {
        showError(messageField, 'Message is required.');
        isValid = false;
    }

    // If valid, submit the form (or do further processing)
    if (isValid) {
        alert('Form submitted successfully!');
        this.submit(); // Replace this with AJAX if necessary
    }
});

// Helper function to display error messages
function showError(inputElement, message) {
    const errorElement = inputElement.nextElementSibling; // Target the <small> element
    if (errorElement) {
        errorElement.textContent = message;
        errorElement.style.color = 'red'; // Optional: style the error message
        errorElement.style.fontSize = '0.85rem';
    }
}
