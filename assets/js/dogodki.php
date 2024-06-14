

<?php
header("Content-type: text/javascript");

// Suppress errors and warnings from outputting to the browser
error_reporting(0);
ini_set('display_errors', 0);

// Povezava z bazo podatkov
/*$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "komentarji";*/

    $servername = "localhost";
    $username = "polanicl";
    $password = "hn2gJ3Hx";
    $dbname = "polanicl";

// Ustvarjanje povezave
$conn = new mysqli($servername, $username, $password, $dbname);

// Preverjanje povezave
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the character set to utf8
$conn->set_charset("utf8");

// Branje podatkov iz baze
$sql = "SELECT c.name AS ime, i.path, i.filename, s.date AS datum, s.statement AS izjava 
        FROM statements s 
        JOIN customers c ON s.customer_id = c.id 
        JOIN images i ON s.image_id = i.id";
$result = $conn->query($sql);

$dogodki = array();

if ($result->num_rows > 0) {
    // Podatke dodamo v polje
    while($row = $result->fetch_assoc()) {
        $dogodek = new stdClass();
        $dogodek->ime = $row["ime"];
        $dogodek->slika = $row["filename"];
        $dogodek->datum = date("j. n. Y", strtotime($row["datum"]));
        $dogodek->izjava = $row["izjava"];
        $dogodki[] = $dogodek;
    }
}

$conn->close();

// Pretvorimo polje v JSON notacijo
$niz = json_encode($dogodki, JSON_UNESCAPED_UNICODE);

if ($niz === false) {
    // Handle JSON encoding error
    $niz = json_encode(["error" => json_last_error_msg()]);
}

// Ensure no prior output
if (ob_get_length()) ob_clean();

// Izpišemo rezultat v dokument
echo "let dogodki = $niz;";
?>

