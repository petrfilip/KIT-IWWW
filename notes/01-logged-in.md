# Kontrola přihlášení
Nejzákladnější kontrola uživatelského oprávnění. 
Je založeno pouze na autentizaci. 



```php
if (jePřihlášen()) {
...
}
````

```php
function jePrihlasen() {
    return $_SESSION["isLoggedIn"]
}
````
