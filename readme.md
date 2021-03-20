Jak psát webové stránky v MVC architektuře
==============
V tomto krátkém kurzu, pocházejícím od
[Davea Hollingwortha](https://davehollingworth.com/), se naučíme, jak psát
web za použití MVC architektury, namísto dříve velmi obvyklého špagetového kódu.

Pozor: zdá se, že bez kvalitního a propracovaného designu, se i MVC může snadno
zvrhnout do špaget.

## Instrukce ke zprovoznění projektu
Projekt by neměl být nikterak technologicky náročný. Používá se PHP,
minimálně od verze 5.4.0 (první verze se zabudovaným hostitelským serverem)
by mělo být vše funkční.

Stačí tedy mít nainstalováno PHP a pak už jen ve složce

```shell
~/Projects/mvc
```

spustit příkaz

```shell
php -S localhost:8000 -t public/
```

čímž se na zvoleném portu spustí server s rootem nastaveným na složku `public`,
v níž se nachází soubor `index.php`.

Pokročilejší možnosti nastavení routování nativního PHP serveru lze najít
[zde.](https://www.php.net/manual/en/features.commandline.webserver.php)

## Nastavení formátu URL, pretty/vanity URL

Existuje možnost simulovat chování klasických rewrite rules v `.htaccess` také
v rámci vestavěného PHP serveru. V takovém případě, pokud stále zachováváme
výše zavedenou konvenci, že rootem projektu je složka `public`, můžeme chování
apache serveru, jehož rewrite rules jsou následující:
```apacheconf
#Friendly Urls
    #================================================
    RewriteEngine On
    RewriteCond %{SCRIPT_FILENAME} !-f [NC]
    RewriteCond %{SCRIPT_FILENAME} !-d [NC]
    RewriteRule ^(.+)$ /index.php?page=$1 [QSA,L]
    #================================================
```
simulovat pomocí konfiguračního souboru pojmenovaného například `routing.php`
a umístěného rovněž ve složce `public` spolu se souborem `index.php`. Aby
konfigurační soubor `routing.php` vykazoval chování dané výše zmíněnými rewrite rules
musí být jeho obsah zrhuba následující:
```injectablephp
<?php
$root=__dir__;

var_dump($root, 'jak vypadaá root'); //sem umístit komentáře, jak to funguje

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
```

V rámci projektu však budeme potřebovat rewrite rules, která budou vypadat
tákto:
```apacheconf
RewriteEngine On
RewriteBase /
RewriteCond %{REQUEST_FILENAME} !-f [NC]
RewriteCond %{REQUEST_FILENAME} !-d [NC]
RewriteRule ^(.*)$ /index.php?$1 [L,QSA]
```

Jak toto chování nasimulovat pomocí vhodného konfiguračního souboru je
momentálně předmětem dalšího zkoumání, o jehož výsledcích budeme v tomto
readme informovat.

Každopádně pokud už máme routovací php soubor, jehož obsah odpovídá
požadovanému chování, je třeba server spustit příkazem

```shell
php -S localhost:8000 public/routing.php
```

## Další plán postupu

Je potřeba přijít na to, jak požadovaná rewrite rules, s kterými umí pracovat
Apache server, přeložit do jazyka, kterému bude rozumět PHP. Za tím cílem
je třeb v první řadě zjistit, co jednotlivé rewrite rules znamenají.
Zdá se, že podstatnou roli v nich smaozřejmě budou hrát regulární výrazy.

Začnu [zde](https://code.tutsplus.com/tutorials/an-in-depth-guide-to-mod_rewrite-for-apache--net-6708)

Mimochodem samotný kurz obsahuje značné množství materiálu o regexech.
Je třeba jen zjistit, co ta rewrite rules znamenají...