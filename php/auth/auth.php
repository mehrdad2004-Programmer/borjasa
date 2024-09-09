<?php
use database\Database;
    require_once "../database_modules/database.php";
    class Auth extends Database{
        private $table;
        public function __construct(){
            parent::__construct();
            $this->table = 'users';
        }

        public function login(array $info_assoc){
            try{
                $user = $this->read($this->table);
                print_r($user);
            }catch(Exception $e){
                echo $e;
            }
        }
    }

    $auth = new Auth();

    $auth->login(['username'=>"mehrdad", "password" => "2234"]);

