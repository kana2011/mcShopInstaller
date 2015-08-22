<?php

error_reporting(0);

register_shutdown_function( "fatal_handler" );

if(!get_magic_quotes_gpc()) {
    $_POST = array_map("addslashes", $_POST);
}

function fatal_handler() {
    echo failed;
}

if((!isset($_POST['host']) || !isset($_POST['user']) || !isset($_POST['pass']) || !isset($_POST['name'])) || ((empty($_POST['host']) || empty($_POST['user']) || empty($_POST['name'])))) {
    die();
}

$db = new PDO('mysql:host=' . $_POST['host'] . ';dbname=' . $_POST['name'] . ';charset=utf8', $_POST['user'], $_POST['pass']);
define('failed', 'success');
