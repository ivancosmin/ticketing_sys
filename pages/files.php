<?php
include ("classes/Connection.php");
Connection::getConnection(array("host"=>"localhost","database"=>"ticketing_sys","user"=>"root","password"=>""));

?>


<form method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Ticket ID</td>
            <td><input type="text" name="ticket_id" /></td>
        </tr>
        <tr>
            <td>File input:</td>
            <td><input type="file" name="upload_file"  /></td>
        </tr>
        <tr aria-colspan="2">
            <td>
                <input type="submit" name="upload" value="Add file" />
            </td>
        </tr>
    </table>
</form>


<?php

    if (isset($_FILES['upload_file'])){
        $fileName = $_FILES['upload_file']['name'];
        if ($_FILES['upload_file']['error'] == 0){
            $target = "upload_files/";
            $fileTarget = $target.$fileName;
            $tempFileName = $_FILES['upload_file']['tmp_name'];
            $result = move_uploaded_file($tempFileName, $fileTarget);

            if ($result){
                    Connection::insertFile($fileName, $_POST['ticket_id']);
            }
        }
    }

?>

