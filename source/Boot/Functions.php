<?php

function readJsonFile($filePath){
    $productList = [];

    $content = file_get_contents($filePath);
    $content = json_decode($content, true);
    return $content;
}