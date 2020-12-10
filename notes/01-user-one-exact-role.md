# Shoda role
Každý uživatel je obsazen do jedné role. (Role-based Access Control~~~~)
Je potřeba zdokumentovat, s jakou rolí lze dělat jednotlivé operace. 

Operace jsou většinou specifikovány v dokumentaci.


![Alt text](./data/1.png#300)

## Výhody a nevýhody

- jednoduché nastavení
- vhodné pro menší projekty
- malá granularita

## Implementace:
- role je hard-coded list v aplikaci (["editor", "admin"])
- uživatel je tabulka v db (id, mail, heslo,...)

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



