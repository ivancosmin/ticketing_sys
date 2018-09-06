<form method="post">
    <table>
        <tr>
            <td>Ticket ID:</td>
            <td><input type="number" name="id" /></td>
        </tr>
        <tr aria-colspan="2">
            <td><input type="submit" name="submit" value="Submit"/></td>
        </tr>
    </table>
</form>

<?php
include ('class/dbconnect.php');
$bdd = new db();
$list = array();
    if (isset($_POST['id'])) {
        $update_id = $_POST['id'];
        var_dump($_POST['id']);
        $sss = $_POST['id'];


        $list = $bdd->list("details","id_adress",$update_id);

    }
    if(isset($list[0])) {
        $title = $list[0]['title'];
        $text = $list[0]['text'];
        $grade = $list[0]['grade'];
        $date = $list[0]['data'];
        $id_person = $list[0]['id_person'];
    }
    else{
        $title = "Introduceti Ticket ID";
        $text = "Introduceti Ticket ID";
    }



?>


<form method="post">
    <table>
        <tr>

            <td><input type="hidden" name="idd" value="<?php echo $sss; ?>"/></td>
        </tr>
        <tr>
            <td>Title:</td>
            <td><input type="text" name="title" value="<?php echo $title; ?>"/></td>
        </tr>
        <tr>
            <td>Text:</td>
            <td><input type="text" name="text" value="<?php echo $text; ?>"/></td>
        </tr>
        <tr>
            <td>Grade:</td>
<!--            <td><input type="number" name="grade" value="--><?php //echo $grade; ?><!--"/></td>-->
            <td>
                <select name="grade">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </td>

        </tr>
        <tr>
            <td>Date:</td>
            <td><input type="date" name="date" value="<?php echo $date; ?>" /></td>
        </tr>
        <tr>
            <td>Person ID:</td>
<!--            <td><input type="number" name="id_person" value="--><?php //echo $id_person; ?><!--" /></td>-->
            <td>
            <select name="id_person">
                <option value="1">
                    <?php
//                    $p1 = $bdd->listPersons(1);
                    $p1 = $bdd->listOne("persons", "id", 1, "name");
                    echo $p1;
                    ?>
                </option>
                <option value="2">
                    <?php
//                    $p1 = $bdd->listPersons(2);
                    $p1 = $bdd->listOne("persons", "id", 2, "name");
                    echo $p1;
                    ?>
                </option>
                <option value="3">
                    <?php
//                    $p1 = $bdd->listPersons(3);
                    $p1 = $bdd->listOne("persons", "id", 3, "name");
                    echo $p1;
                    ?>
                </option>
                <option value="4">
                    <?php
//                    $p1 = $bdd->listPersons(4);
                    $p1 = $bdd->listOne("persons", "id", 4, "name");
                    echo $p1;
                    ?>
                </option>
            </select>
            </td>
        </tr>
        <tr aria-colspan="2">
            <td><input type="submit" name="edit" value="Update" /></td>
        </tr>
        <tr aria-colspan="2">
            <td><input type="submit" name="delete" value="Delete" /></td>
        </tr>
    </table>
</form>

<?php


    if (isset($_POST['edit'])){
        var_dump($_POST['idd']);

        $update = $bdd->update($_POST['idd'], $_POST['title'], $_POST['text'], $_POST['grade'], $_POST['date'], $_POST['id_person']);

    }
    else if (isset($_POST['delete'])){
        $del = $bdd->delete($update_id);
}


?>
