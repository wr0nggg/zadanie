<?php
header('Content-type: application/json');
$files = glob( __DIR__ . '/*/*.php');
foreach ($files as $file) {
    require($file);
}
$c = new GetData();
$c->setIco('05994187');
$s = $c->getData();
echo $s;
?>