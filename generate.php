<?php
/**
 * @category    Guidance
 * @package     <package>
 * @copyright   Copyright (c) 2016 Guidance
 * @author      Will Wright <wwrig@guidance.com>
 */

$c = curl_init();
curl_setopt($c,CURLOPT_URL,'https://en.wikipedia.org/wiki/List_of_Star_Wars_characters');
curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($c);
curl_close($c);

$document = new DOMDocument();
$document->loadHTML($result);

$xpath = new DOMXPath($document);

$characters = $xpath->query("//div[@id='mw-content-text']/*/dt");

$charactersArr = array();
foreach ($characters as $character) {
    array_push($charactersArr,$character->nodeValue);
}

$max = count($charactersArr);

$index = rand(0,$max);
echo $charactersArr[$index];