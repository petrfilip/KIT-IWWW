# Shoda role
Každý uživatel má nastavené své oprávnění:

![Alt text](./data/1.png#300)

## Výhody a nevýhody

- přesné nastavení
- náročné na údržbu

## Implementace:
- operace je hard-coded list v aplikaci ([1=> "přidat článek", 2=> "smazat uživatele"])
- uživatel je tabulka v db (id, mail, heslo,...)
- oprávnění je tabulka v db, která obsahuje relaci mezi operací a uživatelem -> definice oprávnění

```php
if (!máPrávoNaOperaci(uživatel.role, ['admin'])) {
throw new Exception("...");
}
````

```php
/**
* @param ROLE uživatelova role
* @param List<ROLE> seznam povolených rolí
* máPrávoNaOperaci($1, $2)
*/

function maPravoNaOperaci($userRole, $allowedRoles) {
    return array_key_exists($userRole, $allowedRoles)
}
````



