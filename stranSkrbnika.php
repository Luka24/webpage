<?php
    session_start();

    if (!isset($_SESSION["prijavljen"]) || $_SESSION["prijavljen"] !== "true") {
        header("Location: prijava.php");
    }

    if(isset($_POST["odjavi"])) {
        session_unset();
        session_destroy();
        header("Location: prijava.php");
    }
?>

<!DOCTYPE html>
<html lang="sl">
    <head>
        <meta charset="utf-8">
        <title>Stran skrbnika</title>
    </head>
    <body>
        <h1>Stran skrbnika</h1>
        <h2>Izberite eno od možnosti</h2>
        <div> <a href="dodajIzjavo.php">Dodajanje novih izjav</a> </div>
        <br>
        <div> <a href="urediIzjavo.php">Urejanje obstojecih izjav</a> </div>
        <br>
        <div> <a href="izbrisiIzjavo.php">Izbris obstojecih izjav</a> </div>
        <br>
        <form action="stranSkrbnika.php" method="post">
            <button type="submit" name="odjavi" value="2">Odjava</button>
        </form>
    </body>
</html>