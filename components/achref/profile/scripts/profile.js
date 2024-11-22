
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
        alert("The form is not valid. Please correct the errors and try again.");
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
   
    
  })
  function isValidDate(dateString) {
    const date = Date.parse(dateString);
    return !isNaN(date);
}
  function validateform() {
    let username = document.querySelector(".username").value;
    let name = document.querySelector(".namee").value;
    let phone = document.querySelector(".phone").value;
    let status = document.querySelector(".statuss").value;
    let gender = document.querySelector(".genderr").value;
    let email = document.querySelector(".input-mail").value;
    let date = document.querySelector(".datee").value;

    const phoneRegex = /^([0]{1}[5-7]{1}[0-9]{8})$/;  
    const emailRegex = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;

    if (username.length < 5) {
        alert("Username must be at least 5 characters long.");
        return false;
    } else if (name.length < 5) {
        alert("Name must be at least 5 characters long.");
        return false;
    } else if (phone.length > 15) {
        alert("Phone number should not exceed 15 digits.");
        return false;
    } else if (!phoneRegex.test(phone)) {
        alert("Incorrect phone format.");
        return false;
    } else if (!["trainer", "member", "gymowner"].includes(status.toLowerCase())) {
        alert("Invalid status.");
        return false;
    } else if (!["male", "female"].includes(gender.toLowerCase())) {
        alert("Invalid gender.");
        return false;
    } else if (!emailRegex.test(email)) {
        alert("Invalid email format.");
        return false;
    }
    else if(!isValidDate(date)){
        alert("invalid date format.");
        return false;
    }
    //in the bio u can put anything so no need to validation

    return true;
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