document.addEventListener('DOMContentLoaded',()=>eventListeners());


function eventListeners(){
    const mobilMenu = document.querySelector('.mobile-menu');
    mobilMenu.addEventListener('click',navegacionResponse)
}

const navegacionResponse = ()=>{
    const navegacion = document.querySelector('.navegacion');
    if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar')
    } else {
        navegacion.classList.add('mostrar')
    }
}

/*
window.matchMedia('(prefers-color-scheme: dark)')
*/