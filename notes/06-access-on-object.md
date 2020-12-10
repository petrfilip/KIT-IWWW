# Oprávnění na objekty

Uživatel je přiřazen do role, ale zároveň je možno, aby měl nastaveno individuální oprávnění.

Rozšířířením je specifikace oprávnění na úrovni jednotlivých záznamů. 
Vazební tabulka s oprávněním obsahuje definici přístupu pro každý řádek v databázi pro "všechny" tabulky.

Operace pro získání přístupu mají strukturovanou definici:

- `id žádajícího` // uživatel nebo role
- `operace` [create, edit, ..., count]
- `název tabulky` / entity // cokoliv v databázi
- `id záznamu` 


![Alt text](./data/.png)

## Výhody a nevýhody

- vazební tabulka dost narůstá
- precizní vyspecifikování práv až na úroveň záznamu

## Implementace:

```php
if (máOprávnění(user.id, 'edit', 'articles', 10)) {...}
````

```sql
/**
* @param ID identifikátor uživatele
* @param ROLE role uživatele
* @param ID identifikátor operace
* máPrávoNaOperaci($1, $2, $3)
*/


````






