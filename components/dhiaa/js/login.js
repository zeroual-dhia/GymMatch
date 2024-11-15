const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

document.querySelector('.form-up').addEventListener('submit',(event)=>{
    formvalidation(event);
})



function formvalidation (event){

    event.preventDefault();

    const Name =document.getElementById('Name').value;
    const Email=document.getElementById('Email').value;
    const Phone=document.getElementById('phone').value;
    const age =document.getElementById('age').value;
    const password=document.getElementById('password').value;


    const nameError=document.getElementById('name-error')
    
    const phoneError = document.getElementById(
        "phone-error"
    );
    const emailError = document.getElementById(
        "email-error"
    );
    const passwordError = document.getElementById(
        "password-error"
    );
    const ageError =document.getElementById("age-error") ;
    
    nameError.textContent="";
    phoneError.textContent="";
    emailError.textContent="";
    passwordError.textContent="";
    ageError.textContent="";
    
    let isvalid=true ;

    //name :
    if(Name===''){
        nameError.textContent="Name is required";
        isvalid=false;
    }

    //email :

    if(!/^[A-Za-z0-9]+@gmail\.com$/.test(Email)){
         emailError.textContent="enter a valid email :...@gmail.com";
         isvalid=false
    }

     //phone :
     if(!/^0[567][0-9]{8}$/.test(Phone)){
       phoneError.textContent="enter a valid phone number ex:0555662222" ;
       isvalid=false;

     }

     //age

     if(age<=16 || age>=70){
        ageError.textContent="age must be between 16 y.o and 70 y.o";
        isvalid=false;
     }

     //password 
     if(password.length<8 ||isNaN(password)){
       passwordError.textContent="password must contain at least 8 characters";
       isvalid=false;
     }

   // real time validity checking 


    return isvalid ;
}



document.getElementById('Name').addEventListener('input', () => {
    const nameError = document.getElementById('name-error');
    if (document.getElementById('Name').value !== '') {
        nameError.textContent = "";
    }
});

document.getElementById('Email').addEventListener('input', () => {
    const emailError = document.getElementById('email-error');
    if (/^[A-Za-z0-9]+@gmail\.com$/.test(document.getElementById('Email').value)) {
        emailError.textContent = "";
    }
});

document.getElementById('phone').addEventListener('input', () => {
    const phoneError = document.getElementById('phone-error');
    if (/^0[567][0-9]{8}$/.test(document.getElementById('phone').value)) {
        phoneError.textContent = "";
    }
});

document.getElementById('age').addEventListener('input', () => {
    const ageError = document.getElementById('age-error');
    const age = document.getElementById('age').value;
    if (age >= 16 && age <= 70) {
        ageError.textContent = "";
    }
});

document.getElementById('password').addEventListener('input', () => {
    const passwordError = document.getElementById('password-error');
    const password = document.getElementById('password').value;
    if (password.length >= 8 && !isNaN(password)) {
        passwordError.textContent = "";
    }
});




