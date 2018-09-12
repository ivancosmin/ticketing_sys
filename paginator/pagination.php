<?php

include ("Paginator.class.php");



$limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 25;
$page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
$links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
$query      = "SELECT * FROM details";

$Paginator  = new Paginator(  $query );

$results    = $Paginator->getData( 10, 1 );
?>


<h3 align="center">General Listing</h3>
<table border="1" align="center">
    <thead>
        <th>Title</th>
        <th>Text</th>
        <th>Grade</th>
        <th>Data</th>
    </thead>

    <tbody>
        <?php
            foreach ($results as $value){
                echo "<tr>";
                echo "<td>" . $value['title'] . "</td>";
                echo "<td>" . $value['text'] . "</td>";
                echo "<td>" . $value['grade'] . "</td>";
                echo "<td>" . $value['data'] . "</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>

<?php
echo $Paginator->createLinks( $links, 'pagination pagination-sm' );
?>

