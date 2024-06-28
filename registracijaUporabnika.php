<!DOCTYPE html>
<html lang="sl">
<head>
    <title>Registracija</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>Registracija</h1>
    <?php
    require "poveziZBazoStudentskiStreznik.php";
    $baza = povezi();

    if (isset($_POST["poslji"])) {
        $uporabnisko_ime = $_POST["uporabnisko_ime"];
        $geslo = $_POST["geslo"];

        $sqlPreverjanjeObstojaUporabnika = "SELECT uporabnisko_ime FROM uporabniki WHERE uporabnisko_ime = '$uporabnisko_ime';";

        $gesloHashed = password_hash($geslo, PASSWORD_DEFAULT);
        $sqlInsertUporabnika = "INSERT INTO uporabniki(uporabnisko_ime, geslo) VALUES ('$uporabnisko_ime', '$gesloHashed');";


        $rez = $baza->query($sqlPreverjanjeObstojaUporabnika);

        if($rez->fetch() == false){
            $baza->exec($sqlInsertUporabnika);
            print('<p>Uporabnik dodan. Kliknite <a href="prijava.php">tukaj</a> za prijavo.</p>');
        }
        else{
            print("<p>Uporabnik s tem imenom žal že obstaja, zato si izberite drugo uporabniško ime.</p>");
        }
    }
    ?>
    <form action="registracijaUporabnika.php" method="post"> 
        <label for="uporabnisko_ime">Vnesi uporabniško ime</label>
        <input id="uporabnisko_ime" name="uporabnisko_ime" required><br>
        <label for="geslo">Vnesi geslo</label>
        <input type="password" id="geslo" name="geslo" required><br>
        <button type="submit" name="poslji" value="1">Pošlji podatke</button> 
    </form>
    <p><a href="prijava.php">Povezava na prijavo</a></p>
</body>
</html>