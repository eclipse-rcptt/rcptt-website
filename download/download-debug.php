<?php
function getLastChild($dir) {
    $children = scandir($dir);
    return array_pop($children);
}

function getLastMatchingChild($dir, $pattern) {
    $children = scandir($dir);
    $result = "";
    foreach ($children as &$child) {
        if(preg_match($pattern, $child) == 1) {
            $result = $child;
        }
    }
    return $result;
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
$App 	= new App();
$downloadsHome=$App->getDownloadBasePath() . "/rcptt";

$path=$downloadsHome . $_GET["path"];

print_r(scandir($path));
print_r(getLastMatchingChild($path, "/\\d+/"));
?>