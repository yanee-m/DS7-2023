<?php
define('DB_HOST','localhost');
define('DB_USER','root'); 
define('DB_PASS','');
define('DB_NAME','labsdb');

class ConeccionBD
{
    protected $_db;
    public function __construct()
    {
        $this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->_db->connect_errno) {
            echo "fallo al conectar a la base de datos " . $this->_db->connect_errno;
            return;
        }
    }
}