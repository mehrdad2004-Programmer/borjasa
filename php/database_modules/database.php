<?php
    namespace database;

    use \Exception;
    use \PDO;

    require_once "../exceptions/exception.php";
    class Database{
        public $conn;
        public function __construct(){
            try{
                //to connect to database and create your table please visit db.json file and config
                $info = json_decode(file_get_contents(__DIR__."/db.json"), true)['DATABASE'];
                //print_r($info);
                $host = $info['host'];
                $username = $info['username'];
                $password = $info['password'];
                $db_name = $info['dbname'];
                $this->conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
                //echo "connected...";
            }catch(Exception $e){
                switch ($e->getCode()){
                    case 1049:
                        $this->conn = new PDO("mysql:host=$host;charset=utf8", $username, $password);
                        $query = "CREATE DATABASE " . $db_name;
                        $this->conn->prepare($query)->execute();
                        // Re-attempt to connect to the database
                        $this->conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
                        echo "connected to newly created database...";
                        break;
                    default:
                        throw $e;
                }
            }
        }

        public function create(string $tableName, array $arr){
            //this method is used to insert a new record in table
            /*
             * $tableName => name of the table to insert data
             * $arr => array of new info of inserting data
             */
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
                    return true;
                }
                return false;
            }catch (Exception $e){
                return $e;
            }
        }

        public function read(string $tableName, array $col = [], array $operator = [], array $val = []){
            //this method is used to get single specific record from a table
            /*
             * $tableName => name of the table to read data
             * $col => column name to create a condition
             * $operators => determine operation
             * $val => assign a value
             *
             * col, operator and val arrays must replace in the same indexes
             */
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

        public function JoinTables(array $tables, string $col = "", string $operators = "", string $val = "", string $groupBy = "", string $type = "INNER", $rest_query = ""){
            //this method is used to fetch data with the same value from multiple tables
            /*
             * $tables => an array of tables to join together
             * $col => contains column name to join
             * $operators => determines operation
             * $val => value for chosen column
             * $groupBy => to make one column of repeated data
             * $type => type of join -> INNER LEFT RIGHT CROSS
             * $rest_quest => adds optional condition an the end of the query
             */
            try{
                $query = "SELECT * FROM $tables[0]";
                foreach($tables as $key => $table){
                    if($key === 0){
                        continue;
                    }
                    $query .= " $type JOIN $table ON $table.$col = $tables[0].$col";
                    if(!empty($operators) && !empty($val) and !empty($groupBy)){
                        $query .= " WHERE $tables[0].$col $operators " . $val[array_search($tables, $tables)] . " GROUP BY " . $tables[0] . "." . $col;
                    }
                }

                echo $query;
                $res = $this->conn->prepare($query . $rest_query);
                $res->execute();
                return $res->fetchAll(PDO::FETCH_ASSOC);
            }catch(Exception $e){
                echo $e;
            }
        }

        public function update(string $table_name, array $arr, array $val = []){
            //this method is used to update table
            /*
             * $table_name => name of the table to update
             * $arr => contains new values to change
             * $val => contains old values to make a condition
             */
            try{
                $query = "UPDATE $table_name SET ";
                $col = "";
                $value = "";
                foreach(array_keys($arr) as $key) {
                    $col .= $key . " = " . "'" . $arr[$key] . "'" . ",";
                }
                $query .= rtrim($col, ",");
                if(count($val) > 0){
                    $query .= " WHERE ";
                    foreach (array_keys($val) as $key){
                        $value .= $key . " = " . "'" . $val[$key] . "'" . " AND ";
                    }
                    $query .= rtrim($value, " ADN ");
                }

                if($this->conn->prepare($query)->execute()){
                    return true;
                }
                return false;
            }catch (Exception $e){
                return $e;
            }
        }

        public function delete(string $table_name, array $val = []){
            //this method is used to delete a record from table
            /*
             * $table_name => name of the table to delete record from.
             * $val => assoc array to create a condition to delete. e.g : ["fname"=>"ali"] delete where fname equal to ali
             *
             */
            try{
                $query = "DELETE FROM $table_name";
                if(count($val) > 0){
                    $query .= " WHERE ";
                    foreach (array_keys($val) as $key){
                        $query .= $key . " = " . "'" . $val[$key] . "'" . " AND ";
                    }
                }
                if($this->conn->prepare(rtrim($query, " AND "))->execute()){
                    return true;
                }
                return false;
            }catch (Exception $e){
                return $e;
            }
        }

        public function CreateTable(string $table_name, array $col)
        {
            //this method is used to create a table
            try{
                $query = "CREATE TABLE IF NOT EXISTS $table_name (";

                foreach (array_keys($col) as $key) {
                    $query .= $key . " " . $col[$key] . ",";
                }

                $query = rtrim($query, ",") . ")";
                if($this->conn->prepare($query)->execute()){
                    return true;
                }
                return false;
            }catch (Exception $e){
                echo $e;
            }
        }


    }




//    $db = new Database();
//    $c = $db->create(array(
//        "tableName" => "st_reg_info",
//        "st_fname" => "mehrdad",
//        "st_lname" => "kalateh"
//    ));
//$rs = $db->read('test');
//$res = $db->update("test", ["test" => "problem"], ['test' => "ahmad"]);
//    $cols = json_decode(file_get_contents("db.json"), true);
//    foreach (array_keys($cols['TABLES']) as $table_name){
//        $db->CreateTable($table_name, $cols['TABLES'][$table_name]);
//    }
////$res = $db->JoinTables(['test', 'neighbors'], "id", ">=", '1', "id_no");
//print_r($res);
