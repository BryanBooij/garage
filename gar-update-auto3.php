<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"

    <title>gar-update-auto3.php</title>
</head>
<body>
<h1>garage update auto 3</h1>
<p>
    autogegevens wijzigen in de tabel klant van de database garage
</p>

<?php
//autogegevens uit het formulier halen --------------------------------
//    $autokenteken       = '22-KK-06';
//    $automerk           = 'test';
//    $autotype           = 'test';
//    $autokmafstand      = 1;
//    $klantid            = 2;

//    var_dump($autokenteken);
//    var_dump($automerk);
//    var_dump($autotype);
//    var_dump($autokmafstand);
//    var_dump($klantid);

    //updaten autogegevens -------------------------------------------
    require_once "gar-connect.php";
$autokenteken       = $_POST["autokentekenvak"];
$automerk           = $_POST["automerkvak"];
$autotype           = $_POST["autotypevak"];
$autokmafstand      = $_POST["autokmafstandvak"];
$klantid            = $_POST["klantidvak"];

var_dump($autokenteken);
var_dump($automerk);
var_dump($autotype);
var_dump(intval($autokmafstand));
var_dump(intval($klantid));

//    $sql = $conn->prepare
//    ("
//            update auto set   automerk     = :automerk,
//                              autotype    = :autotype,
//                              autokmafstand = :autokmafstand,
//                              klantid     = :klantid
//                              where autokenteken = :autokenteken
//   ");

$update = $conn->prepare("UPDATE auto SET automerk = :automerk, autotype = :autotype, autokmafstand = :autokmafstand, klantid = :klantid WHERE autokenteken = :autokenteken");

$update->bindParam(':autokenteken', $_POST["autokentekenvak"]);

$update->bindParam(':automerk', $_POST["automerkvak"]);
$update->bindParam(':autotype', $_POST["autotypevak"]);
$update->bindParam(':autokmafstand', $_POST["autokmafstandvak"]);
$update->bindParam(':klantid', $_POST["klantidvak"]);
//$update->bindParam(':autokenteken', $autokenteken);
//
//$update->bindParam(':automerk', $automerk);
//$update->bindParam(':autotype', $autotype);
//$update->bindParam(':autokmafstand', $autokmafstand);
//$update->bindParam(':klantid', $klantid);
$update->execute();

    var_dump($update->execute()
);
/*
    $sql->execute([

        "autokenteken"       => $autokenteken,
        "automerk"     => $automerk,
        "autotype"    => $autotype,
        "autokmafstand" => $autokmafstand,
        "klantid" => $klantid

    ]);
*/

//    $sql->execute([
//
//        ":autokenteken"       => $autokenteken,
//        ":automerk"     => $automerk,
//        ":autotype"    =>  $autotype,
//        ":autokmafstand" => $autokmafstand,
//        ":klantid" => $klantid
//
//    ]);

//
//    echo "de auto is gewijzigd. <br />";
//    echo "<a href='gar-menu.php'> terug naar het menu </a>";

?>


</body>
</html>