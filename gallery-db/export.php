<?php
include 'Connection.php';
include 'GalleryRepository.php';

if (empty($_GET)) {
    echo <<<HEREDOC
<h1>Export example</h1>
<ul>
<li><a href="./index.php">Upload</a></li>
<li><a href="./export.php?export-type=json&disposition=inline" target="_blank">Export</a></li> 
<li><a href="./export.php?export-type=json&disposition=attachment" >Export as json (attachment)</a></li> 
<li><a href="./export.php?export-type=xml&disposition=inline" >Export as xml</a></li>
<li><a href="./export.php?export-type=xml&disposition=attachment" >Export as xml (attachment)</a></li>
</ul>
HEREDOC;
//https://www.php.net/manual/en/language.types.string.php
}

if ($_GET["export-type"] == "json" && isset($_GET["disposition"])) {

    $data = GalleryRepository::getAll();
    //print_r($data);
    $copyData = [];
    foreach ($data as $item) {
        $copyItem["id"] = $item["id"];
        $copyItem["image_format"] = $item["image_format"];
        $copyItem["image"] = base64_encode($item["image"]);  //convert from binary to base64 -> cause readable and large output
        array_push($copyData, $copyItem);
    }

    if ($_GET["disposition"] == "attachment") {
        header('Content-Disposition: attachment; filename="export.json"');
    }

    header('Content-type: text/javascript');
    echo json_encode($copyData, JSON_PRETTY_PRINT);

}

if ($_GET["export-type"] == "xml" && isset($_GET["disposition"])) {

    $data = GalleryRepository::getAll();
    $xml = new SimpleXMLElement('<root/>');
    foreach ($data as $item) {
        $xmlItem = $xml->addChild('item');
        $xmlItem->addAttribute('id', $item["id"]);
        $xmlItem->addAttribute('image_format', $item["image_format"]);
        $xmlItem->addChild('image', base64_encode($item["image"]));
    }

    $dom = new DOMDocument('1.0');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xml->asXML());


    if ($_GET["disposition"] == "attachment") {
        header('Content-Disposition: attachment; filename="export.xml"');
    }

    header('Content-Type: text/xml');
    echo $dom->saveXML();
}


