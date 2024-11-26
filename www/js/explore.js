document.addEventListener("DOMContentLoaded", () => {
    const gymList = document.querySelector(".gym-list");
    const searchInput = document.getElementById("nameInput");

    // Sample data for gyms (this can be replaced with actual data or fetched from an API)
    let gyms = [
        { name: "Powerhouse Gym", location: "Downtown", facilities: "Weightlifting, Cardio, Classes", imageSrc: "class-1.jpg" },
        { name: "Fitness Zone", location: "Uptown", facilities: "Swimming, Yoga, Personal Training", imageSrc: "gym2pic.jpg" },
        { name: "Bodybuilding Factory", location: "East Side", facilities: "Bodybuilding, Nutrition Counseling", imageSrc: "gym3.webp" },
        { name: "Flex Gym", location: "West End", facilities: "CrossFit, Yoga, Cardio", imageSrc: "gym-placeholder.jpg" },
        { name: "Total Fitness", location: "North Side", facilities: "Cardio, Weightlifting, Classes", imageSrc: "gym-placeholder.jpg" },
        { name: "Strength Zone", location: "South City", facilities: "Bodybuilding, Cardio, Yoga", imageSrc: "gym-placeholder.jpg" }
    ];
    // Function to create a new gym card
    function createGymCard(gym) {
        const gymCard = document.createElement("div");
        gymCard.classList.add("gym-card");

        gymCard.innerHTML = `
            <a href="info.html" class="gym-link">
                <img src="${gym.imageSrc}" alt="${gym.name}">
                <h3>${gym.name}</h3>
                <p>Location: ${gym.location}<br>Facilities: ${gym.facilities}</p>
            </a>
        `;

        return gymCard;
    }

    // Function to render gyms on the page
    function renderGyms(filteredGyms = gyms) {
        gymList.innerHTML = ""; // Clear existing gyms
        filteredGyms.forEach(gym => {
            const gymCard = createGymCard(gym);
            gymList.appendChild(gymCard);
        });
    }

    // Search filter function
    function filterGyms() {
        const query = searchInput.value.toLowerCase();
        const filteredGyms = gyms.filter(gym => 
            gym.name.toLowerCase().includes(query) || 
            gym.location.toLowerCase().includes(query)
        );
        renderGyms(filteredGyms); // Re-render gyms based on the search query
    }

    // Event listener for search input
    searchInput.addEventListener("input", filterGyms);

    // Initial render
    renderGyms();
});
