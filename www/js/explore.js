document.addEventListener("DOMContentLoaded", () => {
    const gymList = document.querySelector(".gym-list");
    const searchInput = document.getElementById("nameInput");

    // Function to filter gyms dynamically
    function filterGyms() {
        const query = searchInput.value.toLowerCase();
        const gymCards = gymList.querySelectorAll(".gym-card");

        gymCards.forEach((gymCard) => {
            const gymName = gymCard.querySelector("h3").textContent.toLowerCase();
            const gymLocation = gymCard.querySelector("p").textContent.toLowerCase();

            if (gymName.includes(query) || gymLocation.includes(query)) {
                gymCard.style.display = "block"; // Show matching card
            } else {
                gymCard.style.display = "none"; // Hide non-matching card
            }
        });
    }

    // Event listener for search input
    searchInput.addEventListener("input", filterGyms);
});
