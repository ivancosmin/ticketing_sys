
<form method="post">
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="person_name" /></td>
        </tr>
        <tr aria-colspan="2">
            <td><input type="submit" name="submit" value="Add Person" /></td>
        </tr>
    </table>
</form>


<?php

include ('class/dbconnect.php');
$bdd = new db();
$conn = $bdd->connect();

if (isset($_POST['submit'])) {

    $person = $_POST['person_name'];
    $table = "persons";

    $add_p = $bdd->AddOrUpdate($table, $person);
}
?>