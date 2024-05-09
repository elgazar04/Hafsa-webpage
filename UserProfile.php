<?php
require_once 'Database.php';

class UserProfile {
    private $db;

    public function __construct() {
        $this->db = new Database();
        //session_start();
    }

    // Get user profile data by user ID
    public function getUserProfile($userId) {
        $sql = "SELECT * FROM userprofile WHERE user_id = ?";
        $params = [$userId];
        $result = $this->db->executeQuery($sql, $params);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); // Return user data
        } else {
            throw new Exception("User profile not found.");
        }
    }

    public function updateProfileCounts($userId, $khatmasCount, $fastingDaysCount) {
        $sql = "UPDATE userprofile SET khatma = ?, fasting_days = ? WHERE user_id = ?";
        $params = array($khatmasCount, $fastingDaysCount, $userId);
        return $this->db->executeQuery($sql, $params);
    }
}

// Usage example
// Start the session
session_start();

// Check if user is logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    
    try {
        // Create UserProfile object
        $userProfile = new UserProfile();
        
        // Get user profile data
        $userData = $userProfile->getUserProfile($userId);
        
        // Output user profile data (you can customize this part)
        //echo "User ID: " . $userData['user_id'] . "<br>";
        echo "No of Khatma: " . $userData['khatma'] . "<br>";
        echo "Fasting Days: " . $userData['fasting_days'] . "<br>";
        echo "Quran Progress: " . $userData['quran_progress'] . "<br>";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "User is not logged in.";
}


// Form handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        echo "User not logged in.";
        exit;
    }

    $userId = $_SESSION['user_id'];

    if (isset($_POST['khatmas']) && isset($_POST['fasting_days'])) {
        $khatmasCount = $_POST['khatmas'];
        $fastingDaysCount = $_POST['fasting_days'];

        $userProfile = new UserProfile();
        $success = $userProfile->updateProfileCounts($userId, $khatmasCount, $fastingDaysCount);

        if ($success) {
            echo "User profile updated successfully.";
        } else {
            echo "Success !!";
        }
    } else {
        echo "Form fields not submitted.";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <h2>User Profile</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="khatmas">Number of Khatmas:</label>
        <input type="number" id="khatmas" name="khatmas" required><br><br>
        
        <label for="fasting_days">Number of Fasting Days:</label>
        <input type="number" id="fasting_days" name="fasting_days" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>