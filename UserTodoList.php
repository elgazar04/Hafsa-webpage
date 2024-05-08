<?php
class UserTodoList {
    private $tasks = array();

    public function __construct() {
        // Initialize tasks array from cookies
        if(isset($_COOKIE['tasks'])) {
            $this->tasks = unserialize($_COOKIE['tasks']);
        }

        // Initialize prayer progress array from cookies
        if(isset($_COOKIE['prayerProgress'])) {
            $this->prayerProgress = unserialize($_COOKIE['prayerProgress']);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->handleFormSubmission();
        }
    }

    public function addTask($task) {
        // Add a task to the list
        $this->tasks[] = array('task' => $task, 'completed' => false);
        $this->saveTasksToCookie();
    }

    public function markTaskCompleted($index) {
        // Mark a task as completed
        if(isset($this->tasks[$index])) {
            $this->tasks[$index]['completed'] = true;
            $this->saveTasksToCookie();
        }

    
    }
    public function getTasks() {
        // Get all tasks
        return $this->tasks;
    }

    private function saveTasksToCookie() {
        // Save tasks array to cookie
        setcookie('tasks', serialize($this->tasks), time() + (86400), "/"); // 86400 = 1 day
    }

    public function clearTasks() {
        // Clear all tasks
        $this->tasks = array();
        setcookie('tasks', '', time() - 3600, "/"); // Clear cookie
    }

     // Methods for tasks...

    public function prayerCheck($prayer, $progress) {
        // Update or add progress for a specific prayer
        $this->prayerProgress[$prayer] = $progress;
        $this->savePrayerProgressToCookie();
    }   

    public function getPrayerProgress() {
        // Get prayer progress
        return $this->prayerProgress;
    }

    private function savePrayerProgressToCookie() {
        // Save prayer progress array to cookie
        setcookie('prayerProgress', serialize($this->prayerProgress), time() + (86400), "/"); // 86400 = 1 day
    }

    private function handleFormSubmission() {
        // Check if prayers are selected
        if (isset($_POST['prayers'])) {
            // Get selected prayers
            $selectedPrayers = $_POST['prayers'];

            // Update prayer progress for each selected prayer
            foreach ($selectedPrayers as $prayer) {
                // Update prayer progress (set to true for simplicity)
                $this->prayerCheck($prayer, true);
            }

            // Redirect back to the page after updating progress
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    }

    public function renderPrayerProgressForm() {
        // HTML form for prayer progress
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h2>Prayer Progress</h2>
            <input type="checkbox" id="fajr" name="prayers[]" value="Fajr">
            <label for="fajr">Fajr</label><br>
            <input type="checkbox" id="dhuhr" name="prayers[]" value="Dhuhr">
            <label for="dhuhr">Dhuhr</label><br>
            <input type="checkbox" id="asr" name="prayers[]" value="Asr">
            <label for="asr">Asr</label><br>
            <input type="checkbox" id="maghrib" name="prayers[]" value="Maghrib">
            <label for="maghrib">Maghrib</label><br>
            <input type="checkbox" id="isha" name="prayers[]" value="Isha">
            <label for="isha">Isha</label><br>
            <input type="submit" value="Submit">
        </form>
        <?php
    }
}

// Instantiate the UserTodoList class
$userTodoList = new UserTodoList();

// Render the prayer progress form
$userTodoList->renderPrayerProgressForm();

// Display prayer progress
$prayerProgress = $userTodoList->getPrayerProgress();
echo "<h2>Prayer Progress:</h2>";
echo "<pre>";
print_r($prayerProgress);
echo "</pre>";

// Clear all tasks (for the next day)
$userTodoList->clearTasks();

?>