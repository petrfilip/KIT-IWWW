# Kontextová oprávnění

Pro případ, kdy uživatel je obsazen ve specifické roli, ale zároven je přístup řízen i kontextem dané informace. Příklad: Uživatel může článek editovat pouze v případě, že je jeho autor.

V takovém případě je nutno vyhodnotit oprávnění dynamicky

```php
if (máPrávoNaOperaci(uživatel.id, uživatel.role,
                      resource.id, operace.id)) {
  ...
}
````

```php
/**
* @param ID identifikátor uživatele
* @param ROLE role uživatele
* @param INT identifikátor požadovaného zdroje :: například $_GET['id']
* @param ID identifikátor operace
* máPrávoNaOperaci($1, $2)
*/

function maPravoNaOperaci($userId, $userRole, $resourceId, $taskId) {
    if ($userRole === 'admin') {
        return true;
    } else {
        return $resourceId === $userId;
    }
}
````

---
Dědičnost rolí - Zakázání a povolení