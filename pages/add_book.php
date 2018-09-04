<?php
include ('class/dbconnect.php');
$bdd = new db();
$conn = $bdd->connect();
?>

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
            <td>Judet:</td>
            <td>
                <select name="judet" id="jud">

                        <?php

                            $jud = array();
                            $jud = $bdd->listJudete();

                            foreach ($jud as $value){

                                echo '<option value="' . $value['id'] . '">' . $value['nume']. '</option>';
                            }
                        ?>
                </select>
            </td>

        </tr>

        <tr id="localitate">

        </tr>

        <tr id="adress">

        </tr>
        <tr>
            <td>Grade:</td>
<!--            <td><input type="number" name="grade" /></td>-->
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
            <td><input type="date" name="date" /></td>
        </tr>
        <tr>
            <td>Person ID:</td>
<!--            <td><input type="number" name="id_person" /></td>-->
            <td>
                <select name="id_person">
                    <option value="1">
                        <?php
                            $p1 = $bdd->listPersons(1);
                            echo $p1;
                        ?>
                    </option>
                    <option value="2">
                        <?php
                        $p1 = $bdd->listPersons(2);
                        echo $p1;
                        ?>
                    </option>
                    <option value="3">
                        <?php
                        $p1 = $bdd->listPersons(3);
                        echo $p1;
                        ?>
                    </option>
                    <option value="4">
                        <?php
                        $p1 = $bdd->listPersons(4);
                        echo $p1;
                        ?>
                    </option>
                </select>
            </td>
        </tr>
        <tr aria-colspan="2">
            <td><input type="submit" name="add_book" value="Add Book" /></td>
        </tr>
    </table>
</form>

<?php


    if (isset($_POST['add_book'])){


        $details = array();
        $details['title'] = $_POST['title'];
        $details['text'] = $_POST['text'];
        $details['grade'] = $_POST['grade'];
        $details['date'] = strtotime($_POST['date']);
        $details['date'] = date('Y-m-d H:i:s', $details['date']);
        $details['id_person'] = $_POST['id_person'];
        $details['adress'] = $_POST['addr'];
        $details['id_localitate'] = $value['id'];

        $add_b = $bdd->AddOrUpdate("details",$details);


    }


?>

<script type="text/javascript">

    $(document).on("change","#jud", function(e){
        var id=$(this).val();

        $.ajax({
            url: "ceva.php",
            data: "id=" + id   ,
            type: "POST",

            success: function(data){
                $('#localitate').html(data);

            }
        })
    });

    $(document).on("change","#id_loc", function(e){
        var id_loc=$(this).val();

        $.ajax({
            url: "ceva.php",
            data: "id_loc=" + id_loc   ,
            type: "POST",

            success: function(data){
                $('#adress').html(data);

            }
        })

    });
</script>


