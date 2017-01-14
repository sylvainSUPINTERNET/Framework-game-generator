<?php

require_once(__DIR__ . "/../vendor/autoload.php");

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Yaml\Yaml;

$story = Yaml::parse(file_get_contents('../config-story/story.yml'));

function generateTemplates($dir, $templateName){
    $fp = fopen($dir . "/templates/" . $templateName . ".php", "a+");
    $linkedController = $templateName."Controller.php";
    fputs($fp, "<?php include '../app/controllers/$linkedController' ?>");
    fclose($fp);
}


function generateView($dir, $viewName, $template)
{
    $fp = fopen($dir . "/views/" . $viewName . ".php", "a+");
    $linkedController = $viewName . "Controller.php";
    $template = $template.".php";
    fputs($fp, "<?php include \"../web/layout/header.php\";?> \r\n <?php include \"../app/templates/$template\";?> \r\n <?php include '../app/controllers/$linkedController' ?>");
    fclose($fp);
}

;

function generateController($dir, $ctrlName, $treatment)
{
    $fp = fopen($dir . "/controllers/" . $ctrlName . "Controller.php", "a+");
    fputs($fp, "<?php #Write your content \r\n $treatment ?>");
    fclose($fp);
}

;


//CLI for generate views and controllers
if (isset($argv) && $argv[1] == 'generate' && $argv[0] == 'index.php') {
    //Generate file view or controller and IF view add content into key story in yaml
    //var_dump($story['story']);
    foreach ($story['story'] as $partStory) {
        //var_dump($part['path'],$part['controller'], $part['view'], $part['story']);
        generateTemplates($partStory['dir'], $partStory['template']);
        generateView($partStory['dir'], $partStory['view'], $partStory['template']);
        generateController($partStory['dir'], $partStory['controller'], $partStory['treatment']);

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

include('../config-story/route-events/eventsManager.php');

foreach ($story['story'] as $data) {
    if ($data['path'] == $currentUrl) {
        ob_start();
        include "../app/views/" . $data['view'] . ".php";
        $content = ob_get_clean();
        $response->setContent($content);
    } else {
        /*
        $response->setStatusCode(404);
        //$response->setContent("Oops page not found ! ");

        if ($response->getStatusCode() == 404) {
            include '../app/errors_views/404.php';
        }
        */
    }
}


//  TO DO :
// ADD ALL LOGIC FROM OLD PROJECT ABOUT ROUTES ETC TO SET SESSION ETC ETC
// FINISH TO FIND SYSTEM TO PRINT THE CONTENT OF VIEW ETC IN PHP ! 5FROM YAML Key => story

// ADD OBJECT CLASS FOR CONTRLLER AND VIEW CONTENT
// DO A FUNCTION WHO GET THE KEY OF YAML AND SEARCH IN TAB DEFINE IN THESE CLASS THE CONTENT TO PRINT (REGISTER IN KEY WHO HAS THE SAME NAME)

$response->send();
?>