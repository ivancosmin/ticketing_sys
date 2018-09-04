<?php
    if (isset($_POST['id'])) {

        echo "<td>Localitate:</td>";
        echo "<td>";
        echo "<select name='localitate' id='id_loc'>";


        include('class/dbconnect.php');
        $bdd = new db();
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
         echo '<input type="text" name="addr" />';
         echo "</td>";

    }

?>