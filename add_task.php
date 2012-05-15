<?

include_once 'redis.php';
include_once 'tasks.php';

add_task('email_friends', array('user_id' => 213, 'message' => 'I just bought a car!'));
add_task('email_friends', array('user_id' => 213, 'message' => 'I is really nice!'));
add_task('email_friends', array('user_id' => 213, 'message' => 'Seriously, it goes so fast!'));

?>