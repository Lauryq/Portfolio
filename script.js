// ANIMATION SCROLL CERCLES

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

// FORMULAIRE

$('form').submit(function(e){

  e.preventDefault();
  $('p').remove('.form_error');
  $('input').css('border', '1px solid #b7b7b7');
  $('.message').css('border', '1px solid #b7b7b7');

  $.ajax({
    url: 'mail.php',
    type: 'POST',
    dataType: 'json',
    data: $(this).serialize(),
    success: function(retour){

      console.log(retour[1].length);
      console.log(retour);
      // supp ancien svg si besoin pour afficher le nouveau
      let form_validation = document.querySelector(".form_validation");
      while(form_validation.firstChild) {
        form_validation.removeChild(form_validation.firstChild);
      }

      if(retour[0] == '<p class="form_error">Veuillez n\'utiliser que des lettres (majuscules et minuscules)</p>'){
        $('.input_name').after(retour[0]);
        $('.input_name').css('border', '1px solid red'); 
      }

      if(retour[1] == '<p class="form_error">Veuillez rentrer une adresse mail valide</p>'){
        $('.input_mail').after(retour[1]);
        $('.input_mail').css('border', '1px solid red');
      }

      if(retour[2] == '<p class="form_error">Les caractères spéciaux suivant sont interdits: < >.</p>'){
        $('.input_subject').after(retour[2]);
        $('.input_subject').css('border', '1px solid red');
      }

      if(retour[3] == '<p class="form_error">Les caractères spéciaux suivant sont interdits: < >.</p>'){
        $('.message').after(retour[3]);
        $('.message').css('border', '1px solid red');
      }

      if(retour[4] == "mail ok"){
        document.querySelector("form").reset();
        $('.form_validation').append(retour[5]);
      }

      let max = window.innerHeight * 5;
      $(window).scrollTop(max);

    }
  })
});

// Hide menu mobile
$('.navbar-nav>li>a').on('click', function(){
    $('.navbar-collapse').collapse('hide');
});
