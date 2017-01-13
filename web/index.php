<?php

require_once(__DIR__ . "/../vendor/autoload.php");

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Yaml\Yaml;

$story = Yaml::parse(file_get_contents('../config-story/story.yml'));

//Generate view / Controller
// RAJOUTER LES INCLUDES ET MOYEN DE ATTRIBUER DES ROUTES SUR LES VIEWS ET LE CONTROLLER QUI DOIT ETRE APPELER
function generateView($dir, $viewName, $contentStory)
{
    $fp = fopen($dir . "/views/" . $viewName . ".php", "a+");
    fputs($fp, "<?php echo('<p>$contentStory</p>')?>");
    fclose($fp);
}

;

function generateController($dir, $ctrlName)
{
    $fp = fopen($dir . "/controllers/" . $ctrlName . "Controller.php", "a+");
    fputs($fp, "<?php #Write your content ?>");
    fclose($fp);
}

;


//CLI for generate views and controllers
if (isset($argv) && $argv[1] == 'generate' && $argv[0] == 'index.php') {
    //Generate file view or controller and IF view add content into key story in yaml
//var_dump($story['story']);
    foreach ($story['story'] as $partStory) {
        //var_dump($part['path'],$part['controller'], $part['view'], $part['story']);
        generateView($partStory['dir'], $partStory['view'], $partStory['story']);
        generateController($partStory['dir'], $partStory['controller']);
    }


}

if (isset($argv) && $argv[1] != 'generate') {
    ("_________________________________________________________________________________" . PHP_EOL);
    ("try this -> index.html generate  (use this if you want generete ur controller and views)" . PHP_EOL);
    ("_________________________________________________________________________________" . PHP_EOL);
} else {
    ("_________________________________________________________________________________" . PHP_EOL);
    ("Views and controllers generate with success :)" . PHP_EOL);
    ("_________________________________________________________________________________" . PHP_EOL);
}


$request = Request::createFromGlobals();
$response = new Response();

$session = new Session();
$session->start();

$currentUrl = $request->getPathInfo();

foreach ($story['story'] as $data) {
    if ($data['path'] == $currentUrl) {
        ob_start();
        include "../app/views/" . $data['view'] . ".php";
        include "../app/controllers/" . $data['controller'] . "Controller.php";
        $content = ob_get_clean();
        $response->setContent($content);
    }
}

$response->send();
?>