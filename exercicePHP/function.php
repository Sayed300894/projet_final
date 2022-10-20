<?php


function loadDataFromJsonFile($filename)
{
    $jsonData = file_get_contents($filename);

    $data = json_decode($jsonData, true);
    
    return $data;
} 