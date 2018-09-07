
<?php
include ("classes/Connection.php");
Connection::getConnection(array("host"=>"localhost","database"=>"ticketing_sys","user"=>"root","password"=>""));

    $details = array();
//    $details = $bdd->list("details");
    $details = Connection::listingAll("details")

?>

<h3 align="center">General Listing</h3>
<table border="1" align="center">
    <thead>
        <th>Title</th>
        <th>Text</th>
        <th>Grade</th>
        <th>Data</th>
        <th>Person</th>
        <th>Adress</th>
        <th>Localitate</th>
        <th>Judet</th>
    </thead>
    <tbody>
        <?php
        foreach ($details as $value) {

            echo "<tr>";
                echo "<td>" . $value['title'] . "</td>";
                echo "<td>" . $value['text'] . "</td>";
                echo "<td>" . $value['grade'] . "</td>";
                echo "<td>" . $value['data'] . "</td>";
                echo "<td>" . Connection::listOne("persons", "id", $value['id_person'], "name") . "</td>";
//                echo "<td>" . $bdd->listOne("persons","id",$value['id_person'], "name") . "</td>";
//                echo "<td>" . $bdd->listOneAdress($value['id_adress']) . "</td>";
//                echo "<td>" . $bdd->listOne("adrese","id",$value['id_adress'],"nume") . "</td>";
            echo "<td>" . Connection::listOne("adrese","id",$value['id_adress'],"nume") . "</td>";


//                $adress=$bdd->listOne("adrese","id",$value['id_adress'],"nume");
                    $adress=Connection::listOne("adrese","id",$value['id_adress'],"nume");

//            $idloc = $bdd->listIdLoc($adress);

//            $adr = "'" . $adress . "'";
//            $id_loc = Connection::listOne("adrese","nume", $adr ,"id_localitate");
//                echo $id_loc . "asdadas" ;
                $id_loc = Connection::listForVariable("adrese", "nume", $adress, "id_localitate" );



//                echo "<td>" . $bdd->listOneLoc($idloc) . "</td>";
//                    echo $id_loc;
                    $localitate = Connection::listOne("localitati", "id", $id_loc, "nume");
//                  echo $localitate ;
//
                    echo "<td>" .$localitate . "</td>";
//
//
////                echo "<td>" . $bdd->listOne("localitati", "id", $idloc,"nume" ) . "</td>";
////                $localitate = $bdd->listOne("localitati", "id", $idloc,"nume" );
////                $idjud = $bdd->listIdJud($localitate);
//
                $idjud = Connection::listForVariable("localitati","nume",$localitate,"id_judet");
//
                echo "<td>" . Connection::listOne("judete", "id", $idjud,"nume" ) . "</td>";

            echo "</tr>";

        }
        ?>
    </tbody>
</table>
</br>

<h3 align="center">Listing preferential</h3>

<form method="post" >
    <table align="center">
    <tr>
        <td>
         Judet:
        </td>
        <td>
            <select name="judet" id="jud">
                <?php
                    $jud = array();
//                    $jud = $bdd->list("judete");
                    $jud = Connection::listingAll("judete");
                    echo "<option>" . "Selecteaza judet" . "</option>";
                    foreach ($jud as $value){
                        echo '<option value="' . $value['id'] . '">' . $value['nume']. '</option>';
                        }
                ?>
            </select>
        </td>
    </tr>

    <tr id="localitate">

    </tr>
<!--        <tr id="adress">-->
<!---->
<!--        </tr>-->
    </table>
    <div id="adress">

    </div>
</form>
<form method="post" >
    <table align="center">
        <tr>
            <td>
                Persoana:
            </td>
            <td>
                <select name="persoana" id="pers">
                    <?php
                    $jud = array();
//                    $jud = $bdd->list("persons");
                    $jud = Connection::listingAll("persons");
                    echo "<option>" . "Selecteaza persoana" . "</option>";
                    foreach ($jud as $value){
                        echo '<option value="' . $value['id'] . '">' . $value['name']. '</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
    </table>
</form>

<div id="list_persons">

</div>

<form method="post">
    <table align="center">
        <tr>
            <td>Introduceti textul:</td>
            <td><input type="text" name="input" /></td>
        </tr>
        <tr aria-colspan="2">
            <td><input type="submit" name="submit" value="Submit" /></td>
        </tr>
    </table>
</form>

<?php
    if(isset($_POST['submit'])){
        $list = array();
//        $list = $bdd->listDetailsForText($_POST['input']);

        $list = Connection::listForText("details", $_POST['input']);
//        echo "<pre>";
//        var_dump($list);
//        echo "</pre>";

        echo "<table border='1' align='center'>";
        echo "<thead>";
        echo "<th>" . "Title" . "</th>";
        echo "<th>" . "Text" . "</th>";
        echo "<th>" . "Grade" . "</th>";
        echo "<th>" . "Data" . "</th>";
        echo "</thead>";

        echo "<tbody>";
        echo '<tr>';
        foreach ($list as $li){
            echo "<tr>";
            echo "<td>" . $li['title'] . "</td>";
            echo "<td>" . $li['text'] . "</td>";
            echo "<td>" . $li['grade'] . "</td>";
            echo "<td>" . $li['data'] . "</td>";
            echo "</tr>";
        }
        echo '</tr>';
        echo "</tbody>";
        echo "</table>";
    }
?>


<script type="text/javascript">

    $(document).on("change","#jud", function(){
        var id_jud= $(this).val();

        $.ajax({
            url: "listing.php",
            data: "id_jud=" + id_jud   ,
            type: "POST",
            success: function(data){
                $('#localitate').html(data);

            }
        })
    });

    $(document).on("change","#id_loc", function() {
        var id_loc = $(this).val();

        $.ajax({
            url: "listing.php",
            data: "id_loc=" + id_loc,
            type: "POST",

            success: function (data) {
                $('#adress').html(data);

            }
        });
    });

    $(document).on("change","#pers", function(){
        var id_pers= $(this).val();

        $.ajax({
            url: "listing.php",
            data: "id_pers=" + id_pers   ,
            type: "POST",
            success: function(data){
                $('#list_persons').html(data);

            }
        })
    });

</script>