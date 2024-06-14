<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj izjavo</title>
</head>
<body>
    <h1>Dodaj izjavo</h1>
    <form action="dodajIzjavo.php" method="post" enctype="multipart/form-data">
        <label for="ime">Ime:</label>
        <input type="text" id="ime" name="ime" required><br><br>

        <label for="datum">Datum:</label>
        <input type="date" id="datum" name="datum" required><br><br>

        <label for="izjava">Izjava:</label>
        <input id="izjava" name="izjava" required></input><br><br>

        <label for="slika">Naloži sliko:</label>
        <input type="file" id="slika" name="slika" accept="image/*"><br><br>

        <input type="submit" name="submit" value="Dodaj Izjavo">
    </form>
</body>
</html>
<?php

header("Content-type: text/html; charset=UTF-8");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "polanicl";
    $password = "hn2gJ3Hx";
    $dbname = "polanicl";

    // Absolute path to the directory where images will be stored
    $target_dir = "assets/images/"; 
    // URL path to access the images
    $base_url = "https://sais.fnm.um.si/~polanicl/projekt/naloga6/assets/images/";


    //Tu sem testiral zakaj ni delalo
    // Check if directory exists and is writable
    if (!is_dir($target_dir)) {
        die("Directory does not exist: " . $target_dir);
    }

    if (!is_writable($target_dir)) {
        die("Directory is not writable: " . $target_dir);
    }

    // Povezava z bazo podatkov
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Preverjanje povezave
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }




    
    // Prejem podatkov iz obrazca
    $ime = $conn->real_escape_string($_POST['ime']);
    $datum = $conn->real_escape_string($_POST['datum']);
    $izjava = $conn->real_escape_string($_POST['izjava']);

    // Nalaganje slike
    $slika = $_FILES['slika'];
    $imageFileType = strtolower(pathinfo($slika["name"], PATHINFO_EXTENSION));
    $unique_name = "slika_" . uniqid() . "." . $imageFileType;
    $target_file = $target_dir . $unique_name;
    $target_url = $base_url . $unique_name;

    // Preverjanje in nalaganje slike
    if ($slika['error'] !== UPLOAD_ERR_OK) {
        echo "Error during file upload: " . $slika['error'] . "<br>";
    } elseif (move_uploaded_file($slika["tmp_name"], $target_file)) {
        // Vstavljanje podatkov v tabele
        // Vstavljanje stranke
        $sql = "INSERT INTO customers (name) VALUES ('$ime')";
        if ($conn->query($sql) === TRUE) {
            $customer_id = $conn->insert_id;

            // Vstavljanje slike
            $sql = "INSERT INTO images (path, filename) VALUES ('$target_dir', '$target_file')";
            if ($conn->query($sql) === TRUE) {
                $image_id = $conn->insert_id;

                // Vstavljanje izjave
                $sql = "INSERT INTO statements (customer_id, image_id, date, statement) VALUES ('$customer_id', '$image_id', '$datum', '$izjava')";
                if ($conn->query($sql) === TRUE) {
                    echo "Izjava uspešno dodana.<br>";
                    echo "Ime: " . $ime . "<br>";
                    echo "Datum: " . $datum . "<br>";
                    echo "Izjava: " . $izjava . "<br>";
                    echo "Slika: <a href='$target_url'>" . $target_url . "</a><br>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Napaka pri uploadu.";
    }

    $conn->close();
}
?>
