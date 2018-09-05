<?php
include('class/dbconnect.php');
$bdd = new db();

    if (isset($_POST['id'])) {

        echo "<td>Localitate:</td>";
        echo "<td>";
        echo "<select name='localitate' id='id_loc'>";
            echo "<option>" . "Selecteaza localitatile" . "</option>";


        $loc = array();
        $loc = $bdd->listLocalitati($_POST['id']);

        foreach ($loc as $value) {

            echo '<option value="' . $value['id'] . '">' . $value['nume'] . '</option>';
        }


        echo " </select>";
        echo "</td>";
    }

    if (isset($_POST['id_loc'])){


        echo "<td>Adress:</td>";
        echo "<td>";
        echo "<select name='adresa' id='id_adress' >";
        echo "<option>" . "Selecteaza adresa" . "</option>";
        $adr = array();
        $adr = $bdd->listAdrese($_POST['id_loc']);

        foreach ($adr as $values) {

            echo '<option value="' . $values['id'] . '">' . $values['nume'] . '</option>';

        }


        echo " </select>";
        echo "</td>";

    }

    if (isset($_POST['id_adress'])){
       $id = $_POST['id_adress'];
       echo "<input type='hidden' name='xxx' value='$id' />";


    }


?>