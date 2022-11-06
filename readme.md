Jak psát webové stránky v MVC architektuře
==============
V tomto krátkém kurzu, inspirovaném
[Davidem Hollingworthem](https://davehollingworth.com/), se naučíme, jak psát
web za použití MVC architektury, namísto dříve velmi obvyklého špagetového kódu.

Pozor: zdá se, že bez kvalitního a propracovaného designu, se i MVC může snadno
zvrhnout do špaget :smile: .

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
php -S localhost:8000 -t public
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
konfigurační soubor `routing.php` vykazoval chování alespoň trochu podobné
výše zmíněným rewrite rules, měl by být jeho obsah alespoň následující:
```injectablephp
<?php

if (preg_match('/\.(?:png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])) {
    return false;
} else {
    include __DIR__ . '/public/index.php';
}
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

Toto chování je momentálně přibližně simulováno v souboru `routing.php`.

Spuštění aplikace se pak provede příkazem

```shell
php -S localhost:8013 -t public routing.php
```

## Konfigurace pomocí `php.ini`

Při rekvírování různých šablonovacích enginů, zejména jejich starších verzí,
se může stát, že se v kombinací s novějším PHP začnou vyskytovat
různé deprecated zprávy. Ty je možné potlačit specifickou konfigurací
v rámci soubour `php.ini` vloženého přímo do kořenového adresáře
projektu.

Do samotného souboru pak stačí přidat tento řádek:
```injectablephp
error_reporting = E_ALL & ~E_DEPRECATED & ~E_STRICT
```

a projekt je pak třeba spustit příkazem

```shell
php -S localhost:8001 -t public -c php.ini routing.php
```
