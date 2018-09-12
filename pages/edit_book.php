<?php
include ("classes/Connection.php");
Connection::getConnection(array("host"=>"localhost","database"=>"ticketing_sys","user"=>"root","password"=>""));
?>



<form method="post">
    <table>
        <tr>
            <td>Ticket ID:</td>
<!--            <td><input type="number" name="id" /></td>-->
            <td>

                <select class="js-example-basic-single" id='meSelect2' name="state"  style="width: 60px;">
                    <?php
                    $dtls = array();
                    $dtls = Connection::listingAll("details");

                    foreach ($dtls as $value){
                        echo "<option   name='mySelect2' value='". $value['id'] . "'>" . $value['id'] . "</option>";
                    }

                    ?>
                </select>
            </td>
        </tr>
        <tr aria-colspan="2">
            <td><input type="submit" name="submit" value="Submit"/></td>


        </tr>
        <tr >
            <td id="select">

            </td>

        </tr>
    </table>
</form>

<?php
//include ('class/dbconnect.php');
//$bdd = new db();

$list = array();
    if (isset($_POST['id'])) {

        $update_id = $_POST['id'];
        $_SESSION['id'] = $update_id;
        $sss = $_POST['id'];
//        $list = $bdd->list("details","id_adress",$update_id);

         $list = Connection::listOne("details", "id", $_POST['id']);



//        echo "<pre>";
//        var_dump($list);
//        echo "</pre>";
    }
    else{
        echo "no id";
    }
    if(isset($list[0])) {
        $title = $list['title'];
        $text = $list['text'];
        $grade = $list['grade'];
        $date = $list['data'];
        $id_person = $list['id_person'];
    }
    else{
        $title = "Introduceti Ticket ID";
        $text = "Introduceti Ticket ID";
    }



?>


<form method="post">
    <table>
        <tr>

            <td><input type="hidden"  name="idd" value="<?php echo $sss; ?>"/></td>
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
//                    $p1 = $bdd->listOne("persons", "id", 1, "name");
                    $p1 = Connection::listOne("persons", "id", 1,  "name");
                    echo $p1;
                    ?>
                </option>
                <option value="2">
                    <?php
//                    $p1 = $bdd->listPersons(2);
//                    $p1 = $bdd->listOne("persons", "id", 2, "name");
                    $p1 = Connection::listOne("persons", "id", 2,  "name");
                    echo $p1;
                    ?>
                </option>
                <option value="3">
                    <?php
//                    $p1 = $bdd->listPersons(3);
//                    $p1 = $bdd->listOne("persons", "id", 3, "name");
                    $p1 = Connection::listOne("persons", "id", 3,  "name");
                    echo $p1;
                    ?>
                </option>
                <option value="4">
                    <?php
//                    $p1 = $bdd->listPersons(4);
//                    $p1 = $bdd->listOne("persons", "id", 4, "name");
                    $p1 = Connection::listOne("persons", "id", 4,  "name");
                    echo $p1;
                    ?>
                </option>
            </select>
            </td>
        </tr>
        <tr aria-colspan="2">
            <td><input type="submit" id="hide" name="edit" value="Update" class="btn btn-primary" /></td>
        </tr>

        <tr aria-colspan="2">
<!--            <td><input type="submit" id="btn_export" name="export" value="Export" /></td>-->
            <td><a href="http://localhost/ticketing_sys/exportPDF/export_pdf.php?id=<?php echo $sss ?>" id='btn_export' class='btn btn-success' target='_blank'>Export</a></td>
        </tr>


        <tr aria-colspan="2">
            <td><input type="submit" name="delete" value="Delete Ticket" class = "btn btn-danger"/></td>
        </tr>

    </table>
</form>
<div id="update_info">

</div>
<form method="post">
    <table>

        <thead>
        <th> Checked</th>
            <th>File name</th>
            <th>Action</th>
        </thead>

        <?php

        $files = Connection::listingAll("files", "id_ticket", $_SESSION['id']);
//        echo "<pre>";
//        var_dump($files);
//        echo "</pre>";
        foreach ($files as $file){
                echo "<tr>";
                    echo "<td>";
                        echo  "<input type='checkbox' name='check_list[]' value='" . $file['id'] . "'></input>" ;
                    echo "</td>";
                    echo "<td>";
                        echo $file['file'];

                    echo "</td>";
                    echo "<td>";
//                        echo "<a href='index.php?page=3?del=" . $file['id'] . "' class='btn ' >Delete</a>";
//                        echo "<a href='index.php?page=3?dwn=" . $file['id'] . "' class='btn'  >Download</a>";
            echo "<a href='http://localhost/ticketing_sys/upload_files/" . $file['file'] . "' class='btn' target='_blank'  >Download</a>";
                    echo "</td>";
                echo "</tr>";
        }

        ?>

        <tr aria-colspan="2">
            <td><input type="submit" name="delete_file" value="Delete Checked Files" /></td>
        </tr>
        <tr aria-colspan="2">
            <td><input type="submit" name="delete_all" value="Delete All Files" /></td>
        </tr>

    </table>
</form>
<!--<div id="select">-->
<!---->
<!--</div>-->

<?php


    if (isset($_POST['edit'])){

        $details = array();
        $details['title'] = $_POST['title'];
        $details['text'] = $_POST['text'];
        $details['grade'] = $_POST['grade'];
        $details['data'] = date('Y-m-d', strtotime($_POST['date']));
        $details['id_person'] = $_POST['id_person'];
        $json = json_encode($details);
        Connection::updateData("details", $details, $_POST['idd']);

//        $update = $bdd->update($_POST['idd'], $_POST['title'], $_POST['text'], $_POST['grade'], $_POST['date'], $_POST['id_person']);

    }
    else if (isset($_POST['delete'])){
        Connection::delete($_SESSION['id']);
}
    if (isset($_GET['delete_file'])){
        Connection::deleteFile($_SESSION['id']);

    }

//    if (isset($_GET['page'])){
//        $id_for_delete= substr($_GET['page'], -1);
//            Connection::deleteFileBtn($id_for_delete);
//
//    }

        if (isset($_POST['delete_file'])) {

//            echo "<pre>";
//            var_dump($_POST['check_list']);
//            echo "</pre>";


            $ids = $_POST['check_list'];


            foreach ($ids as $value){

                $path = Connection::listOne("files", "id", $value);
                $url = '/ticketing_sys/upload_files/' . $path['file'];
                echo $url;

                   unlink( $_SERVER['DOCUMENT_ROOT'] . $url);
            }
            Connection::deleteFile("files", $_POST['check_list']);
//            if (!unlink($files))
//            {
//                echo ("Error deleting $files");
//            }
//            else
//            {
//                echo ("Deleted $files");
//            }
        }

        if (isset($_POST['delete_all'])){
            Connection::deleteAll();
        }

?>

<script>

    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            placeholder: 'Select an option'
        });

           });

    $(document).on("change", "#meSelect2", function(){
        var key = $(this).val();
        $.ajax({
            url: "data.php",
            data: "key=" + key,
            type: "POST",
            success: function (data) {

                $('#select').html(data);
                // $('.select2-search__field').html(data);
            }
        })
    });

    $(document).on("change", ".select2-search__field", function(){
        var key = $(this).val();
        $.ajax({
            url: "data.php",
            data: "key=" + key,
            type: "POST",
            success: function (data) {

                $('#select').html(data);
                // $('.select2-search__field').html(data);
            }
        })
    });

    //$(document).on("click", "#btn_export", function(){
    //
    //    var json = <?php //echo $export ?>//;
    //    alert(json);
    //    $.ajax({
    //        type: "POST",
    //        url: "../exportPDF/export_pdf.php",
    //        data: {data: json},
    //        success: function (data) {
    //            alert(data);
    //        }
    //    })
    //});




    // $(document).on("keyup", ".select2-search__field", function(){
    //     var key = $(this).val();
    //     $.ajax({
    //         url: "data.php",
    //         data: "key=" + key,
    //         type: "POST",
    //         success: function (data) {
    //
    //             $('#select').html(data);
    //             // $('.select2-search__field').html(data);
    //         }
    //     })
    // });







</script>
