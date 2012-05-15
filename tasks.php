<?

include_once 'redis.php';

class Tasks {

    public function email_friends($params) {
        $user_id = $params->user_id;
        $message = $params->message;

        # probably would *get* a list of friends from the db...
        $friends = array('bill@example.com', 'john@example.com');

        foreach ($friends as $friend) {
            echo "Fake email ".$friend." with ".$message."\n";
            #mail($friend, 'New message!', $message, null, 'no-reply@example.com');
        }
    }

    ###########################
    ### add more tasks here ###
    ###########################

}

function add_task($task_name, $params) {
    global $redis, $queue;
    $data = Array('task_name' => $task_name, 'params' => $params);
    $redis->rpush($queue, json_encode($data));
}

?>