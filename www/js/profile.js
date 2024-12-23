
let inputs = document.querySelectorAll("input");
let initialValues={};
 initialValues = {
    username: document.querySelector(".username").value,
    name: document.querySelector(".namee").value,
    phone: document.querySelector(".phone").value,
    date:document.querySelector(".datee").value,
    status:document.querySelector(".statuss").value,
    gender: document.querySelector(".genderr").value,
    email: document.querySelector(".input-mail").value,
    bib: document.querySelector(".biography").value
  };
  




let savedValues={};
  function savevalues(){
savedValues={


    username: document.querySelector(".username").value,
    name: document.querySelector(".namee").value,
    phone: document.querySelector(".phone").value,
    date:document.querySelector(".datee").value,
    status:document.querySelector(".statuss").value,
    gender: document.querySelector(".genderr").value,
    email: document.querySelector(".input-mail").value,
    bio: document.querySelector(".biography").value
}


  }
  function loadFormData() {
    if (localStorage.getItem('username')) {
        document.querySelector('.username').value = localStorage.getItem('username');
    }
    if (localStorage.getItem('namee')) {
        document.querySelector('.namee').value = localStorage.getItem('namee');
    }
    if (localStorage.getItem('phone')) {
        document.querySelector('.phone').value = localStorage.getItem('phone');
    }
    if (localStorage.getItem('input-mail')) {
        document.querySelector('.input-mail').value = localStorage.getItem('input-mail');
    }
    if (localStorage.getItem('statuss')) {
        document.querySelector('.statuss').value = localStorage.getItem('statuss');
    }
    if (localStorage.getItem('gender')) {
        
        document.querySelector(".genderr").value= localStorage.getItem('gender');
    }
    if (localStorage.getItem('bio')) {
        document.querySelector('.biography').value = localStorage.getItem('bio');
    }
    if (localStorage.getItem('date')) {
        document.querySelector('.datee').value = localStorage.getItem('date');
    }
}

  function saveFormData() {
    
    localStorage.setItem('username', document.querySelector('.username').value);
    localStorage.setItem('namee', document.querySelector('.namee').value);
    localStorage.setItem('phone', document.querySelector('.phone').value);
    localStorage.setItem('input-mail', document.querySelector('.input-mail').value);
    localStorage.setItem('statuss', document.querySelector('.statuss').value);
    localStorage.setItem('date', document.querySelector('.datee').value);
    localStorage.setItem('bio', document.querySelector('.biography').value);
    localStorage.setItem('gender',document.querySelector(".genderr").value);
}
document.querySelector(".button-a").addEventListener('click',()=>{
    window.open("https://www.linkedin.com/signup?_l=fr&trk=guest_homepage-basic_nav-header-join", "_blank");
   
    
})
document.querySelector(".logout").addEventListener('click',()=>{

    window.location.href="/components/dounia/gym-match/home/index.html";
})
document.querySelector(".deleteacc").addEventListener('click',()=>{

    const password = prompt("Please enter your password to confirm account deletion:");

    if (password) {
      
      deleteAccount(password);
    } else {
      alert("Account deletion canceled.");
    }

})


function deleteAccount(password) {
    
    fetch("http://127.0.0.1:54497/api/endpoint", {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({ password: password })
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        alert("Account deleted successfully.");
      
        window.location.href = "/components/dounia/gym-match/home/index.html";
      } else {
        alert("Failed to delete account. Incorrect password or other error.");
      }
    })
    .catch(error => {
      console.error("Error:", error);
      alert("An error occurred. Please try again.");
    });
  }


  function updateInitialValues() {
    initialValues = {
        username: document.querySelector(".username").value,
        name: document.querySelector(".namee").value,
        phone: document.querySelector(".phone").value,
        date:document.querySelector(".datee").value,
        status:document.querySelector(".statuss").value,
        gender: document.querySelector(".genderr").value,
        email: document.querySelector(".input-mail").value,
        bib: document.querySelector(".biography").value
    };
  }
  document.querySelector(".edit").addEventListener('click',()=>{
    savevalues();
    inputs.forEach(input => input.disabled = false);
    

    document.querySelector(".button-b").style.visibility="visible";
    document.querySelector(".button-c").style.visibility="visible";
    
  })
  document.querySelector(".button-b").addEventListener('click',function(event){
    
    event.preventDefault();

    
    if (!validateform()) {
        
      return; 
    }

   
    inputs.forEach(input => input.disabled = true);
    document.querySelector(".button-b").style.visibility = "hidden";
    document.querySelector(".button-c").style.visibility = "hidden";

    
    updateInitialValues();


  })

  function discardChanges() {
    document.querySelector(".username").value = savedValues.username;
    document.querySelector(".namee").value = savedValues.name;
    document.querySelector(".phone").value = savedValues.phone;
    document.querySelector(".input-mail").value = savedValues.email;
    document.querySelector(".datee").value = savedValues.date;
    document.querySelector(".statuss").value = savedValues.status;
    document.querySelector(".biography").value = savedValues.bio;
    document.querySelector(".genderr").value = savedValues.gender;
    
    
}
  document.querySelector(".button-c").addEventListener('click',()=>{
    discardChanges();
    inputs.forEach(input => input.disabled = true);
    document.querySelector(".button-b").style.visibility="hidden";
    document.querySelector(".button-c").style.visibility="hidden";
   
  updateInitialValues();
  clearErrors()
    
  })
  
function showError(inputSelector, message) {
  const inputElement = document.querySelector(inputSelector);
  let errorElement = inputElement.nextElementSibling;

  // Check if an error message element already exists; if not, create one.
  if (!errorElement || !errorElement.classList.contains('error-message')) {
      errorElement = document.createElement('span');
      errorElement.className = 'error-message';
      errorElement.style.color = 'red';
      errorElement.style.fontSize = '0.875em';
      inputElement.parentNode.insertBefore(errorElement, inputElement.nextSibling);
  }

  // Set the error message.
  errorElement.textContent = message;
}

function clearErrors() {
  const errorMessages = document.querySelectorAll('.error-message');
  errorMessages.forEach((errorElement) => {
      errorElement.textContent = '';
  });
}
function isValidDate(dateString) {
  // Attempt to parse the string into a date object
  const date = new Date(dateString);

  // Check if the date is invalid or if the input string results in an invalid date
  if (isNaN(date.getTime())) {
      return false; // Invalid date
  }

  // Additional check: ensure the date string matches the expected format (e.g., YYYY-MM-DD)
  const regex = /^\d{4}-\d{2}-\d{2}$/;
  if (!regex.test(dateString)) {
      return false; // Input doesn't match the expected format
  }

  // Ensure the date object correctly represents the input string (e.g., no auto-correction like Feb 30 -> Mar 2)
  const [year, month, day] = dateString.split('-').map(Number);
  if (
    date.getFullYear() !== year ||
    date.getMonth() !== month - 1 || // Months are 0-based in JavaScript Date
    date.getDate() !== day
) {
    return false; // Date components don't match
}

// Check if the date is in the past
const today = new Date();
today.setHours(0, 0, 0, 0); // Normalize today's date to midnight
return date < today; // Returns true if the date is in the past
}
function validateform() {
  clearErrors(); // Clear previous error messages.

  let isValid = true;

  const username = document.querySelector(".username").value;
  const name = document.querySelector(".namee").value;
  const phone = document.querySelector(".phone").value;
  const status = document.querySelector(".statuss").value;
  const gender = document.querySelector(".genderr").value;
  const email = document.querySelector(".input-mail").value;
  const date = document.querySelector(".datee").value;

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
  if (phone.length > 15) {
      showError(".phone", "Phone num less than 15 digits.");
      isValid = false;
  } else if (!phoneRegex.test(phone)) {
      showError(".phone", "Incorrect phone format.");
      isValid = false;
  }
  if (!["trainer", "member", "gymowner"].includes(status.toLowerCase())) {
      showError(".statuss", "Invalid status.");
      isValid = false;
  }
  if (!["male", "female"].includes(gender.toLowerCase())) {
      showError(".genderr", "Invalid gender.");
      isValid = false;
  }
  if (!emailRegex.test(email)) {
      showError(".input-mail", "Invalid email format.");
      isValid = false;
  }
  if (!isValidDate(date) ) {
      showError(".datee", "Invalid date format.");
      isValid = false;
  }

  return isValid;
}


 window.addEventListener('load', loadFormData);

 document.querySelector(".info-section").addEventListener('input', saveFormData);

 


 const profilePicture = document.querySelector(".image");
 const uploadPicture = document.getElementById("upload-picture");

 window.addEventListener("load", () => {
    const savedImage = localStorage.getItem("profilePicture");
    if (savedImage) {
        profilePicture.src = savedImage;
    }
});

// When the profile picture is clicked, open the file input
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
            localStorage.setItem("profilePicture", e.target.result); // Save the image to local storage
        };
        reader.readAsDataURL(file); 
    }
});









document.querySelector('.dark-mode-toggle').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    localStorage.setItem('darkMode', document.body.classList.contains('dark-mode'));
});

// Check for dark mode setting on load
window.addEventListener('load', function() {
    if (localStorage.getItem('darkMode') === 'true') {
        document.body.classList.add('dark-mode');
    }
});
window.addEventListener('load', function() {
    // Check if there's a stored scroll position
    if (localStorage.getItem('scrollPosition')) {
        window.scrollTo(0, localStorage.getItem('scrollPosition'));
    }
});

window.addEventListener('scroll', function() {
    // Save the current scroll position
    localStorage.setItem('scrollPosition', window.scrollY);
});