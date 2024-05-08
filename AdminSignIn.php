<?php
require_once 'Person.php';
require_once 'Database.php';

class SignIn extends Person {
    private $db;

    // Constructor
    public function __construct($username, $password) {
        parent::__construct($username, $password, '', '', '',''); // Set empty values for phone, email, and id
        $this->db = new Database();
    }

    // Implementing abstract methods
    public function setName($name) {
        $this->username = $name;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setId($id) {
        // SignIn class does not require id
    }

    public function checkName($name) {
        return $this->username === $name;
    }

    public function checkPassword($password) {
        return $this->password === $password;
    }

    public function checkId($id) {
        // SignIn class does not require id
    }

    // Logic for handling incorrect username/password
    public function incorrectNamePass() {
        $sql = "SELECT * FROM admin WHERE name = ?";
        $params = [$this->username];
        $result = $this->db->executeQuery($sql, $params);

        if ($result->num_rows == 0) {
            $this->db->closeConnection();
            throw new Exception("Incorrect username. Please try again.");
        }

        $user = $result->fetch_assoc();
        if ($user['password'] !== $this->password) {
            $this->db->closeConnection();
            throw new Exception("Incorrect password. Please try again.");
        }

        // Authentication successful
        $this->db->closeConnection();
        return true;
    }

    // Method for password recovery
    public function forgetPass(){

    }
    public function passwordRecovery() {
        // Logic for sending recovery email to user
        // You can implement email sending functionality here
    }
}
    // Process sign-in form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Retrieve form data
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Create a new SignIn object
        $signIn = new SignIn($username, $password);

        // Attempt to sign in the user
        $signIn->incorrectNamePass();
        header("Location: admin_dashboard.php");
        } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin Sign In Form</title>
</head>
<body>
    <h2>Admin Sign In</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
