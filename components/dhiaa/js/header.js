
document.addEventListener('DOMContentLoaded',()=>{
    let header = document.querySelector('#header');
    const scrollpoint=100 ;
    
    
    window.addEventListener('scroll', ()=>{
       if(window.scrollY>scrollpoint){
        header.classList.add('active1') ;
    
       }
    
       else{
        header.classList.remove('active1')
       }
    });
});
