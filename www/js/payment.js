document.querySelector('form').addEventListener('submit', (event) => {
    event.preventDefault(); // Prevent form submission
    // Input elements
    const nameInput = document.querySelector('input[placeholder="Name"]');
    const cardInput = document.querySelector('input[placeholder="1234 5678 435678"]');
    const expiryInput = document.querySelector('input[placeholder="MM/YYYY"]');
    const cvvInput = document.querySelector('input[placeholder="***"]');

    // Error message containers
    const nameError = document.getElementById('name-error');
    const cardError = document.getElementById('card-error');
    const expiryError = document.getElementById('expiry-error');
    const cvvError = document.getElementById('cvv-error');

    clearErrors([nameError, cardError, expiryError, cvvError]);

    let isValid = true;

    if (nameInput.value.trim() === '') {
        nameError.textContent = 'Name is required.';
        isValid = false;
    }

    if (!/^\d{16}$/.test(cardInput.value.trim())) {
        cardError.textContent = 'Card number must be a 16-digit number.';
        isValid = false;
    }

    const expiryValue = expiryInput.value.trim();
    if (!/^(0[1-9]|1[0-2])\/\d{4}$/.test(expiryValue)) {
        expiryError.textContent = 'Enter a valid expiry date (MM/YYYY).';
        isValid = false;
    } else {
        const [month, year] = expiryValue.split('/').map(Number);
        const now = new Date();
        const currentMonth = now.getMonth() + 1; 
        const currentYear = now.getFullYear();

        if (year < currentYear || (year === currentYear && month < currentMonth)) {
            expiryError.textContent = 'Expiry date must be in the future.';
            isValid = false;
        }
    }

    if (!/^\d{3}$/.test(cvvInput.value.trim())) {
        cvvError.textContent = 'CVV must be a 3-digit number.';
        isValid = false;
    }
    
    if (isValid) {
        alert('Payment successful!');
        this.submit();
    }
});


// real time :

document.querySelector('input[placeholder="Name"]').addEventListener('input', (event) => {
    const nameError = document.getElementById('name-error');
    validateName(event.target, nameError);
});

document.querySelector('input[placeholder="1234 5678 435678"]').addEventListener('input', (event) => {
    const cardError = document.getElementById('card-error');
    validateCardNumber(event.target, cardError);
});

document.querySelector('input[placeholder="MM/YYYY"]').addEventListener('input', (event) => {
    const expiryError = document.getElementById('expiry-error');
    validateExpiry(event.target, expiryError);
});

document.querySelector('input[placeholder="***"]').addEventListener('input', (event) => {
    const cvvError = document.getElementById('cvv-error');
    validateCVV(event.target, cvvError);
});

// Validation functions
function validateName(input, errorElement) {
    const isValid = input.value.trim() !== '';
    errorElement.textContent = isValid ? '' : 'Name is required.';
    return isValid;
}

function validateCardNumber(input, errorElement) {
    const isValid = /^\d{16}$/.test(input.value.trim());
    errorElement.textContent = isValid ? '' : 'Card number must be a 16-digit number.';
    return isValid;
}

function validateExpiry(input, errorElement) {
    const value = input.value.trim();
    if (!/^(0[1-9]|1[0-2])\/\d{4}$/.test(value)) {
        errorElement.textContent = 'Enter a valid expiry date (MM/YYYY).';
        return false;
    }

    const [month, year] = value.split('/').map(Number);
    const now = new Date();
    const currentMonth = now.getMonth() + 1; // JavaScript months are 0-based
    const currentYear = now.getFullYear();

    const isValid = !(year < currentYear || (year === currentYear && month < currentMonth));
    errorElement.textContent = isValid ? '' : 'Expiry date must be in the future.';
    return isValid;
}

function validateCVV(input, errorElement) {
    const isValid = /^\d{3}$/.test(input.value.trim());
    errorElement.textContent = isValid ? '' : 'CVV must be a 3-digit number.';
    return isValid;
}

// Function to clear all errors
function clearErrors(errorElements) {
    errorElements.forEach((element) => {
        element.textContent = '';
    });
}