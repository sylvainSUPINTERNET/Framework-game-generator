<?php
//principe
//get path infos => appelle une route et un controller à partir de cette route VOIR config dans app


$currentUrl = $request->getPathInfo();


//$session->clear(); //test session
if ($currentUrl == '/') {
    $currentUrl = '/intro'; // to start on index directly
}


if ($currentUrl == '/cloackVestiaire' || $currentUrl == '/cloackHook') {
    $session->set('putCloack', true);
//var_dump($session->get('putCloack'));

}

if ($currentUrl == '/westShadow' && $session->get('putCloack') == null) {

    $session->set('CountTry', 0); //count try to discover the enigma
    $getCountTry = $session->get('CountTry');
    $getCountTry = +1;
//var_dump($getCountTry);
    $session->set('try', $getCountTry);
//var_dump($session->get('try'));
}


//Si le manteau est déposé PUIS creer une route controller Message et mettre a compteur de fail pour afficher victoire ou defaite

if ($currentUrl == '/westShadow' && $session->get('putCloack') !== null) {
    $currentUrl = '/westOpen';
}


//RESET
if ($currentUrl == '/reset') {
    $session->clear();
    $currentUrl = '/intro';
}


//Forbidden access to /message if you try go directly you are automaticly redirect to intro
if($currentUrl == '/forcer' || $currentUrl == '/westShadow'){
    $session->set("allow_victory_access",true);
}

if($currentUrl == '/cloackHook' || $currentUrl == '/cloackHook'){
    $session->set("allow_victory_access",true);
}

/*REDIRECT TO INTRO (if you dont use cheater message)*/
/*
if($session->get("allow_victory_access") == false && $currentUrl == '/message'){
    $currentUrl  = '/intro'; //redirect to base
}
*/

/*if you are cheater */
if($session->get("allow_victory_access") == false && $currentUrl == '/message'){
    $session->set("try",1);
    $currentUrl  = '/message'; //redirect to base
    $cheater = "Bravo vous avez triché";

}



$try = $session->get('try');
$cloackDropped = $session->get('putCloack');
if ($try == null) {
    $try = 0;
}
if ($cloackDropped == null) {
    $cloackDropped = 0;
}


?>