<?
include_once('tasks.php');

$queue = 'phqueue';

$redis = new Predis\Client('redis://127.0.0.1:6379');

while (true) {
    $data = $redis->blpop($queue);

    if (!$data) {
        continue;
    }

    $data = json_decode($data);


}
?>