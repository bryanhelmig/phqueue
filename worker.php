<?

include_once 'redis.php';
include_once 'tasks.php';


$tasks = new Tasks();

while (true) {
    # BLPOP will block until it gets an item..
    $data = $redis->blpop($queue, 0);

    if (!$data) {
        continue;
    }

    $json = json_decode($data[1]); # grab results...
    $task_name = $json->task_name;
    $params = $json->params;

    # calls the task: Task::$task_name($params)...
    call_user_func(array($tasks, $task_name), $params);
}
?>