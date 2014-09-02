<?php
function getLastChild($dir) {
    $children = scandir($dir);
    return array_pop($children);
}

function getLastMatchingChild($dir, $pattern) {
    $handle = opendir($dir);
    $result = "";
    while (($file = readdir($handle)) !== false) {
        if(preg_match($pattern, $file) == 1) {
            $result = $file;
        }
    }
    closedir($handle);
    return $result;
}
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
$App 	= new App();
$downloadsHome=$App->getDownloadBasePath() . "/rcptt";

$path=$downloadsHome . $_GET["path"];

print_r(scandir($path));
?>