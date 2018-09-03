<?php
include ('class/dbconnect.php');
$update_id = $_SESSION['update_id'];

$bdd = new db();
$list = array();
$list = $bdd->listDetails($update_id);
    $title = $list[0]['title'];
    $text = $list[0]['text'];
    $grade = $list[0]['grade'];
    $date = $list[0]['data'];
    $id_person = $list[0]['id_person'];




?>


<form method="post">
    <table>
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
            <td><input type="number" name="grade" value="<?php echo $grade; ?>"/></td>
        </tr>
        <tr>
            <td>Date:</td>
            <td><input type="date" name="date" value="<?php echo $date; ?>" /></td>
        </tr>
        <tr>
            <td>Person ID:</td>
            <td><input type="number" name="id_person" value="<?php echo $id_person; ?>" /></td>
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
    var_dump($_POST);
    if (isset($_POST['edit'])){
        $update = $bdd->update($update_id, $_POST['title'], $_POST['text'], $_POST['grade'], $_POST['date'], $_POST['id_person']);

    }
    else if (isset($_POST['delete'])){
        $del = $bdd->delete($update_id);
}


?>
