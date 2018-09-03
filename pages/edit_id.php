

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
    require_once "pages/edit_book.php";
    if (isset($_POST['submit'])){
        $_SESSION['update_id'] = $_POST['id'];
    }

?>