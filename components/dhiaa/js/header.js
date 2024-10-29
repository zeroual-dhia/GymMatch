window.onload = () => {
    let header = document.querySelector('#header');
    let profile_btn=document.querySelector('.dropdown');
    let dropdown=document.querySelector('.dropdown-content');
    
    const scrollPoint = 400;

    window.addEventListener('scroll', () => {
        if (window.scrollY > scrollPoint) {
            header.classList.add('active1');
            header.style.position="fixed";
            
        } else {
            header.classList.remove('active1');
            header.style.position="absolute";
        }

    });
    

};