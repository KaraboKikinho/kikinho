<?php  

declare(strict_types=1);

session_start();


use Framework\Http\Kernel;
use Framework\Http\Request;
use Framework\Http\Response; 

define("BASE_PATH", dirname(__DIR__)); 

require_once BASE_PATH.'/vendor/autoload.php';

$request = Request::createFromGlobals();
$kernel = new Kernel();
$response = $kernel->handle($request);
// $response->send();

exit;

?>






