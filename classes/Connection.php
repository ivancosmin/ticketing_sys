<?php

class Connection
{
    private static $conn = null;
    private $host;
    private $user;
    private $password;
    private $database;

//    function __construct($host, $database, $user, $password)
//    {
//
//        $this->host = $host;
//        $this->user = $user;
//        $this->password = $password;
//        $this->database = $database;
//
//        if (self::$conn == null) {
//
//            try {
//                self::$conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
//
//            } catch (\PDOException $e) {
//                throw new \PDOException($e->getMessage(), (int)$e->getCode());
//            }
//        }
//    }

    static function getConnection($array){
        if (self::$conn == null) {

            try {
                self::$conn = new PDO("mysql:host=" . $array['host'] . ";dbname=" . $array['database'], $array['user'], $array['password']);

            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
        }
        return self::$conn;
    }

    static function insertData($table, $value=array()){ //AddOrUpdate sau //Add
//        echo "<pre>";
//        var_dump($value);
//        echo "</pre>";
        $columns = implode(", ",array_keys($value));

        $values = array_values($value);
        $new_values = array();
        foreach ($values as $value)
            array_push($new_values, "'" . $value . "'");


        $escaped_values = implode(", ", array_values($new_values));

        $stmt = self::$conn->prepare("INSERT INTO ".$table." (".$columns.") VALUES (".$escaped_values.")");
        $stmt->execute();
        }

        static function updateData($table, $value=array(), $id){
            $field = "";
        foreach ($value as $key=>$val){
                $field .= $key . "='" . $val . "',";
            }
            $field = substr($field, 0, -1);

            $stmt = self::$conn->prepare("UPDATE ". $table . " SET ". $field . " WHERE id=". $id);
            $stmt->execute();

        }


    static function listingAll($table, $id=false, $id_use=false){ //List all
        if($id && $id_use){
            $stmt = self::$conn->prepare("SELECT * FROM " . $table . " WHERE " . $id . "=" . $id_use);
        }
        else{
            $stmt = self::$conn->prepare("SELECT * FROM " . $table);
        }
        $stmt->execute();

        $list = $stmt->fetchAll();

        return $list;
    }

    static function listOne($table, $id, $id_use, $index=false){
//        echo "<pre>";
//        var_dump("SELECT * FROM " . $table . " WHERE " . $id . "=" . $id_use);
//        echo "</pre>";
        $stmt = self::$conn->prepare("SELECT * FROM " . $table . " WHERE " . $id . "='" . $id_use . "'");
        $stmt->execute();


        $list = $stmt->fetch();

//        echo "<pre>";
//        var_dump($list);
//        echo "</pre>";

        if ($index) {
            return $list[$index];
        }
        else{
            return $list;
        }


    }

    static function listForText($table, $text){

        $stmt = self::$conn->prepare("SELECT * FROM $table WHERE text LIKE '%$text%' ");
//        $query = "SELECT * FROM details WHERE text LIKE '%$input%'";
//        SELECT * FROM details WHERE title='da'
        $stmt->execute();

        $list = $stmt->fetchAll();
        return $list;
    }

    static function listForVariable($table, $camp, $input, $index)
    {
        $stmt = self::$conn->prepare("SELECT * FROM " . $table . " WHERE " . $camp . " LIKE '%" . $input . "%'");
//        echo "SELECT * FROM " . $table . " WHERE " . $camp . " LIKE '%" . $input . "'%" ;
        $stmt->execute();
        $list = $stmt->fetchAll();
//        echo "<pre>";
//        var_dump($list);
//        echo "</pre>";
        return $list[0][$index];
    }
        static function listForVariable2($table, $camp, $input){
        $stmt = self::$conn->prepare("SELECT * FROM " . $table . " WHERE " . $camp . " LIKE '%" . $input . "%'" );
//        echo "SELECT * FROM " . $table . " WHERE " . $camp . " LIKE '%" . $input . "'%" ;
        $stmt->execute();
        $list = $stmt->fetchAll();
//        echo "<pre>";
//        var_dump($list);
//        echo "</pre>";
        return $list;
    }

    static function insertFile ($name, $id_ticket){
        $stmt = self::$conn->prepare("INSERT INTO files (file, id_ticket ) VALUES ('$name', $id_ticket)");
        $stmt->execute();
    }

    static function delete($id){
        $stmt = self::$conn->prepare("DELETE FROM details WHERE id='$id'");

        $stmt->execute();
    }

    static function deleteFile($input){
        $stmt = self::$conn->prepare("DELETE FROM files WHERE id_ticket='$input' ");
        $stmt->execute();
    }
    static function deleteFileBtn($input){
        $stmt = self::$conn->prepare("DELETE FROM files WHERE id='$input' ");
        $stmt->execute();
    }

    /**
     * @return PDO
     */
    public function getConn()
    {
        return self::$conn;
    }

    /**
     * @param PDO $conn
     */
    public function setConn($conn)
    {
        self::$conn = $conn;
    }



}
?>

