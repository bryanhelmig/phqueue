## A simple, redis powered task queue for PHP.

Redis will act as the broker. Make sure that is running and the settings
in `redis.php` are appropriate for your setup.

The worker is ran with `php worker.php`.

Some example producers are in the script `add_task.php`, try adding
example tasks to the queue by running `php add_task.php`.

The task definition file is in `tasks.php`.

### Adding and running a new task.

Let's add a task called `scare_me` that will wait 5 seconds, and then echo
*BOO! I am going to eat you {name}!*. In `tasks.php`:

```php
class Tasks {
    
    # ... other tasks here...

    public function scare_me($params) {
        echo 'waiting to pounce...';
        sleep(5);
        echo 'BOO! I am going to eat you '.$params->name.'!';
    }

}
```

Let's get the worker running in the background:

```php worker.php```

Now, let's add the task to the queue by running some code like so:

```php
require_once 'tasks.php';

add_task('scare_me', array('name' => 'Bryan'));
```

If you look at the console running the worker, you should see the text
after 5 seconds. At that point, the worker will wait for another job.

### Scaling.

If you need to do more tasks, run more workers! You might want to do
something with supervisord and forking.