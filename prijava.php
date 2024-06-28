<?php
    session_start();
    require "poveziZBazoStudentskiStreznik.php";
    $baza = povezi();

    if (isset($_POST["poslji"])) {
        $uporabnisko_ime = $_POST["uporabnisko_ime"];
        $geslo = $_POST["geslo"];

        $sql = "SELECT geslo FROM uporabniki WHERE uporabnisko_ime = '$uporabnisko_ime';";
        $rez = $baza->query($sql);

        if($vrstica = $rez->fetch()) {
            if (password_verify($geslo, $vrstica["geslo"])) {
                $_SESSION["prijavljen"] = "true";
                $_SESSION["uporabnisko_ime"] = $uporabnisko_ime;
            } else {
                print("Nepravilno geslo");
            }
        } else {
            print("Uporabnik s tem imenom še ne obstaja. Prosimo, da se registrirate.");
        }
    }
    if(isset($_POST["odjava"])) {
        session_unset();
        session_destroy();
        header("Location: prijava.php");
    }

?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <title>Prijava</title>
    <meta charset="utf-8">
</head>
<body>
    <?php
        if(isset($_SESSION["prijavljen"]) && $_SESSION["prijavljen"] === "true"){
            print("<h1>Zdravo, ".$_SESSION["uporabnisko_ime"]."</h1>");
    ?>
        <form action="prijava.php" method="post">
            <button type="submit" name="odjava" value="2">Odjava</button>
        </form>
    <?php
        } else {
    ?>
        <form action="prijava.php" method="post"> 
        <label for="uporabnisko_ime">Vnesi uporabniško ime</label>
        <input id="uporabnisko_ime" name="uporabnisko_ime" value="<?php if(isset($_POST["poslji"])){ $uporabnisko_ime = $_POST["uporabnisko_ime"]; print($uporabnisko_ime);}?>" required><br>
        <label for="geslo">Vnesi geslo</label>
        <input type="password" id="geslo" name="geslo" required><br>
        <button type="submit" name="poslji" value="1">Prijava</button> 
    </form>
    <?php
        }
        if (!isset($_SESSION["prijavljen"])) {
    ?>
        <p><a href="registracijaUporabnika.php">Povezava na registracijo</a></p>
    <?php
        }
    ?>
    <p><a href=
    <?php
        if(isset($_SESSION["prijavljen"])){
            print("stranSkrbnika.php");
        } else{
            print("prijava.php");
        }
    ?>
    >Povezava na stran skrbnika</a> (Dostop samo za prijavljene uporabnike)</p>
</body>
</html>