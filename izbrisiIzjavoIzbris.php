<!DOCTYPE html>

<html lang="sl">
    <head>
        <title>Naslov spletne strani</title>
        <meta charset="utf-8">
    </head>
    
    <body>
        <?php
            $id = -1;
            if(isset($_GET["id"]))
                $id = $_GET["id"];

            
            if($id != -1) {
                require "poveziZBazoStudentskiStreznik.php";
                $baza = povezi();

                $sql = "delete from izjave where id=$id";

                $rez = $baza->exec($sql);
                if($rez == 1){
        ?>
                <script>
                    window.location = "izbrisiIzjavo.php";
                </script>
        <?php
                }
                else
                    print("Ni bilo brisanja.");
            } else
                print("Ni veljaven ID!");   
        ?>
    </body>
</html>