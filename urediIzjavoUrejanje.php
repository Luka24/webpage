<!DOCTYPE html>

<html lang="sl">
    <head>
        <title>Urejanje izjav</title>
        <meta charset="utf-8">
    </head>
    
    <body>
        <?php
        $id = -1;
        require "poveziZBazoStudentskiStreznik.php";
                $baza = povezi();
            if(isset($_GET["id"]))
                $id = $_GET["id"];
            if($id != -1) {
                $sql = "select ime_osebe, datum, opis from izjave where id=$id;";

                $rez = $baza->query($sql);
                $ime = '';
                $priimek = '';

                $vrstica = $rez->fetch();

                if($vrstica != false) {
                    $ime = $vrstica["ime_osebe"];
                    $opis = $vrstica["opis"];
                    $datum = $vrstica["datum"];
                }
            }

            if(isset($_POST["poslji"])){                         
                $ime = $_POST["ime"];
                $datum = $_POST["datum"];
                $opis = $_POST["opis"];
                $sql = "update izjave set ime_osebe = '$ime', datum = '$datum', opis = '$opis' where id=$id;";
                if ($baza->exec($sql)) {
                    print("<p>Podatki so bili uspešno spremenjeni.</p>");
                } else {
                    print("Napaka: " . $baza->errorInfo()[2]);
                }          
            }
        ?>
        <form action="urediIzjavoUrejanje.php?id=<?php print("$id") ?>" method="post">   
            <label for="ime">Vnesi novo ime:</label>
            <input id="ime" name="ime" required value="<?php print($ime) ?>"><br>
            <label for="datum">Vnesi nov datum:</label>
            <input id="datum" name="datum" required value="<?php print($datum) ?>"><br>
            <label for="opis">Vnesi novo izjavo:</label>
            <input id="opis" name="opis" required value="<?php print($opis) ?>"><br>
            <button type="submit" name="poslji" value="1">Pošlji</button> 
        </form>
    </body>
</html>