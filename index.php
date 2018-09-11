<?php
session_start();
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Ticketing System</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--    <link href="select2-4.0.6-rc.1/dist/css/select2.min.css" rel="stylesheet" />-->
<!--    <script src="select2-4.0.6-rc.1/dist/js/select2.min.js">-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>

<nav>
    <ul>
        <li><a href="index.php?page=1">Add Person</a></li>
        <li><a href="index.php?page=2">Add Book</a></li>
        <li><a href="index.php?page=3">Edit Book</a></li>
        <li><a href="index.php?page=4">List Tickets</a></li>
        <li><a href="index.php?page=5">Files</a></li>
    </ul>
</nav>

<section>
    <?php
        if (isset($_GET['page'])){
            $p = $_GET['page'];
            switch ($p){
                case 1:
                    require_once "pages/add_person.php";
                    break;
                case 2:
                    require_once "pages/add_book.php";
                    break;
                case 3:
                    require_once "pages/edit_book.php";
                    break;
                case 4:
                    require_once "pages/list_ticket.php";
                    break;
                case 5:
                    require_once "pages/files.php";
                    break;
                default:
                    require_once "pages/error.php";
            }
        }
        else{
            require_once "pages/home.php";

        }
    ?>
</section>


</body>
</html>
