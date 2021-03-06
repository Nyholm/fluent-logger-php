<?php
require_once dirname(dirname(__DIR__)) .'/src/Fluent/Autoloader.php';

use Fluent\Logger\FluentLogger;
Fluent\Autoloader::register();

$begin = microtime(true);

$logger = new FluentLogger("unix:///tmp/fluent");
//$logger = new FluentLogger("tcp://0.0.0.0:24224", null, array("persistent"=> true));
for($i=0;$i<10;$i++) {
    $logger->post("debug.test", $_SERVER);
}
$end = microtime(true);
echo "OK" . PHP_EOL;
printf("%6f\n", $end-$begin);