# Povolené pro každého uživatele

Každý uživatel má nastavené operace, které může provádět.

![Alt text](./data/3.png)

## Výhody a nevýhody

- přesné nastavení
- náročné na údržbu

## Implementace:

- **_operace_** je hard-coded list v aplikaci
    - [1=> "přidat článek", 2=> "smazat uživatele"]
    - ['PRIDAT_CLANEK'=> "přidat článek",
      'SMAZAT_UZIVATELE'=> "smazat uživatele"]
- **_uživatel_** je tabulka v db
    - (id, mail, heslo, ...)
- **_oprávnění_** je vazební tabulka v db, která obsahuje relaci mezi operací a uživatelem
  - definice oprávnění

```php
if (!máPrávoNaOperaci(uživatel.id, operace.id)) {
    throw new Exception("...");
}
````

```sql
/**
* @param ID identifikátor uživatele
* @param ID identifikátor operace
* máPrávoNaOperaci($1, $2)
*/

SELECT EXISTS(
               SELECT 1
               FROM oprávnění
               WHERE user.id = :userId
               oprávnění.id_operace = :taskId
               LIMIT 1
           )
````

[Benchmark na zjištění existence záznamu](https://stackoverflow.com/a/10688065/7065599)

