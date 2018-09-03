
<form method="post">
    <table>
        <tr>
            <td>Title:</td>
            <td><input type="text" name="title" /></td>
        </tr>
        <tr>
            <td>Text:</td>
            <td><input type="text" name="text"/></td>
        </tr>
        <tr>
            <td>Grade:</td>
            <td><input type="number" name="grade" /></td>
        </tr>
        <tr>
            <td>Date:</td>
            <td><input type="date" name="date" /></td>
        </tr>
        <tr>
            <td>Person ID:</td>
            <td><input type="number" name="id_person" /></td>
        </tr>
        <tr aria-colspan="2">
            <td><input type="submit" name="add_book" value="Add Book" /></td>
        </tr>
    </table>
</form>

<?php
    include ('class/dbconnect.php');
    $bdd = new db();
    $conn = $bdd->connect();

    if (isset($_POST['add_book'])){
        $details = array();
        $details['title'] = $_POST['title'];
        $details['text'] = $_POST['text'];
        $details['grade'] = $_POST['grade'];
        $details['date'] = strtotime($_POST['date']);
        $details['date'] = date('Y-m-d H:i:s', $details['date']);
        $details['id_person'] = $_POST['id_person'];

        $add_b = $bdd->AddOrUpdate("details",$details);

    }


?>