<?php
include ("classes/Connection.php");
Connection::getConnection(array("host"=>"localhost","database"=>"ticketing_sys","user"=>"root","password"=>""));


//$id_list = Connection::listForVariable2("details", "id", $_POST['key']);
//
//foreach ($id_list as $value) {
//
//    echo "<pre>";
//    var_dump($value['id']);
//    echo "</pre>";

/*<input type="hidden" id="select" name="id" value="<?php echo $_POST['key']; ?>"/>*/

echo "<input type='hidden' name='id' value='" . $_POST['key'] . "'/>";



?>

