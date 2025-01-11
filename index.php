<?php
    session_start();
    require_once("config.php");
    require_once("functions.php");
    require_once("classes/Database.php");
    require_once("classes/Orarend.php");

    $db = new Database();
    $orarend = new Orarend($db);

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Órarend</title>
    <link rel="stylesheet" href="./orarend.css">
</head>
<body>
    <header>
        <h1>Órarend</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Főoldal</a></li>
            <li><a href="index.php?menu=adatbevitel">Adatbevitel</a></li>
            <li><a href="index.php?menu=megjelenites">Megjenítés</a></li>
        </ul>
    </nav>
    <main>
        <?php
            if(isset($_GET["menu"])){
                $menu = $_GET["menu"];
                if($menu == "adatbevitel"){
                    include("adatbevitel.php");
                }else if($menu == "megjelenites"){
                    include("megjelenites.php");
                }
            } else {
                include("fooldal.php");
            }
        ?>
    </main>
    
</body>
</html>