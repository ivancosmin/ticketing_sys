<?php
include ("classes/Connection.php");
$c = Connection::getConnection(array("host"=>"localhost","database"=>"ticketing_sys","user"=>"root","password"=>""));
Connection::getConnection(array("host"=>"localhost","database"=>"ticketing_sys","user"=>"root","password"=>""));
Connection::getConnection(array("host"=>"localhost","database"=>"ticketing_sys","user"=>"root","password"=>""));



//Connection::insertData("details", array("title" => "dadada", "text" => "asd", "grade" => "3",
//                                                "data" => "2018-10-10", "id_person" => "2", "id_adress" => "31"));


//Connection::insertData("persons", array("name" => "Ciprian"));

//$a = Connection::listingAll("details");
//echo "<pre>";
//var_dump($a);
//echo "</pre>";

//$one = Connection::listOne("adrese","id","36","nume");
//echo $one;
?>

