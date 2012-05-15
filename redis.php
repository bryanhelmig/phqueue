<?

require_once 'libs/predis/lib/Predis/Autoloader.php';

$redis_config = array(
    'host'     => '127.0.0.1',
    'port'     => 6380,
    'database' => 13
);

Predis\Autoloader::register();

$redis = new Predis\Client($redis_config);
$queue = 'phqueue';

?>