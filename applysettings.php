<?php

set_time_limit(0);
ini_set('memory_limit', '-1');

if(!get_magic_quotes_gpc()) {
    $_POST = array_map("addslashes", $_POST);
}

$index = '<?php
/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylorotwell@gmail.com>
 */

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We\'ll simply require it
| into the script here so that we don\'t have to worry about manual
| loading any of our classes later on. It feels nice to relax.
|
*/

require __DIR__.\'/mcShop/bootstrap/autoload.php\';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.\'/mcShop/bootstrap/app.php\';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client\'s browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(\'Illuminate\Contracts\Http\Kernel\');

$response = $kernel->handle(
	$request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
';

file_put_contents("mcShop/public/index.php", $index);

file_put_contents("mcShop/.htaccess", "Deny from all");

$database = "<?php

return [

	/*
	|--------------------------------------------------------------------------
	| PDO Fetch Style
	|--------------------------------------------------------------------------
	|
	| By default, database results will be returned as instances of the PHP
	| stdClass object; however, you may desire to retrieve records in an
	| array format for simplicity. Here you can tweak the fetch style.
	|
	*/

	'fetch' => PDO::FETCH_CLASS,

	/*
	|--------------------------------------------------------------------------
	| Default Database Connection Name
	|--------------------------------------------------------------------------
	|
	| Here you may specify which of the database connections below you wish
	| to use as your default connection for all database work. Of course
	| you may use many connections at once using the Database library.
	|
	*/

	'default' => 'mysql',

	/*
	|--------------------------------------------------------------------------
	| Database Connections
	|--------------------------------------------------------------------------
	|
	| Here are each of the database connections setup for your application.
	| Of course, examples of configuring each database platform that is
	| supported by Laravel is shown below to make development simple.
	|
	|
	| All database work in Laravel is done through the PHP PDO facilities
	| so make sure you have the driver for your particular database of
	| choice installed on your machine before you begin development.
	|
	*/

	'connections' => [

		'sqlite' => [
			'driver'   => 'sqlite',
			'database' => storage_path().'/database.sqlite',
			'prefix'   => '',
		],

		'mysql' => [
			'driver'    => 'mysql',
			'host'      => '" . $_POST['host'] . "',
			'database'  => '" . $_POST['name'] . "',
			'username'  => '" . $_POST['user'] . "',
			'password'  => '" . $_POST['pass'] . "',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
			'strict'    => false,
		],

		'pgsql' => [
			'driver'   => 'pgsql',
			'host'     => env('DB_HOST', 'localhost'),
			'database' => env('DB_DATABASE', 'forge'),
			'username' => env('DB_USERNAME', 'forge'),
			'password' => env('DB_PASSWORD', ''),
			'charset'  => 'utf8',
			'prefix'   => '',
			'schema'   => 'public',
		],

		'sqlsrv' => [
			'driver'   => 'sqlsrv',
			'host'     => env('DB_HOST', 'localhost'),
			'database' => env('DB_DATABASE', 'forge'),
			'username' => env('DB_USERNAME', 'forge'),
			'password' => env('DB_PASSWORD', ''),
			'prefix'   => '',
		],

	],

	/*
	|--------------------------------------------------------------------------
	| Migration Repository Table
	|--------------------------------------------------------------------------
	|
	| This table keeps track of all the migrations that have already run for
	| your application. Using this information, we can determine which of
	| the migrations on disk haven't actually been run in the database.
	|
	*/

	'migrations' => 'migrations',

	/*
	|--------------------------------------------------------------------------
	| Redis Databases
	|--------------------------------------------------------------------------
	|
	| Redis is an open source, fast, and advanced key-value store that also
	| provides a richer set of commands than a typical key-value systems
	| such as APC or Memcached. Laravel makes it easy to dig right in.
	|
	*/

	'redis' => [

		'cluster' => false,

		'default' => [
			'host'     => '127.0.0.1',
			'port'     => 6379,
			'database' => 0,
		],

	],

];
";

file_put_contents("mcShop/config/database.php", $database);

$mcshop = "<?php

return [

    'title' => '" . $_POST['appname'] . "'

];";

file_put_contents("mcShop/config/mcshop.php", $mcshop);

$uid = '<script src="https://www.tmtopup.com/topup/3rdTopup.php?uid=' . $_POST['uid'] . '"></script>
<script>
    function getPid() {
        var pid = searchpid(submit_tmnc.toString(), "input_pid.value = \"");
        if(pid == false) {
            var pid2 = searchpid(submit_payment.toString(), "\"pid\" : \"");
            if(pid2 == false) {
                return false;
            } else {
                return pid2;
            }
        } else {
            return pid;
        }
    }

    function searchpid(d, s) {
        var pos = d.indexOf(s);
        if(pos == -1) {
            return false;
        }
        var pid = d.substring(pos + s.length, pos + s.length + 25);
        return trimPid(pid, 25);
    }

    function trimPid(pid, l) {
        if(!isInt(pid.substring(l - 1, l))) {
            return trimPid(pid.substring(0, l - 1), l - 1);
        } else {
            return pid;
        }
    }

    function isInt(value) {
        return !isNaN(value) &&
            parseInt(Number(value)) == value &&
            !isNaN(parseInt(value, 10));
    }
</script>';

file_put_contents("mcShop/public/assets/core/components/topup-tmtopup/tmt-custom3rd.html", $uid);

$passkey = '<?php

return [

    "passkey" => "PASSKEY_HERE",

    "amounts" => [
            "TMT50" => 50,
            "TMT90" => 90,
            "TMT150" => 150,
            "TMT300" => 300,
            "TMT500" => 500,
            "TMT1000" => 1000
        ]

];';

file_put_contents("mcShop/app/Plugins/Plugins/TMTopup/config/config.php", $passkey);

$db = new PDO('mysql:host=' . $_POST['host'] . ';dbname=' . $_POST['name'] . ';charset=utf8', $_POST['user'], $_POST['pass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$templine = '';
$lines = file("mcShop/tests/mcshop.sql");
foreach ($lines as $line)
{
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;

    $templine .= $line;
    if (substr(trim($line), -1, 1) == ';')
    {
        $db->query($templine);
        $templine = '';
    }
}
