<?php
    namespace paymentHistory;
    require_once "../database_modules/database.php";

    use database\Database;
    use \Exception;

    class PaymentHistory extends Database {
        private $table;
        public function __construct(){
            parent::__construct();
            $this->table = "payments";
        }

        public function getPaymentHistory($num = "*", array $ticket_search = []){
            try{
                if($num === "*"){
                    return $this->read($this->table);
                }else if(isset($ticket_search)){
                    return array_slice($this->read($this->table, [$ticket_search['param']], ['='], [$ticket_search['val']]), -$num);
                }
                return array_slice($this->read($this->table), -$num);
            }catch(Exception $e){
                echo $e;
            }
        }
    }

//    $payment = new PaymentHistory();
//    print_r($payment->getPaymentHistory('*'));