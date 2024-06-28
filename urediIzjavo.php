<!DOCTYPE html>

<html lang="sl">

    <head>
        <title>Urejanje izjav</title>
        <meta charset="utf-8">
    </head>
    
    <body>
        <?php
            require "poveziZBazoStudentskiStreznik.php";
            $baza = povezi();

            $sql = "select * from izjave";

            $rez = $baza->query($sql);

            print("<h1>Ime pošiljateljev in njihove izjave</h1>");
            print("<ol id='seznam'>");
            while($vrstica = $rez->fetch()) {
                $opis = $vrstica["opis"];
                $ime = $vrstica["ime_osebe"];
                $datum = $vrstica["datum"];
                $id = $vrstica["id"];
                print("<li>");
                print("$ime, $datum, \"$opis\" <a href='urediIzjavoUrejanje.php?id=$id'>uredi izjavo</a>");
                print("</li>");
            }
            print("</ol>");
        ?>
    </body>
</html>