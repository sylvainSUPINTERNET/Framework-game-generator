<?php include '../app/controllers/forcerController.php' ?>

<p>Vous avez forcer l'accès !</p>

<?php
function randomNb($min, $max)
{
    $nb = rand($min, $max);
    return $nb;
}
$nbRand = randomNb(1, 4);
$msg = "";
if ($session->get("nbRand")== null) {
    $session->set("nbRand", $nbRand);
    var_dump($session->get("nbRand"));
    var_dump("salut");
    if ($session->get("nbRand") == 1) {
        $session->set('try', 1);
        $msg = "Le forcing s'est mal passé <a href='/message'> cliquez pour continuer</a>";
    } else if ($session->get("nbRand") == 2) {
        $session->set('try',null);
        $msg = "Le forcing s'est bien passé <a href='/message'> cliquez pour continuer</a>";
    }
} else {
    var_dump($session->get("nbRand"));
    var_dump("s");
    if ($session->get("nbRand") == 1) {
        $session->set('try', 1);
        $msg = "Le forcing s'est mal passé <a href='/message'> cliquez pour continuer</a>";
    } else if ($session->get("nbRand") == 2) {
        $session->set('try',null);
        $msg = "Le forcing s'est bien passé <a href='/message'> cliquez pour continuer</a>";
    }
}
print($msg);
?>
