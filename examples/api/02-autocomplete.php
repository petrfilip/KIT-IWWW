<?php

# source of data/countries.txt
# https://gist.githubusercontent.com/kalinchernev/486393efcca01623b18d/raw/daa24c9fea66afb7d68f8d69f0c4b8eeb9406e83/countries

$query = htmlspecialchars($_GET["query"]);

if (empty($query)) {
    return;
}

if (!preg_match('/^[a-zA-Z0-9 ]+$/', $query)) {
    echo "Vstup obsahuje nepovolené znaky: " . $query;
    return;
}

$matched = 0;

$handle = fopen("./../data/countries.txt", "r");
while (($line = fgets($handle)) !== false) {

    if (preg_match("/{$query}/i", $line)) {
        echo nl2br($line);
        $matched++;
    }

    if ($matched > 5) {
        break;
    }
}

fclose($handle);

