<?php


session_start();

include('include/db_connection.php');

$ID = $_SESSION["Gebruiker_ID"];

$sql = "SELECT Gebruiker_ID, Voornaam, Studentnr, Quote FROM User WHERE Gebruiker_ID = $ID";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $studentnaam = $row["Voornaam"];

        $studentnumber = $row["Studentnr"];
        $studentquote = $row["Quote"];
    }
} else {
    $studentnaam = "Gast";

    $studentnumber = "default";
    $studentquote = "Ik ben hier nieuw!";
}




$bgColor = '';
$textColor = '';

$PfNaam = 'pf.jpg';
$profielfoto = "studentuploads/$studentnumber/Profielfoto/$PfNaam";


/*
function message() {
    if (isset($_SESSION["message"])) {
        $output = "<div class=\"message\">";
        $output .= htmlentities($_SESSION["message"]);
        $output .= "</div>";

        //clear message
        $_SESSION["message"] = null;
        return $output;
    }
}
function errors(){
    if (isset($_SESSION["errors"])) {
        $errors = $_SESSION["errors"];

        //clear message
        $_SESSION["errors"] = null;
        return $errors;
    }
}
*/
?>