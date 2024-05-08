<?php
require_once 'Database.php';

class AdminDashboard {
    private $db;

    public function __construct() {
        // Initialize database connection
        $this->db = new Database('localhost', 'root', '', 'eslamiat');

            // Start or resume session
            //session_start();

    }

    public function isLoggedIn() {
        // Check if admin is logged in using CheckLogin class
        return CheckLogin::isAdminLoggedIn();
    }

    public function logIn($username) {
        // Log in admin
        CheckLogin::logInAdmin($username);
    }

    public function logOut() {
        // Log out admin
        CheckLogin::logOut();
    }
    
    //Start Admin in Users Operations
    public function insertUser($userData){
        try{    
            $table = 'user';
            $result = $this->db->insert($table, $userData);
            if ($result) echo "User record updated successfully" ; else return false;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function selectUsers() {
        try {
            // Select all users from the 'users' table
            $result = $this->db->select('user');
            
            // Check if there are any rows returned
            if ($result->num_rows > 0) {
                // Loop through each row and display user information
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="well">';
                    
                    // Display username, email address, and date registered
                    echo "User Id: " .$row ['id'] ."<br />";
                    echo "Username: " . $row['name'] . "<br>";
                    echo "Email: " . $row['email'] . "<br>";
                    echo "Location: "  . $row['city'].  ", ". $row['country'] ."<br>";
                    echo "Phone number: " . $row['phone']. "<br><hr>" ; 
                    // Add more fields as needed
                }
            } else {
                // No users found
                echo "No users found.";
            }
        } catch (Exception $e) {
            // Handle any exceptions that occur during the database operation
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateUsers($userId, $newData) {
        try {
            // Construct the update query
            $table = 'user';
            $condition = "id = $userId";
            $result = $this->db->update($table, $newData, $condition);

            // Check if the update operation was successful
            if ($result === true) {
                echo "User record updated successfully.";
            } else {
                // Check for the number of affected rows
                if ($this->db->getAffectedRows() > 0) {
                    echo "User record updated successfully.";
                } else {
                    echo "User record updated successfully.";
                }
            }
        } catch (Exception $e) {
            // Handle any exceptions that occur during the database operation
            echo "Error: " . $e->getMessage();
        }
    }

    public function userDelete($userId) {
        try {
            // Construct the delete query
            $table = 'user';
            $condition = "id = $userId";
            $result = $this->db->delete($table, $condition);

            // Check if the delete operation was successful
            if ($result === true) {
                echo "User deleted successfully.";
            } else {
                echo "User deleted successfully.";
            }
        } catch (Exception $e) {
            // Handle any exceptions that occur during the database operation
            echo "Error: " . $e->getMessage();
        }
    }

    //End Admin in Users Operations 

    //Start Admin in Inspirations Operations 
    public function insertInspiration($content) {
        try {
            // Construct the insert query
            $table = 'inspiration';
            $data = array(
                'content' => $content
            );
            $result = $this->db->insert($table, $data);
    
            // Check if the insert operation was successful
            if ($result === true) {
                echo "Inspiration inserted successfully.";
            } else {
                echo "Failed to insert inspiration.";
            }
        } catch (Exception $e) {
            // Handle any exceptions that occur during the database operation
            echo "Error: " . $e->getMessage();
        }
    }

    public function selectInspirations() {
        try {
            // Construct the select query
            $table = 'inspiration';
            $result = $this->db->select($table);
    
            // Check if inspirations were found
            if ($result->num_rows > 0) {
                echo "<h2>Inspirations List:</h2>";
                while ($row = $result->fetch_assoc()) {
                    echo "ID: " . $row['id'] . ", Content: " . $row['content'] . "<br><hr>";
                }
            } else {
                echo "No inspirations found.";
            }
        } catch (Exception $e) {
            // Handle any exceptions that occur during the database operation
            echo "Error: " . $e->getMessage();
        }
    }
     
    public function deleteInspiration($id) {
        try {
            // Construct the delete query
            $table = 'inspiration';
            $condition = "id = $id";
            $result = $this->db->delete($table, $condition);
    
            // Check if the delete operation was successful
            if ($result === true) {
                echo "Inspiration deleted successfully.";
            } else {
                echo "Failed to delete inspiration.";
            }
        } catch (Exception $e) {
            // Handle any exceptions that occur during the database operation
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateInspiration($id, $content) {
        try {
            // Construct the update query
            $table = 'inspiration';
            $data = array(
                'content' => $content
            );
            $condition = "id = $id";
            $result = $this->db->update($table, $data, $condition);
    
            // Check if the update operation was successful
            if ($result === true) {
                echo "Inspiration updated successfully.";
            } else {
                echo "Failed to update inspiration.";
            }
        } catch (Exception $e) {
            // Handle any exceptions that occur during the database operation
            echo "Error: " . $e->getMessage();
        }
    }
    
    //End Admin in Inspirations Operations 


    //Start  Admin in Versus and Duas Operations 
    public function insertVersesDuasHadith($VersesDuasHadith){
        try{    
            $table = 'popular_versus_daily_duas';
            $result = $this->db->insert($table, $VersesDuasHadith);
            if ($result) echo "Daily content inserted successfully" ; 
            else return false;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function selectVersesDuasHadith() {
        try {
            // Select all users from the 'users' table
            $result = $this->db->select('popular_versus_daily_duas');
            
            // Check if there are any rows returned
            if ($result->num_rows > 0) {
                // Loop through each row and display user information
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="well">';
                    // Display Daily Versus, Duas, and Hadith 
                    echo "Day Id: " .$row ['id'] ."<br />";
                    echo "Verses " . $row['versus'] . "<br>";
                    echo "Duas: " . $row['duas'] . "<br>";
                    echo "Hadith: "  . $row['hadith']. "<br><hr>";
                    // Add more fields as needed
                }
            } else {
                // No Content found
                echo "No Content found.";
            }
        } catch (Exception $e) {
            // Handle any exceptions that occur during the database operation
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateVersesDuasHadith($dayId, $newData) {
        try {
            // Construct the update query
            $table = 'popular_versus_daily_duas';
            $condition = "id = $dayId";
            $result = $this->db->update($table, $newData, $condition);

            // Check if the update operation was successful
            if ($result === true) {
                echo "Daily Content updated successfully.";
            } else {
                // Check for the number of affected rows
                if ($this->db->getAffectedRows() > 0) {
                    echo "Daily Content updated successfully.";
                } else {
                    echo "User record updated successfully.";
                }
            }
        } catch (Exception $e) {
            // Handle any exceptions that occur during the database operation
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteVersesDuasHadith($dayId){
        try {
            // Construct the delete query
            $table = 'popular_versus_daily_duas';
            $condition = "id = $dayId";
            $result = $this->db->delete($table, $condition);

            // Check if the delete operation was successful
            if ($result === true) {
                echo "Content deleted successfully.";
            } else {
                echo "Content deleted successfully.";
            }
        } catch (Exception $e) {
            // Handle any exceptions that occur during the database operation
            echo "Error: " . $e->getMessage();
        }
    }

    //End Admin in Versus and Duas Operations

    //Start Admin in restaurants and mosques Operations

    
    public function selectRestaurantMosques() { 
        try {
            // Select all users from the 'users' table
            $result = $this->db->select('restaurants_mosques');
            
            // Check if there are any rows returned
            if ($result->num_rows > 0) {
                // Loop through each row and display user information
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="well">';
                    // Display Daily Versus, Duas, and Hadith 
                    echo "Name: " .$row ['name'] ."<br />";
                    echo "Category " . $row['category'] . "<br>";
                    echo "Location: "  . $row['address']. ", " . $row['city'].  ", ". $row['country']. "<br><hr>" ;
                    // Add more fields as needed
                }
            } else {
                // No Content found
                echo "No Content found.";
            }
        } catch (Exception $e) {
            // Handle any exceptions that occur during the database operation
            echo "Error: " . $e->getMessage();
        }
    }

    public function insertRestaurantMosques($RestaurantMosqueData){
        try{    
            $table = 'restaurants_mosques';
            $result = $this->db->insert($table,$RestaurantMosqueData);
            if ($result) echo "Data inserted successfully" ; 
            else return false;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    //End Admin in restaurants and mosques Operations




    // Start of Admin dashboard forms
    public function displayUpdateForm() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin Dashboard</title>
        </head>
        <body>
            <h2>Update User</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="userId">User ID:</label><br>
                <input type="text" id="userId" name="userId" required><br>
                
                <label for="newUsername">New Username:</label><br>
                <input type="text" id="newUsername" name="newUsername" required><br>
                
                <label for="newEmail">New Email:</label><br>
                <input type="email" id="newEmail" name="newEmail" required><br>

                <label for="newPhone">New Phone:</label><br>
                <input type="phone" id="newPhone" name="newPhone" required><br>

                <label for="newCity">New City:</label><br>
                <input type="text" id="newCity" name="newCity" required><br>

                <label for="newCountry">New Country:</label><br>
                <input type="text" id="newCountry" name="newCountry" required><br>
                
                <input type="submit" value="Update User" name="update_user">
            </form>
        </body>
        </html>
        <?php
    }

    public function insertionForm(){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <body>
            <h2>Add a new user to the database.</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required><br>
                
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br>

                <label for="Email">Email:</label><br>
                <input type="email" id="Email" name="Email" required><br>

                <label for="Phone">Phone:</label><br>
                <input type="phone" id="Phone" name="Phone" required><br>

                <label for="City">City:</label><br>
                <input type="text" id="City" name="City" required><br>

                <label for="Country">New Country:</label><br>
                <input type="text" id="Country" name="Country" required><br>
                
                <input type="submit" value="Insert User" name="insert_user">   
            </form> 
        </body>
        </html>
            <?php    

    }

    public function displayDeleteForm() {
        ?>
        <h2>Delete User</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="userId">User ID:</label><br>
            <input type="text" id="userId" name="userId" required><br>
            <input type="submit" value="Delete User" name="delete_user">
        </form>
        <?php
    }

    public function displayInsertInspirationForm() {
        ?>
        <h2>Insert Inspiration</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="content">Content:</label><br>
            <textarea id="content" name="content" rows="4" cols="50" required></textarea><br>
            <input type="submit" name="insertInspiration" value="Insert Inspiration">
        </form>
        <?php
    }
    
    public function displayDeleteInspirationForm() {
        ?>
        <h2>Delete Inspiration</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="inspirationId">Inspiration ID:</label><br>
            <input type="text" id="inspirationId" name="inspirationId" required><br>
            <input type="submit" name="deleteInspiration" value="Delete Inspiration">
        </form>
        <?php
    }
    
    public function displayUpdateInspirationForm() {
        ?>
        <h2>Update Inspiration</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="inspirationId">Inspiration ID:</label><br>
            <input type="text" id="inspirationId" name="inspirationId" required><br>
            <label for="content">New Content:</label><br>
            <textarea id="content" name="content" rows="4" cols="50" required></textarea><br>
            <input type="submit" name="updateInspiration" value="Update Inspiration">
        </form>
        <?php
    }

    public function insertionDailyContent(){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <body>
            <h2>Adding The daily Content</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                <label for="verses">Today's Verses</label><br>
                <input type="text" id="verses" name="verses" required><br>
                
                <label for="dua">Today's Dua:</label><br>
                <input type="text" id="dua" name="dua" required><br>

                <label for="hadith">Today's Hadith:</label><br>
                <input type="text" id="hadith" name="hadith" required><br>
                
                <input type="submit" value="Insert Daily Content " name="insert_DailyContent">   
            </form> 
        </body>
        </html>
            <?php    

    }

    public function updateDailyContent() {
        ?>
            <h2>Update Daily Content</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="dayId">Day ID:</label><br>
                <input type="number" id="dayId" name="dayId" required><br>
                
                <label for="newVerses">New Verses:</label><br>
                <input type="text" id="newVerses" name="newVerses" required><br>
                
                <label for="newDuas">New Duas:</label><br>
                <input type="text" id="newDuas" name="newDuas" required><br>

                <label for="newHadith">New Hadith:</label><br>
                <input type="text" id="newHadith" name="newHadith" required><br>

                <input type="submit" value="Update Daily Content" name="update_dailyContent">
            </form>
        <?php
    }

    public function deleteDailyContent(){
        ?>
        <h2>Delete Daily Content</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="dayId">Day ID:</label><br>
            <input type="number" id="dayId" name="dayId" required><br>
            <input type="submit" value="Delete Daily Content" name="delete_dailyContent">
        </form>
        <?php
    }

    public function insertionRestaurantMosques(){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <body>
            <h2>Adding The Restaur and Mosques Data</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                <label for="name">name of the place: </label><br>
                <input type="text" id="name" name="name" required><br><br>

                <label for="category">Choose a category:</label>
                <select id="category" name="category">
                    <option value="restaurant">Restaurant</option>
                    <option value="mosque">Mosque</option>
                </select>
                <br><br>    
                
                <label for="country">Country:</label><br>
                <input type="text" id="country" name="country" required><br>

                <label for="city">City:</label><br>
                <input type="text" id="city" name="city" required><br>

                <label for="address">Address:</label><br>
                <input type="text" id="address" name="address" required><br><br>
                
                <input type="submit" value="Insert place data " name="insert_RestaurantMosques">   
            </form> 
        </body>
        </html>
            <?php    

    }
    
    // End of Admin dashboard forms

    public function displayAllForms(){
        $dashboard = new AdminDashboard();
        try {
            /* $dashboard->displayUpdateForm();
            $dashboard->insertionForm();
            $dashboard->displayDeleteForm();
            $dashboard->selectUsers();
            $dashboard->displayInsertInspirationForm();
            $dashboard->selectInspirations();
            $dashboard->displayDeleteInspirationForm();
            $dashboard->displayUpdateInspirationForm();
            $dashboard->selectVersesDuasHadith();
            $dashboard->insertionDailyContent();
            $dashboard->updateDailyContent();
            $dashboard->deleteDailyContent(); */
            $dashboard->selectRestaurantMosques();
            $dashboard->insertionRestaurantMosques();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();    }
    }

}

// Handle form submission  ----------------------------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $dashboard = new AdminDashboard();
    if(isset($_POST['update_user'])){
        $userId = $_POST['userId'];
        $newData = array(
        'name' => $_POST['newUsername'],
        'email' => $_POST['newEmail'],
        'phone'=> $_POST['newPhone'],
        'city'=> $_POST['newCity'],
        'country'=>$_POST['newCountry']
    );
    $dashboard->updateUsers($userId, $newData);
    }
    elseif (isset($_POST['insert_user'])) {
        try {

            // Insert a user into the database
            $userData = array(
            'name' => $_POST['username'],
            'email' => $_POST['Email'],
            'password' => $_POST['password'],
            'phone' => $_POST['Phone'],
            'city' => $_POST['City'],
            'country' => $_POST['Country'],
        );
        $dashboard->insertUser($userData);
        echo "Content deleted ";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        
    }
    elseif (isset($_POST['delete_user'])) {
        $userId=$_POST['userId'];
        $dashboard -> userDelete($userId);
    }

    elseif (isset($_POST['insertInspiration'])) {
        // Handle insert inspiration form submission
        $content = $_POST['content'];
        $dashboard->insertInspiration($content);
        // Redirect after insertion to prevent form resubmission
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }

    elseif (isset($_POST['deleteInspiration'])) {
        // Handle delete inspiration form submission
        $inspirationId = $_POST['inspirationId'];
        $dashboard->deleteInspiration($inspirationId);
         // Redirect after deletion to prevent form resubmission
         header("Location: ".$_SERVER['PHP_SELF']);
         exit();
    }

    elseif (isset($_POST['updateInspiration'])) {
        // Handle update inspiration form submission
        $inspirationId = $_POST['inspirationId'];
        $content = $_POST['content'];
        $dashboard->updateInspiration($inspirationId, $content);
        // Redirect after update to prevent form resubmission
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }    
    elseif (isset($_POST['insert_DailyContent'])) {
        // Insert a daily content into the database
        $VersesDuasHadith = array(
            'versus' => $_POST['verses'],
            'duas' => $_POST['dua'],
            'hadith	' => $_POST['hadith'],
        );
        $dashboard->insertVersesDuasHadith($VersesDuasHadith);
        // Redirect after update to prevent form resubmission
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
    elseif (isset($_POST['update_dailyContent'])) {
        // Update a daily content into the database
        $dayId = $_POST['dayId'];
        $newData= array(
            'versus' => $_POST['newVerses'],
            'duas' => $_POST['newDuas'],
            'hadith	' => $_POST['newHadith'],
        );
        $dashboard->updateVersesDuasHadith($dayId, $newData);
        // Redirect after update to prevent form resubmission
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
    elseif (isset($_POST['delete_dailyContent'])) {
        // Handle delete inspiration form submission
        $dayId = $_POST['dayId'];
        $dashboard->deleteVersesDuasHadith($dayId);
        echo "Content Deleted ";
         // Redirect after deletion to prevent form resubmission
         header("Location: ".$_SERVER['PHP_SELF']);
         exit();
    }
    elseif (isset($_POST['insert_RestaurantMosques'])) {
        // Insert a daily content into the database
        $RestaurantMosqueData = array(
            'name' => $_POST['name'],
            'category' => $_POST['category'],
            'country' => $_POST['country'],
            'city' => $_POST['city'],
            'address'=>$_POST['address'] ,
        );
        $dashboard->insertRestaurantMosques($RestaurantMosqueData);
        // Redirect after update to prevent form resubmission
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
}

// End  of POST handling section ----------------------------------------------

$dashboard = new AdminDashboard();
$dashboard->displayAllForms();
?>