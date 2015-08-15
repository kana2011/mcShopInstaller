<?php

set_time_limit(0);
ini_set('memory_limit', '-1');

$version = trim(file_get_contents('http://kana2011.github.io/mcShop/installer/lastest'));
file_put_contents("mcShop.zip", fopen("https://github.com/kana2011/mcShop/releases/download/" . $version . "/" . $version . ".zip", 'r'));

$zip = new ZipArchive;
if ($zip->open('mcShop.zip') === TRUE) {
    $zip->extractTo('mcShop/');
    $zip->close();
    echo 'ok';
} else {
    echo 'failed';
}
