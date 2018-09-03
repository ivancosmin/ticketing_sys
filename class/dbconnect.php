<?php

class db{
    private $conn;
    private $host;
    private $user;
    private $password;
    private $database;

    function __construct($params=array())
    {
        $this->conn = false;
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->database = "ticketing_sys";
        $this->connect();
    }

    function connect(){

            $this->conn = mysqli_connect($this->host, $this->user, $this->password);

            mysqli_select_db( $this->conn, $this->database);
            mysqli_set_charset($this->conn, 'utf8');

            if (!$this->conn){
                $this->status_fatal = true;
                echo "Connection BDD failed";
                die();
            }
            else{
                $this->status_fatal = false;
            }

        return $this->conn;
    }

    function disconnect(){
        if($this->conn){
            @pg_close($this->conn);
        }
    }

    /**
     * @param $query
     * @param bool $use_slave
     * @return null
     */
    function AddOrUpdate($query){

        $cnx = $this->conn;

        if (!$cnx || $this->status_fatal){
            return null;
        }

        $cur = mysqli_query ( $cnx,$query);

        @mysqli_free_result($cur);
    }
    
}


?>