<?php

function connect_db($host = "localhost", $user = "root", $password = "", $database = "ticketing_sys"){
    return mysqli_connect($host, $user, $password, $database);
}

function addPerson ($input){
    $link = connect_db();

    $query = "INSERT INTO persons VALUES (NULL, '$input')";

    return mysqli_query($link, $query);
}

function addBook ($title, $text, $grade, $date){
    $link = connect_db();

    $query = "INSERT INTO details VALUES (NULL, '$title', '$text', '$grade', '$date')";

    return mysqli_query($link, $query);
}

?>

