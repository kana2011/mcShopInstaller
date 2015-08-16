<?php

set_time_limit(0);
ini_set('memory_limit', '-1');

unlink("images/bg.png");
unlink("applysettings.php");
unlink("checkmysql.php");
unlink("downloadfiles.php");
unlink("index.php");
unlink("mcShop.zip");

rcopy("mcShop/public" , getcwd());
rrmdir("mcShop/public/");
rrmdir("mcShop/tests/");

unlink("clean.php");

function rrmdir($dir) {
    if (is_dir($dir)) {
        $files = scandir($dir);
        foreach ($files as $file)
            if ($file != "." && $file != "..") rrmdir("$dir/$file");
        rmdir($dir);
    }
    else if (file_exists($dir)) unlink($dir);
}

function rcopy($src, $dst) {
    if (is_dir ( $src )) {
        if (!file_exists ( $dst ))
            mkdir ( $dst );
        $files = scandir ( $src );
        foreach ( $files as $file )
            if ($file != "." && $file != "..")
                rcopy ( "$src/$file", "$dst/$file" );
    } else if (file_exists ( $src ))
        copy ( $src, $dst );
}

echo getcwd();
