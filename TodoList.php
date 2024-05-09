<?php
/* 
class TodoList {
    private $tasks = array();
    
    public function addTask($task) {
        $this->tasks[] = $task;
    }
    
    public function displayTasks() {
        if (!empty($this->tasks)) {
            foreach ($this->tasks as $task) {
                echo $task . "<br>";
            }
        } else {
            echo "No tasks added yet.<br>";
        }
    }
    
    public function completeTask($index) {
        if (isset($this->tasks[$index])) {
            $this->tasks[$index] .= " - Completed";
        }
    }
    
    public function getTasks() {
        return $this->tasks;
    }
    
    public function updateProgressCookie() {
        $progress = json_encode($this->tasks);
        setcookie('todo_progress', $progress, time() + (86400 * 30), "/");
    }
    
    public static function loadProgressFromCookie() {
        if (isset($_COOKIE['todo_progress'])) {
            return json_decode($_COOKIE['todo_progress'], true);
        } else {
            return array();
        }
    }
} */

?>
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List Form</title>
</head>
<body>
    <h2>Todo List Form</h2>
    <form action="" method="post">
        <label for="task">Task:</label><br>
        <input type="text" id="task" name="task" required><br><br>
        <input type="submit" value="Add Task">
    </form> -->

    <?php
   /*  // Include the TodoList class
    require_once 'TodoList.php';

    // Create a new todo list object
    $todoList = new TodoList();

    // Load progress from cookies (if any)
    $progress = TodoList::loadProgressFromCookie();
    if (!empty($progress)) {
        $todoList->addTask("Previously added tasks:");
        foreach ($progress as $task) {
            $todoList->addTask($task);
        }
    }

    // Check if tasks are submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['task'])) {
        // Add the submitted task to the todo list
        $task = $_POST['task'];
        $todoList->addTask($task);

        // Display the updated tasks
        echo "<h3>Current Tasks:</h3>";
        $todoList->displayTasks();

        // Update progress in cookies
        $todoList->updateProgressCookie();
    } else {
        // Display the default tasks
        echo "<h3>Current Tasks:</h3>";
        $todoList->displayTasks();
    }

    // Check if task completion status is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['completed'])) {
        $completedIndexes = $_POST['completed'];
        foreach ($completedIndexes as $index) {
            $todoList->completeTask($index);
        }
        // Update progress in cookies
        $todoList->updateProgressCookie();

        // Display the updated tasks
        echo "<h3>Updated Tasks:</h3>";
        $todoList->displayTasks();
    } */
    ?>
<!--     
    <form action="" method="post">
        <h3>Mark Tasks as Completed:</h3>
        <?php
        /* // Display tasks with checkboxes
        foreach ($todoList->getTasks() as $index => $task) {
            echo "<input type='checkbox' name='completed[]' value='$index'> $task <br>";
        } */
        ?>
        <br>
        <input type="submit" value="Update">
    </form>
</body>
</html> -->


<?php

/* class TodoList {
    private $tasks = array();
    private $completedTasks = array();
    
    public function addTask($task) {
        $this->tasks[] = $task;
    }
    
    public function displayTasks() {
        if (!empty($this->tasks)) {
            foreach ($this->tasks as $index => $task) {
                echo $task . "<br>";
            }
        } else {
            echo "No tasks added yet.<br>";
        }
    }

    public function displayCompletedTasks() {
        if (!empty($this->completedTasks)) {
            foreach ($this->completedTasks as $task) {
                echo $task . "<br>";
            }
        } else {
            echo "No tasks completed yet.<br>";
        }
    }
    
    public function completeTask($index) {
        if (isset($this->tasks[$index])) {
            $completedTask = $this->tasks[$index] . " - Completed";
            $this->completedTasks[] = $completedTask;
            unset($this->tasks[$index]);
            // Update progress in cookies
            $this->updateProgressCookie();
        }
    }
    
    public function getTasks() {
        return $this->tasks;
    }
    
    public function getCompletedTasks() {
        return $this->completedTasks;
    }
    
    public function updateProgressCookie() {
        $progress = json_encode(array('tasks' => $this->tasks, 'completedTasks' => $this->completedTasks));
        setcookie('todo_progress', $progress, time() + 60 /* (86400 * 30), "/");
    }
    
    public static function loadProgressFromCookie() {
        if (isset($_COOKIE['todo_progress'])) {
            $progress = json_decode($_COOKIE['todo_progress'], true);
            $tasks = isset($progress['tasks']) ? $progress['tasks'] : array();
            $completedTasks = isset($progress['completedTasks']) ? $progress['completedTasks'] : array();
            return array('tasks' => $tasks, 'completedTasks' => $completedTasks);
        } else {
            return array('tasks' => array(), 'completedTasks' => array());
        }
    }
} */

?>
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List Form</title>
</head>
<body>
    <h2>Todo List Form</h2>
    <form action="" method="post">
        <label for="task">Task:</label><br>
        <input type="text" id="task" name="task" required><br><br>
        <input type="submit" name="action" value="Add Task">
        <input type="submit" name="action" value="Mark as Completed">
    </form> -->

    <?php
    /* // Include the TodoList class
    require_once 'TodoList.php';

    // Create a new todo list object
    $todoList = new TodoList();

    // Load progress from cookies (if any)
    $progress = TodoList::loadProgressFromCookie();
    if (!empty($progress)) {
        foreach ($progress['tasks'] as $task) {
            $todoList->addTask($task);
        }
        foreach ($progress['completedTasks'] as $task) {
            $todoList->completeTask($task);
        }
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
        if ($_POST['action'] === "Add Task") {
            // Add a new task
            if (isset($_POST['task']) && !empty($_POST['task'])) {
                $task = $_POST['task'];
                $todoList->addTask($task);
                // Update progress in cookies
                $todoList->updateProgressCookie();
                
                //exit();
            }
        } elseif ($_POST['action'] === "Mark as Completed") {
            // Mark tasks as completed
            if (isset($_POST['completed'])) {
                $completedIndexes = $_POST['completed'];
                foreach ($completedIndexes as $index) {
                    $todoList->completeTask($index);
                }
                // Update progress in cookies
                $todoList->updateProgressCookie();
            }
        }
    }

    // Display the current tasks
    echo "<h3>Current Tasks:</h3>";
    $todoList->displayTasks();

    // Display checkboxes to mark tasks as completed
    if (!empty($todoList->getTasks())) {
        echo "<form action='' method='post'>";
        echo "<h3>Mark Tasks as Completed:</h3>";
        foreach ($todoList->getTasks() as $index => $task) {
            echo "<input type='checkbox' name='completed[]' value='$index'> $task <br>";
        }
        echo "<br>";
        echo "<input type='submit' name='action' value='Mark as Completed'>";
        echo "</form>";
    }

    // Display completed tasks
    echo "<h3>Completed Tasks:</h3>";
    $todoList->displayCompletedTasks(); */
    ?>
<!-- </body>
</html> -->

<?php
session_start();

class TodoList {
    private $tasks = array();
    private $completedTasks = array();
    
    public function addTask($task) {
        $this->tasks[] = $task;
    }
    
    public function displayTasks() {
        if (!empty($this->tasks)) {
            foreach ($this->tasks as $index => $task) {
                echo $task . "<br>";
            }
        } else {
            echo "No tasks added yet.<br>";
        }
    }

/*     public function displayCompletedTasks() {
        if (!empty($this->completedTasks)) {
            foreach ($this->completedTasks as $task) {
                echo $task . "<br>";
            }
        } else {
            echo "No tasks completed yet.<br>";
        }
    } */

    public function displayCompletedTasks() {
        if (!empty($this->completedTasks)) {
            foreach ($this->completedTasks as $task) {
                echo $task . "<br>";
            }
        } else {
            echo "No tasks completed yet.<br>";
        }
    }
    
    public function completeTask($index) {
        if (isset($this->tasks[$index])) {
            $completedTask = $this->tasks[$index] . " - Completed";
            $this->completedTasks[] = $completedTask;
            unset($this->tasks[$index]);
            // Update progress in cookies
            $this->updateProgressCookie();
        }
    }
    
    
    
    public function getTasks() {
        return $this->tasks;
    }
    
    public function getCompletedTasks() {
        return $this->completedTasks;
    }
    
  /*   public function updateProgressCookie() {
        $progress = json_encode(array('tasks' => $this->tasks, 'completedTasks' => $this->completedTasks));
        setcookie('todo_progress', $progress, time() + (86400 * 30), "/");
    } */
    public function updateProgressCookie() {
        // Merge current tasks with previously stored tasks from cookies
        $progress = array(
            'tasks'=> $this->tasks,
            //'tasks' => array_merge($this->tasks, isset($_SESSION['todo_progress']['tasks']) ? $_SESSION['todo_progress']['tasks'] : []),
            //'completedTasks' => array_merge($this->completedTasks, isset($_SESSION['todo_progress']['completedTasks']) ? $_SESSION['todo_progress']['completedTasks'] : [])
            'completedTasks' => $this->completedTasks,
        );
    
        // Store the merged progress in session for use in the current request
        //$_SESSION['todo_progress'] = $progress;
    
        // Store the merged progress in cookies
        $progress_json = json_encode($progress);
        setcookie('todo_progress', $progress_json, time() +  60, "/");
    }
    
    
  /*   public static function loadProgressFromCookie() {
        if (isset($_COOKIE['todo_progress'])) {
            $progress = json_decode($_COOKIE['todo_progress'], true);
            $tasks = isset($progress['tasks']) ? $progress['tasks'] : array();
            $completedTasks = isset($progress['completedTasks']) ? $progress['completedTasks'] : array();
            return array('tasks' => $tasks, 'completedTasks' => $completedTasks);
        } else {
            return array('tasks' => array(), 'completedTasks' => array());
        }
    } */

    public static function loadProgressFromCookie() {
        if (isset($_COOKIE['todo_progress'])) {
            $_SESSION['todo_progress'] = json_decode($_COOKIE['todo_progress'], true);
            return $_SESSION['todo_progress'];
        } else {
            return array('tasks' => array(), 'completedTasks' => array());
        }
    }
    

    public function handleFormSubmission() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
            if ($_POST['action'] === "Add Task") {
                // Add a new task
                if (isset($_POST['task']) && !empty($_POST['task'])) {
                    $task = $_POST['task'];
                    $this->addTask($task);
                    // Update progress in cookies
                    $this->updateProgressCookie();
                }
            } elseif ($_POST['action'] === "Mark as Completed") {
                // Mark tasks as completed
                if (isset($_POST['completed'])) {
                    $completedIndexes = $_POST['completed'];
                    foreach ($completedIndexes as $index) {
                        $this->completeTask($index);
                    }
                    // Update progress in cookies
                    $this->updateProgressCookie();
                }
            }
    
            header("Location: TodoList.php"); // Redirect to the main page after form submission
            exit();
        }
    }
}

// Instantiate TodoList object
$todoList = new TodoList();

// Load progress from cookies (if any)
$progress = TodoList::loadProgressFromCookie();
if (!empty($progress)) {
    foreach ($progress['tasks'] as $task) {
        $todoList->addTask($task);
    }
    foreach ($progress['completedTasks'] as $task) {
        $todoList->completeTask($task);
    }
}

// Handle form submission
$todoList->handleFormSubmission();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List Form</title>
</head>
<body>
    <h2>Todo List Form</h2>
    <form action="" method="post">
        <label for="task">Task:</label><br>
        <input type="text" id="task" name="task" required><br><br>
        <input type="submit" name="action" value="Add Task">
        <input type="submit" name="action" value="Mark as Completed">
    </form>

    <h3>Current Tasks:</h3>
    <?php $todoList->displayTasks(); ?>

    <?php if (!empty($todoList->getTasks())): ?>
        <form action="" method="post">
            <h3>Mark Tasks as Completed:</h3>
            <?php foreach ($todoList->getTasks() as $index => $task): ?>
                <input type="checkbox" name="completed[]" value="<?= $index ?>"> <?= $task ?><br>
            <?php endforeach; ?>
            <br>
            <input type="submit" name="action" value="Mark as Completed">
        </form>
    <?php endif; 
     // Display completed tasks
     echo "<h3>Completed Tasks:</h3>";
     $todoList->displayCompletedTasks();
    ?>
   
</body>
</html>

