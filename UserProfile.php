<?php
require_once 'Database.php';

class UserProfile {
    private $db;

    public function __construct() {
        $this->db = new Database();
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
        echo "User ID: " . $userData['user_id'] . "<br>";
        echo "No of Khatma: " . $userData['khatma'] . "<br>";
        echo "Fasting Days: " . $userData['fasting_days'] . "<br>";
        echo "Quran Progress: " . $userData['quran_progress'] . "<br>";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "User is not logged in.";
}
?>
