
document.querySelectorAll(".action").forEach(element => {
    element.addEventListener('click', () => {
        window.location.href = "/components/dhiaa/html/payment.html"; // Relative path to payment.html
    });
});
