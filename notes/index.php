<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Kam ukládata soubory</title>
  <link rel="stylesheet" href="../main.css">
</head>
<body>
<div id="sidebar">
  <h1>Kam ukládat soubory?</h1>

</div>


<div id="main">

  <h1>Implementace</h1>

  <img src="./data/impl.png" width="1100px"/>

  <h1>Porovnání</h1>

  <table>
    <thead>
    <tr>
      <th></th>
      <th>Databáze</th>
      <th>Filesystem</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td><b>Uložení<b></td>
      <td>Binary Large OBject (BLOB)</td>
      <td>do specifického adresáře<br>reference z databáze (cesta)</td>
    </tr>
    <tr>
      <td><b>Výkon<b></td>
      <td>přidána vrstva databáze<br>opatrně s dotazy
        <pre>Select * FROM</pre>
      </td>
      <td>závislé na file systému</td>
    </tr>
    <tr>
      <td><b>Konzistence</b></td>
      <td>ACID - vše nebo nic</td>
      <td>může zůstat zapomenutý soubor</td>
    </tr>
    <tr>
      <td><b>Zálohování</b></td>
      <td>součást databáze = velké zálohy</td>
      <td>prostá kopie včetně adresářové struktury</td>
    </tr>
    <tr>
      <td><b>Škálování</b></td>
      <td>závislé na DB (MySQL = složité, MongoDB = jednodušší)</td>
      <td>přidání disku</td>
    </tr>
    <tr>
      <td><b>Migrace</b></td>
      <td>součást databáze = jednoduché</td>
      <td>problémy s referencí = možné komplikace</td>
    </tr>
    <tr>
      <td><b>Další poznámky</b></td>
      <td>velké zálohy, omezená maximální velikost souboru</td>
      <td>omezený počet souborů v adresáři</td>
    </tr>
    </tbody>
  </table>

  <h2>MySQL BLOB datové typy</h2>
  <ul>
    <li>TINYBLOB 255 bajtů</li>
    <li>BLOB - 64 KB</li>
    <li>MEDIUMBLOB - 16 MB</li>
    <li>LONGBLOB - až 4 GB</li>
  </ul>

  <h2>MongoDB</h2>
  <ul>
    <li>BSON - 16 MB </li>
    <li>GridFS > 16 MB </li>
  </ul>


</div>

</body>
</html>