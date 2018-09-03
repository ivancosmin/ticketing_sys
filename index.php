<html>
<head>
    <meta charset="UTF-8">
    <title>Ticketing System</title>
</head>

<body>

<nav>
    <ul>
        <li><a href="index.php?page=1">Add Person</a></li>
        <li><a href="index.php?page=2">Add Book</a></li>
        <li><a href="index.php?page=3">Edit Book</a></li>
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
