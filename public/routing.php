<?php
/*  Friendly Urls
    ================================================
    RewriteEngine On
    RewriteCond %{SCRIPT_FILENAME} !-f [NC]
    RewriteCond %{SCRIPT_FILENAME} !-d [NC]
    RewriteRule ^(.+)$ /index.php?page=$1 [QSA,L]
    ================================================ */
// varianta 1

/*$root=__dir__;

var_dump($root, 'jak vypadaá root');

$uri=parse_url($_SERVER['REQUEST_URI'])['path'];

var_dump($uri);
$page=trim($uri,'/');
var_dump($page);

if (file_exists("$root/$page") && is_file("$root/$page")) {
    return false; // serve the requested resource as-is.
    exit;
}

$_GET['page']=$page;
echo 'I am here';
require_once 'index.php';*/

// varianta 2

/*$root = $_SERVER['DOCUMENT_ROOT'];
chdir($root);
$path = '/'.ltrim(parse_url($_SERVER['REQUEST_URI'])['path'],'/');
set_include_path(get_include_path().':'.__DIR__);
if(file_exists($root.$path))
{
    if(is_dir($root.$path) && substr($path,strlen($path) - 1, 1) !== '/')
        $path = rtrim($path,'/').'/index.php';
    if(strpos($path,'.php') === false) return false;
    else {
        chdir(dirname($root.$path));
        require_once $root.$path;
    }
}else include_once 'index.php';*/

//varianta 3 (přímo od Davea Hollingwortha

if (preg_match('#(\?.*)$#', $_SERVER["REQUEST_URI"])) {
    var_dump('jsem tady');
    return false;
} else {
    include __DIR__ . '/index.php';
}


