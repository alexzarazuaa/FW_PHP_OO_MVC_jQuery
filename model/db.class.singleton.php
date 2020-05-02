<?php
    class db {
        private $server;
        private $user;
        private $pass;
        private $database;
        private $link;
        private $stmt;
        private $array;
        static $_instance;

        private function __construct() {
            $this->setConexion();
            $this->conectar();
        }
        
        private function setConexion() {
           
            $conf = Conf::getInstance();
            $this->server = $conf->getHostDB();
            $this->database = $conf->getDB();
            $this->user = $conf->getUserDB();
            $this->pass = $conf->getPassDB();
        }

        private function __clone() {

        }

        public static function getInstance() {
            if (!(self::$_instance instanceof self))
                self::$_instance = new self();
            return self::$_instance;
        }

        private function conectar() {
           // print_r("se conecta");
            $this->link = new mysqli($this->server, $this->user, $this->pass);
            $this->link->select_db($this->database);
        }

        public function ejecutar($sql) {
            $this->stmt = $this->link->query($sql);
            return $this->stmt;
        }
        
        // public function listar($stmt) {
        //     $this->array = array();
        //     while ($row = $stmt->fetch_array(MYSQLI_ASSOC)) {
        //         array_push($this->array, $row);
        //     }
        //     return $this->array;
        // }

        public function listar($stmt)
        {
            $this->array = array();
    
            if (!($stmt) || empty($stmt)) {
                return ('error');
            } else {
                while ($row = $stmt->fetch_array(MYSQLI_ASSOC)) {
                    array_push($this->array, $row);
                }
                return $this->array;
            }
        }

    }
