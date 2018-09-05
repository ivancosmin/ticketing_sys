
<?php
    include ('class/dbconnect.php');
    $bdd = new db();
    $conn = $bdd->connect();

    $details = array();
    $details = $bdd->listFullDetails();


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
                echo "<td>" . $bdd->listPersons($value['id_person']) . "</td>";
                echo "<td>" . $bdd->listOneAdress($value['id_adress']) . "</td>";
                $adress=$bdd->listOneAdress($value['id_adress']);

                $idloc = $bdd->listIdLoc($adress);


                echo "<td>" . $bdd->listOneLoc($idloc) . "</td>";
                $localitate = $bdd->listOneLoc($idloc);
                $idjud = $bdd->listIdJud($localitate);
                echo "<td>" . $bdd->listOnejud($idjud) . "</td>";

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
                    $jud = $bdd->listJudete();
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

</script>