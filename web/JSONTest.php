<?php
//$filename="newjson.json";
//$decode = file_get_contents($filename);
$filename = "{'ff':'222'}";
$obj = json_decode($filename);
print var_dump($obj);
