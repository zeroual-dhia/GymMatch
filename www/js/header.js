window.onload = () => {
    const links = document.querySelectorAll('.links a,.pages a'); 
    let activeLink = document.querySelector('.active');
    const currentPath =  window.location.pathname.split('/').pop()
    const preloader = document.getElementById('preloder');
    

     //preloader :
    if (preloader) {
        setTimeout(() => {
            preloader.style.transition = 'opacity 0.5s ease';  
            preloader.style.opacity = '0'; 

            setTimeout(() => {
                preloader.style.display = 'none';  
            }, 500); 
        }, 200); 
    }
    console.log('1');

    console.log(currentPath);
     //menu :

    links.forEach((link) => {
        ChangeLink(link);
    });

    function ChangeLink(link) {
        
        if (currentPath === link.getAttribute('href')) {
            activeLink?.classList.remove('active'); 
            link.classList.add('active');
            activeLink = link;
        }
    }
};
