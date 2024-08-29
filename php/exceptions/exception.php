<?php
    namespace BORJASA_EXCEPTION;

    use \Exception;

    class BorjasaExcept extends Exception
    {
        private $desc;
        private $exceptionTitle = "borjasaException";
        public function __construct($desc)
        {
            $this->desc = $desc;
            parent::__construct($desc); // Set the message
        }

        public function errorMessage()
        {
            return "<b>" . $this->exceptionTitle . "</b>" . " : " . $this->getFile() . " on line " . $this->getLine() .  ": <u>" . $this->getMessage() . "</u> ";
        }

        public function __toString()
        {
            return $this->errorMessage(); // Return the custom error message when echoing the exception
        }
    }