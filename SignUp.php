<?php
require_once 'Person.php';
require_once 'Database.php';

class SignUp extends Person {
    private $db;

    // Constructor
   public function __construct($username, $password, $phone, $email, $id, $city, $country) {
        parent::__construct($username, $password, $phone, $email, $id, $city, $country);
        $this->db = new Database();
    }

    // Implementing abstract methods
    public function setName($name) {
        $this->username = $name;
    }

    public function setPassword($password) {
        // Check password requirements
        if (!$this->validatePassword($password)) {
            throw new Exception("Password must be 12 characters long and contain both uppercase and lowercase letters.");
        }
        $this->password = $password;
    }


    public function checkName($name) {
        return $this->username === $name;
    }

    public function checkPassword($password) {
        return $this->password === $password;
    }


    // Getter and setter methods for country and city
    public function getCountry() {
        return $this->country;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    // Logic for handling incorrect username/password
    public function incorrectNamePass() {
        $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
        $params = [$this->username, $this->password];
        $result = $this->db->executeQuery($sql, $params);

        if ($result->num_rows == 0) {
            $this->db->closeConnection();
            throw new Exception("Incorrect username or password. Please try again.");
        }
    }
/* 
    public function forgetPass() {
        // Logic for password recovery
    } */

       // Method to validate password requirements
       private function validatePassword($password) {
        // Password must be 12 characters long and contain both uppercase and lowercase letters
        return strlen($password) >= 12 && preg_match('/[A-Z]/', $password) && preg_match('/[a-z]/', $password);
    }

    // Method to insert user data into database upon sign up
     public function signUp() {
        $sql = "INSERT INTO user (name, password, phone, email, country, city, id) VALUES (?, ?, ?, ?, ?,? ,?) ";   
        $params = [$this->username, $this->password, $this->phone, $this->email,$this->country ,$this->city, $this->id ];
        $this->db->executeQuery($sql, $params);
        $this->db->closeConnection();
    } 

}
   // Process sign-up form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Retrieve form data
        $username = $_POST['username'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        // Create a new SignUp object
        $signUp = new SignUp($username, $password, $phone, $email, $country, $city, "");
        // Attempt to sign up the user
        $signUp->setPassword($password);
        $signUp->signUp();
        echo "User successfully signed up!";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
     // Redirect after update to prevent form resubmission
     //header("Location:   ".$_SERVER['PHP_SELF']);
     exit();
     
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
</head>
<body>
    <h2>Sign Up</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>

        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone"><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="country">Country:</label><br>
        <input type="text" id="country" name="country" required><br>

        <label for="city">City:</label><br>
        <input type="text" id="city" name="city" required><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
