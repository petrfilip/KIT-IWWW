# Oprávnění rolí na úlohy

Každý uživatel má

![Alt text](./data/4.png)

## Výhody a nevýhody

- groupování uživatelů do rolí
- nižší granularita než ve variantě přes uživatele
- uživateli nejde nastavit konkrétní oprávnění
- snadnější správa mnoha uživatelů

## Implementace:

- **_operace_** je hard-coded list v aplikaci
- **_uživatel_** je tabulka v db
- **_oprávnění_** je tabulka v db, která obsahuje relaci mezi operací a uživatelem -> definice oprávnění

```php
if (!máPrávoNaOperaci(uživatel.role, operace.id)) {
    throw new Exception("...");
}
````

```sql
/**
* @param ROLE uživatelova role
* @param ID identifikátor operace
* máPrávoNaOperaci($1, $2)
*/

SELECT EXISTS(
               SELECT 1
               FROM oprávnění
               WHERE oprávnění.id_operace = :taskId
                 AND oprávnění.id_role = :role
               LIMIT 1
           )
````

# Varianta - uživatel může mít více rolí

Uživatel může mít více rolí. Tím je umožněno například groupovat oprávnění
![Alt text](./data/5.png)

## Výhody a nevýhody

- dovoluje vyšší granularitu práv
- vhodné uložit uživatelské role do $_SESSION - optimlizace počtu requestů

```php
/**
* @param List<ROLE> všechny uživatelovi role
* @param ID identifikátor operace
* máPrávoNaOperaci($1, $2)
*/

if (!máPrávoNaOperaci(uživatel.role, operace.id)) {
throw new Exception("...");
}
````
Alespoň jedna role má oprávnění:
```sql
/**
* @param ROLES všechny uživatelovy role
* @param ID identifikátor operace
* máPrávoNaOperaci($1, $2)
*/

SELECT EXISTS(
               SELECT 1
               FROM oprávnění
               WHERE oprávnění.id_operace = :taskId
                 AND oprávnění.id_role IN (:roles)
               LIMIT 1
           )
````





