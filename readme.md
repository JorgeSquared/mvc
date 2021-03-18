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

```
~/Projects/mvc
```

spustit příkaz

```
php -S localhost:8000 -t public/
```

čímž se na zvoleném portu spustí server s rootem nastaveným na složku `public`,
v níž se nachází soubor `index.php`.

Pokročilejší možnosti nastavení routování nativního PHP serveru lze najít
[zde.](https://www.php.net/manual/en/features.commandline.webserver.php)
