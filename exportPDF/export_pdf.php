<?php
require_once ('../tcpdf/tcpdf.php');
include ("../classes/Connection.php");
Connection::getConnection(array("host"=>"localhost","database"=>"ticketing_sys","user"=>"root","password"=>""));
ob_start();

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Ticketing Sys');
$pdf->SetTitle('Ticketing sys');
$pdf->SetSubject('Details');

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);


$pdf->AddPage();


$pdf->SetFont('dejavusans', '', 10);


$id = $_GET['id'];
$list = Connection::listingAll("details", "id", $id);

$person = Connection::listOne("persons", "id", $list[0]['id_person'], "name");
$adress = Connection::listOne("adrese","id",$list[0]['id_adress'],"nume");
$id_loc = Connection::listForVariable("adrese", "nume", $adress, "id_localitate" );
$localitate = Connection::listOne("localitati", "id", $id_loc, "nume");
$idjud = Connection::listForVariable("localitati","nume",$localitate,"id_judet");
$judet = Connection::listOne("judete", "id", $idjud,"nume" );
$html = '

<html>
<body>
<table border="1" align="center">
    <tr  style="font-weight: bold;">
        <th> ID </th>
        <th>Title</th>
        <th>Text</th>
        <th>Grade</th>
        <th>Data</th>
        <th>Person</th>
        <th>Adress</th>
        <th>Localitate</th>
        <th>Judet</th>
    </tr>
    <tr>
        <td>' . $id . '</td>
        <td>' . $list[0]['title'] . '</td>
        <td>' . $list[0]['text'] . '</td>
        <td>' . $list[0]['grade'] . '</td>
        <td>' . $list[0]['data'] . '</td>
        <td>' . $person . '</td>
        <td>' . $adress . '</td>
        <td>' . $localitate . '</td>
        <td>' . $judet . '</td>
    </tr>
</table>
</body>
</html>
';
$pdf->writeHTML($html, true, false, true, false, '');
//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');
?>