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
    function AddOrUpdate($table, $value=array())
    {

        $title = $value['title'];
        $text = $value['text'];
        $grade = $value['grade'];
        $data = $value['date'];
        $id_person = $value['id_person'];

        $id_adress = $value['id_adress'];

        $cnx = $this->conn;

        if (!$cnx || $this->status_fatal) {
            return null;
        }

        if ($table == "persons") {
            $query = "INSERT INTO persons (name) VALUES ('$value')";
        } else if ($table == "details") {
            $query = "INSERT INTO details (title, text, grade, data, id_person, id_adress) VALUES ('$title', '$text' ,
                                            '$grade', '$data', '$id_person', '$id_adress')";
        }


        $cur = mysqli_query($cnx, $query);

        @mysqli_free_result($cur);
    }

    function addAdress($id_loc, $adress){
        $cnx = $this->conn;

        $query = "INSERT INTO adrese (nume, id_localitate) VALUES ('$adress', '$id_loc')";
        $cur = mysqli_query($cnx, $query);
        @mysqli_free_result($cur);
    }


    function listDetails ($id){

        $query = "SELECT * FROM details WHERE id_adress='$id'";

        $cnx = $this->conn;
        $details = mysqli_query($cnx, $query);

        $list = array();
        while($detail = mysqli_fetch_array($details)) {
            array_push($list, $detail);
        }
        return $list;
    }

    function listOneAdress ($id){

        $query = "SELECT * FROM adrese WHERE id='$id'";

        $cnx = $this->conn;
        $details = mysqli_query($cnx, $query);

        $list = array();
        while($detail = mysqli_fetch_array($details)) {
            array_push($list, $detail);
        }
        $oneadress = $list[0]['nume'];
        return $oneadress;
    }

    function listOneLoc ($id){

        $query = "SELECT * FROM localitati WHERE id='$id'";

        $cnx = $this->conn;
        $details = mysqli_query($cnx, $query);

        $list = array();
        while($detail = mysqli_fetch_array($details)) {
            array_push($list, $detail);
        }
        $oneloc = $list[0]['nume'];
        return $oneloc;
    }

    function listIdLoc ($input){
        $query = "SELECT * FROM adrese WHERE nume='$input'";

        $cnx = $this->conn;
        $details = mysqli_query($cnx, $query);

        $list = array();
        while($detail = mysqli_fetch_array($details)) {
            array_push($list, $detail);
        }

        $idloc = $list[0]['id_localitate'];

        return $idloc;
    }



    function listIdJud ($input){
        $query = "SELECT * FROM localitati WHERE nume='$input'";

        $cnx = $this->conn;
        $details = mysqli_query($cnx, $query);

        $list = array();
        while($detail = mysqli_fetch_array($details)) {
            array_push($list, $detail);
        }

        $idjud = $list[0]['id_judet'];

        return $idjud;
    }

    function listOnejud ($id){

        $query = "SELECT * FROM judete WHERE id='$id'";

        $cnx = $this->conn;
        $details = mysqli_query($cnx, $query);

        $list = array();
        while($detail = mysqli_fetch_array($details)) {
            array_push($list, $detail);
        }
        $onejud = $list[0]['nume'];
        return $onejud;
    }

    function listFullDetails (){

        $query = "SELECT * FROM details";

        $cnx = $this->conn;
        $details = mysqli_query($cnx, $query);

        $list = array();
        while($detail = mysqli_fetch_array($details)) {
            array_push($list, $detail);
        }
        return $list;
    }

    function listPersons($id){
        $cnx = $this->conn;

        $query = "SELECT name FROM persons WHERE id='$id'";

        $list = mysqli_query($cnx, $query);

        $name = array();
        while ($element = mysqli_fetch_array($list)){
                array_push ($name, $element);
        }

        $nameToAdd = $name[0]['name'];
        return $nameToAdd;


    }

    function listJudete(){
        $cnx = $this->conn;
        $query = "SELECT * FROM judete";
        $judete = mysqli_query($cnx, $query);

        $jud = array();
        while ($element = mysqli_fetch_array($judete)){
            array_push ($jud, $element);
        }
        return $jud;
    }


    function listLocalitati($id_jud){
        $cnx = $this->conn;
        $query = "SELECT * FROM localitati WHERE id_judet='$id_jud'";
        $localitati = mysqli_query($cnx, $query);
        $loc = array();
        while ($element = mysqli_fetch_array($localitati)){
            array_push($loc, $element);
        }
        return $loc;
    }

    function listAdrese($id_loc){
        $cnx = $this->conn;
        $query = "SELECT * FROM adrese WHERE id_localitate='$id_loc'";
        $adrese = mysqli_query($cnx, $query);

        $a = array();
        while ($element = mysqli_fetch_array($adrese)){
            array_push ($a, $element);
        }

        return $a;
    }

    function listJudAndLoc(){
        $cnx = $this->conn;
        $query = "SELECT judete.id, judete.nume AS nume_jud, localitati.nume, localitati.id, adrese.nume AS nume_adress 
                  FROM judete INNER JOIN localitati ON judete.id=localitati.id_judet INNER JOIN adrese 
                  ON localitati.id=adrese.id_localitate ";

        $list = mysqli_query($cnx, $query);
        $l = array();
        while ($element = mysqli_fetch_array($list)){
            array_push ($l, $element);
        }

        return $l;
    }

    function update($id, $title, $text, $grade, $date, $person_id){
        $cnx = $this->conn;
        $date = strtotime($date);
        $date = date('Y-m-d H:i:s', $date);
        $query = "UPDATE details SET title='$title', text='$text', grade='$grade', data='$date', id_person='$person_id'  WHERE id='$id'";

        $cur = mysqli_query($cnx, $query);
        @mysqli_free_result($cur);
    }


    function delete($id){
        $cnx = $this->conn;
        $del_id = $id;

        $query = "DELETE FROM details WHERE id='$del_id'";

        $cur = mysqli_query($cnx, $query);
        @mysqli_free_result($cur);
    }


}


?>