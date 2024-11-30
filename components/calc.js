
let calculation = localStorage.getItem('calculation') || '';



function update(op){
calculation+=op;
print();
    
localStorage.setItem('calculation',calculation);

}

function print(){

    document.querySelector('.js-text').innerHTML= calculation;
}