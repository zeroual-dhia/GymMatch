window.onload = () => {
    const header = document.querySelector('#header');
    const links = document.querySelectorAll('.links a'); 
    let activeLink = document.querySelector('.active');
    const currentPath = window.location.pathname;
    const scrollPoint = 400;
    const preloader = document.getElementById('preloder');
    const pages=document.querySelectorAll('.pages a');

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



     //header :
    window.addEventListener('scroll', () => {
        if (window.scrollY > scrollPoint) {
            header.classList.add('active1');
            header.style.position = "fixed";
        } else {
            header.classList.remove('active1');
            header.style.position = "absolute";
        }
    });

   



    
     //menu :
    
    pages.forEach((link) => {
        ChangeLink(link);
    });

 
    
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
