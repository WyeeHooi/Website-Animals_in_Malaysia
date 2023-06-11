let ul=document.querySelector('.animalprotect ul');
ul.innerHTML=ul.innerHTML+ul.innerHTML;

let lis=document.querySelectorAll('.animalprotect li')

let spa=-2;

ul.style.width=lis[0].offsetWidth*lis.length+'px';

function move(){
    if(ul.offsetLeft < -ul.offsetWidth/2){
        ul.style.left='0';
    }
    ul.style.left=ul.offsetLeft+spa+'px';
}

window.addEventListener('load', function() {
    setInterval(move,100);
});

