# Úroveň oprávnění
Každý uživatel má nastavené oprávnění v definovaném rozsahu, které je vyjádřeno číslem.

![Alt text](./data/2.png#300)

## Výhody a nevýhody

- nepřesné nastavení (zvýšení úrovně u uživatele můžeme přidat i další oprávnění)


## Implementace:
- uživatel je tabulka v db (id, mail, heslo, úroveňOprávnění,...)


```php
if (!máPrávoNaOperaci(uživatel.úroveňOprávnění, 30)) {
throw new Exception("...");
}
````


```php
/**
* @param INT uživatelova úroveň oprávnění
* @param INT minimální úroveň oprávnění pro přístup
* máPrávoNaOperaci($1, $2)
*/

function maPravoNaOperaci($userAcLvl,$reqAcLvl) {
    return $userAccessLevel >= $requiredAccessLevel
}
````



