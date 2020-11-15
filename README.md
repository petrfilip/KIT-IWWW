# KIT-IWWW - zranitelnost webů

Bezpečnost 

- validace vstupů od uživatele
    - include $_GET["page"]; 
    - /index.php?page=uvodni.inc. vs /index.php?page=/etc/passwd ?
  
- SQL injection
    - kontrola vstupu
    - prepared statements

- ukládání hesel 
    - md5 není vhodná pro hashování hesel (prolomena)
    - bcrypt (password_hash, password_verify)
  
- XSS Cross-Site Scripting
    - escapovat uložená data (strip_tags, htmlspecialchars)
    

- session hijacking (získat sessionId od uživatele)
    - vypnout http-referer
  

- přenášení dat mezi klientem a server (HTTP vs HTTPS)
- hesla neposílat emailem
- OWASP

Zdroje: 

- https://www.kosek.cz/vyuka/4iz278/prednasky/bezpecnost/#/
- https://phpfashion.com/escapovani-definitivni-prirucka
- https://www.michalspacek.com/what-is-security.txt-and-why-you-should-have-one
- https://portswigger.net/web-security/sql-injection/union-attacks
- https://haveibeenpwned.com/