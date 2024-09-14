<?php
use database\Database;
require_once "../database_modules/database.php";

class Auth extends Database {
    public $table;

    public function __construct() {
        parent::__construct();
        $this->table = "users";
    }

    public function login(array $info_assoc) {
        try {
            $user = $this->read($this->table, ['username', 'password'], ['=', "="], [$info_assoc['username'], $info_assoc['password']]);
            if(count($user) > 0) {
                return false;
            }
            return true;
        } catch(Exception $e) {
            echo $e;
            return false; 
        }
    }

    public function logout() {
        
    }

    public function register(array $insertinig_info) {
        try {
            $users = $this->create($this->table, ["username" => $insertinig_info['username'], "password" => $insertinig_info['password']]);
            if($users) {
                return true;
            }
            return false; 
        } catch(Exception $e) {
            echo $e;
            return false;
        }
    }

    public function deleteUser($username) {
        try {
            $result = $this->delete($this->table, ['username' => $username]);
            if ($result) {
                return true; 
            }
            return false; 
        } catch(Exception $e) {
            echo $e;
            return false;
        }
    }
}

// $auth = new Auth();

// // Uncomment to test the login
// // $auth->login(['username' => "mehrdad", "password" => "1223"]);

// // Test registration
// $auth->register(['username' => "ali", "password" => "34565"]);

// // Test logout
// if ($auth->logout()) {
//     echo "Logout successful!";
// } else {
//     echo "No user was logged in or logout failed.";
// }

// // Test deleting user
// if ($auth->deleteUser("ali")) {
//     echo "User deleted successfully!";
// } else {
//     echo "User deletion failed!";
// }
?>
