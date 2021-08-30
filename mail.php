<?php

// Regex formulaire
    $regex_name = "/^[A-ZÄ-Ÿ-Àa-zä-ÿ\-\à\s\']+$/";
    // $regex_subject = "/^[^<>][a-zA-Z0-9\_\-\;\,\:\s]{1,70}$/";
    $regex_mail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\.]+.[a-z]{2,}+$/";
    // $regex_text = "/^[^<>][a-zA-Z0-9\_\-\;\,\:\s\'\.]{1,200}$/";
    
    $regex_subject = "/^[^<>]+$/";
    $regex_text = "/^[^<>]+$/";
    $array = array(
        'From' => $_POST['nom'],
        'Mail' => $_POST['mail'],
    );

    $err_name = "";
    $err_mail = "";
    $err_subject = "";
    $err_text = "";
    $err_no = "";

    $svg_yes = '<svg class="svg_yes" width="690" height="690" viewBox="0 0 690 690" fill="none" xmlns="http://www.w3.org/2000/svg">
<g filter="url(#filter0_dii)">
<circle cx="345" cy="285" r="225" fill="url(#paint0_linear)"/>
</g>
<path class="stroke_yes" d="M271 311.421L313.828 350.882C318.032 354.755 324.621 354.323 328.283 349.934L420 240" stroke="#2EA42E" stroke-width="60" stroke-linecap="round"/>
<defs>
<filter id="filter0_dii" x="0" y="0" width="690" height="690" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
<feFlood flood-opacity="0" result="BackgroundImageFix"/>
<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
<feOffset dy="60"/>
<feGaussianBlur stdDeviation="60"/>
<feColorMatrix type="matrix" values="0 0 0 0 0.2 0 0 0 0 0.2 0 0 0 0 0.2 0 0 0 0.25 0"/>
<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
<feOffset dy="20"/>
<feGaussianBlur stdDeviation="10"/>
<feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
<feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 1 0"/>
<feBlend mode="normal" in2="shape" result="effect2_innerShadow"/>
<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
<feOffset dy="-20"/>
<feGaussianBlur stdDeviation="10"/>
<feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
<feColorMatrix type="matrix" values="0 0 0 0 0.8 0 0 0 0 0.8 0 0 0 0 0.8 0 0 0 1 0"/>
<feBlend mode="normal" in2="effect2_innerShadow" result="effect3_innerShadow"/>
</filter>
<linearGradient id="paint0_linear" x1="345" y1="60" x2="345" y2="510" gradientUnits="userSpaceOnUse">
<stop stop-color="white"/>
<stop offset="1" stop-color="#D6D6D6"/>
</linearGradient>
</defs>
</svg>
';


    //NOM
if (!preg_match($regex_name, $_POST["nom"]) || empty($_POST["nom"])){
    $err_name = '<p class="form_error">Veuillez n\'utiliser que des lettres (majuscules et minuscules)</p>';
}  
 //SUJET
if (!preg_match($regex_subject, $_POST["subject"]) || empty($_POST["subject"])){
    $err_subject = '<p class="form_error">Les caractères spéciaux suivant sont interdits: < >.</p>';
}   
 //MAIL
if (!preg_match($regex_mail, $_POST["mail"]) || empty($_POST["mail"])){
    $err_mail = '<p class="form_error">Veuillez rentrer une adresse mail valide</p>';
}   
 //MESSAGE
if(!preg_match($regex_text, $_POST["message"]) || empty($_POST["message"])){
    $err_text = '<p class="form_error">Les caractères spéciaux suivant sont interdits: < >.</p>';
}   
 // SI TOUT EST OK
if (preg_match($regex_name, $_POST["nom"]) && preg_match($regex_subject, $_POST["subject"]) && preg_match($regex_mail, $_POST["mail"]) && preg_match($regex_text, $_POST["message"])){
    $err_no = "mail ok";
    $retour = mail('quarto.l@codeur.online', $_POST['subject'], $_POST['message'], $array);
}
    $err_table = [$err_name, $err_mail, $err_subject, $err_text, $err_no, $svg_yes];
    echo json_encode($err_table);
?>
