<?php
/*  Friendly Urls
    ================================================
    RewriteEngine On
    RewriteCond %{SCRIPT_FILENAME} !-f [NC]
    RewriteCond %{SCRIPT_FILENAME} !-d [NC]
    RewriteRule ^(.+)$ /index.php?page=$1 [QSA,L]
    ================================================ */

$root=__dir__;

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
require_once 'index.php';