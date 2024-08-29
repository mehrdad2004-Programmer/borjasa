<?php
    namespace database;

    use \Exception;
    use \PDO;

    require_once "../exceptions/exception.php";
    class Database{
        private $conn, $db_name;
        public function __construct($db_name){
            try{
                $host = "localhost";
                $username = "root";
                $password = "";
                $this->db_name = $db_name;
                $this->conn = new PDO("mysql:host=$host;dbname=$this->db_name;charset=utf8", $username, $password);
                echo "connected...";
            }catch(Exception $e){
                switch ($e->getCode()){
                    case 1049:
                        $this->conn = new PDO("mysql:host=$host;charset=utf8", $username, $password);
                        $query = "CREATE DATABASE " . $this->db_name;
                        $this->conn->prepare($query)->execute();
                        break;
                }
            }
        }

        public function create(string $tableName, array $arr){
            try{
                $query = "INSERT INTO " . $tableName;
                $columns = "";
                $data = "";
                foreach (array_keys($arr) as $key){
                    $columns .= $key . ",";
                    $data .= "'" . $arr[$key] . "'" . ",";
                }
                $query .= "(" . rtrim($columns, ",") . ")" . " VALUES " . "(" . rtrim($data, ',') . ")";

                if($this->conn->prepare($query)->execute()){
                    http_response_code(201);
                    return array(
                        "is_created" => true,
                        "status_code" => 201,
                    );
                }
                return array(
                    "is_created" => false,
                    "status_code" => 403,
                );

            }catch (Exception $e){
                echo $e;
                return array(
                    "is_created" => false,
                    "status_code" => 500,
                    "error_log" => $e,
                );
            }
        }

        public function read(string $tableName, array $col = [], array $operator = [], array $val = []){
            try{
                $query = "";
                $col_val = "";
                if(count($col) > 0){
                    foreach($col as $item) {
                        $col_val .= $item . $operator[array_search($item, $col)] . "'" . $val[array_search($item, $col)] . "'" . " AND ";
                        $query = "SELECT * FROM $tableName WHERE ";
                    }
                }else{
                    $query = "SELECT * FROM $tableName";
                }

                $query .= rtrim($col_val, " AND ");
                $res = $this->conn->prepare($query);
                $res->execute();
                return $res->fetchAll(PDO::FETCH_ASSOC);

            }catch (Exception $e){
                return $e;
            }
        }

        public function update(string $table_name, array $arr, array $val){
            try{
                $query = "UPDATE $table_name SET ";
                $col = "";
                $value = "";
                foreach(array_keys($arr) as $key) {
                    $col .= $key . " = " . "'" . $arr[$key] . "'" . ",";
                }

                foreach (array_keys($val) as $key){

                }
                $query .= rtrim($col, ",");
                echo $query;
            }catch (Exception $e){
                echo $e;
            }
        }

        public function delete(array $arr){

        }

        public function CreateTable(){

        }


    }




    $db = new Database("mandegar");

//    $c = $db->create(array(
//        "tableName" => "st_reg_info",
//        "st_fname" => "mehrdad",
//        "st_lname" => "kalateh"
//    ));

$res = $db->read('test');

$res = $db->update("test", ["test" => "problem"]);

print_r($res);