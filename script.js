var competences = document.querySelector('#cerclehtml');

function addanim() {
    var circles = document.querySelectorAll('circle');
    circles.forEach(c => c.classList.add('anim'));
}

function onscroll () {
    if(window.scrollY > competences.offsetTop-window.innerHeight){
        addanim();
        document.removeEventListener('scroll', onscroll);
    };
    
}

document.addEventListener('scroll', onscroll)