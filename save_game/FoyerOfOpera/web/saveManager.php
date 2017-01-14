<?php


function recurse_copy($src, $dst)
{
    $dir = opendir($src);
    @mkdir($dst);
    while (false !== ($file = readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                recurse_copy($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}




if (isset($argv[1]) && $argv[1] == 'save' && $argv[2] != '') {
    //Copy web / app / config-story => into save_game => generate file name argv[2]

    $dirToCopy = '../save_game/' . $argv[2];
    mkdir($dirToCopy, 0777);

    var_dump($dirToCopy);

    $srcWeb = '../web/';
    $dstWeb = $dirToCopy.'/web';
    recurse_copy($srcWeb, $dstWeb);

    $srcApp = '../app/';
    $dstApp = $dirToCopy.'/app';
    recurse_copy($srcApp, $dstApp);

    $srcConfigStory = '../config-story/';
    $dstConfigStory = $dirToCopy.'/config-story';
    recurse_copy($srcConfigStory, $dstConfigStory);

    $srcComposer = '../composer';
    $dstComposer = $dirToCopy.'/composer';
    recurse_copy($srcComposer, $dstComposer);


    echo("Game : " . $argv[2] . " has been save !");
}