<!DOCTYPE html>

<html lang="sl">

    <head>
        <title>Izbrisi izjavo</title>
        <meta charset="utf-8">
    </head>
    
    <body>
        
        <?php
        //vse skoraj enako kot vaje
            require "poveziZBazoStudentskiStreznik.php";

            
            $baza = povezi();
            $sql = "select * from izjave";
            $rez = $baza->query($sql);


            print("<h2>Izberi, katero izjavo želiš izbrisati.</h2>");
            print("<ol id='seznam'>");
            while($vrstica = $rez->fetch()) {
                $id = $vrstica["id"];
                $ime = $vrstica["ime_osebe"];
                $opis = $vrstica["opis"];
                $datum = $vrstica["datum"];
                print("<li>");
                print("$ime, $datum: \"$opis\" <a href='izbrisiIzjavoIzbris.php?id=$id'>izbrisi</a>");
                print("</li>");
            }
            print("</ol>");
        ?>
        <script>
            const el = document.getElementById("seznam");
            el.addEventListener("click", (e)=>{
                if(e.target.tagName == "A"){
                    if(e.target.innerText == "izbrisi")
                        if(confirm("Zares želiš brisati?") == false)
                            e.preventDefault();
                }
            });
        </script>
    </body>
</html>