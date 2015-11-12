<?php

set_time_limit(0);
ini_set('memory_limit', '-1');

$version = trim(file_get_contents('http://kana2011.github.io/mcShop/installer/lastest'));
file_put_contents("mcShop.zip", fopen("https://github.com/kana2011/mcShop/archive/" . $version . ".zip", 'r'));

$zip = new ZipArchive;
if ($zip->open('mcShop.zip') === TRUE) {
    $zip->extractTo(getcwd());
    $zip->close();
    rename("mcShop-" . $version , "mcShop");
    unlink("mcShop/.bowerrc");
    unlink("mcShop/.env.example");
    unlink("mcShop/.gitattributes");
    unlink("mcShop/.gitignore");
    unlink("mcShop/LICENSE.md");
    unlink("mcShop/README.md");
    unlink("mcShop/bower.json");
    unlink("mcShop/composer.json");
    unlink("mcShop/composer.lock");
    unlink("mcShop/gulpfile.js");
    unlink("mcShop/package.json");
    echo 'ok';
} else {
    echo 'Failed to extract file. Please check your permission.';
}

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
