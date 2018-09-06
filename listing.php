<?php

include('class/dbconnect.php');
$bdd = new db();


if (isset($_POST['id_jud'])) {

    echo "<td>Localitate:</td>";
    echo "<td>";
    echo "<select name='localitate' id='id_loc'>";
    echo "<option>" . "Selecteaza localitatile" . "</option>";


    $loc = array();
    $loc = $bdd->list("localitati","id_judet",$_POST['id_jud']);

    foreach ($loc as $value) {

        echo '<option value="' . $value['id'] . '">' . $value['nume'] . '</option>';
    }


    echo " </select>";
    echo "</td>";
}

if (isset($_POST['id_loc'])){
    $id = $_POST['id_loc'];

    $adrese = array();
    $adrese = $bdd->list("adrese","id_localitate",$id);
    $details = array();

    echo "<table border='1' align='center'>";
        echo "<thead>";
            echo "<th>" . "Title" . "</th>";
            echo "<th>" . "Text" . "</th>";
            echo "<th>" . "Grade" . "</th>";
            echo "<th>" . "Data" . "</th>";
            echo "<th>" . "Adress" . "</th>";

        echo "</thead>";

    echo "<tbody>";
    echo '<tr>';
    foreach ($adrese as $value){
        echo "<tr>";
        $details = $bdd->list("details","id_adress", $value['id']);

        echo "<td>" . $details[0]['title'] . "</td>";
        echo "<td>" . $details[0]['text'] . "</td>";
        echo "<td>" . $details[0]['grade'] . "</td>";
        echo "<td>" . $details[0]['data'] . "</td>";
        echo "<td>" . $value['nume'] . "</td>";
        echo "</tr>";
    }
    echo '</tr>';
    echo "</tbody>";
    echo "</table>";
}

    if(isset($_POST['id_pers'])){

        $detalii = array();
        $detalii = $bdd->listDetailsForPersons($_POST['id_pers']);

        echo "<table border='1' align='center'>";
        echo "<thead>";
        echo "<th>" . "Title" . "</th>";
        echo "<th>" . "Text" . "</th>";
        echo "<th>" . "Grade" . "</th>";
        echo "<th>" . "Data" . "</th>";
        echo "</thead>";

        echo "<tbody>";
        echo '<tr>';
        foreach ($detalii as $value){
            echo "<tr>";
            echo "<td>" . $detalii[0]['title'] . "</td>";
            echo "<td>" . $detalii[0]['text'] . "</td>";
            echo "<td>" . $detalii[0]['grade'] . "</td>";
            echo "<td>" . $detalii[0]['data'] . "</td>";
            echo "</tr>";
        }
        echo '</tr>';
        echo "</tbody>";
        echo "</table>";
    }

//
//    $listing = array();
//    $listing = $bdd->listJudAndLoc();
//
//    echo "</br>";
//
//    foreach ($listing as $value){
//        echo $value['id'] . " --- " . $value['nume'] . " --- " . $value['nume_jud']. " --- " . $value['nume_adress'] ."</br>" ;
//    }

?>