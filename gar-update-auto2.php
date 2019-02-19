<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>gar-update-auto2.php</title>
</head>
<body>
<h1>garage update auto 2</h1>
<p>
    Dit formulier wordt gebruikt om autogegevens te wijzigen
    in de tabel klant van de database garage.
</p>
<?php
// autokenteken uit het formulier halen --------------------------------------
$autokenteken = $_POST["autokentekenvak"];

// autogegevens uit de tabel halen -------------------------------------
require_once "gar-connect.php";

$autos = $conn->prepare("
select      autokenteken,
            automerk,
            autotype,
            autokmafstand,
            klantid
            from auto
            where autokenteken = :autokenteken");
$autos->bindParam(':autokenteken', $autokenteken);
$autos->execute();
$auto = $autos->fetch(PDO::FETCH_ASSOC);

// klantgegevens in een nieuw formulier laten zien ------------------------
echo "<form action='gar-update-auto3.php' method='post'>";
//foreach($autos as $auto)
//{
    // klantid mag niet gewijzigd worden
    echo " autokenteken:" . $auto["autokenteken"];
    echo " <input type='hidden' name='autokentekenvak'";
    echo " value = '" .$auto["autokenteken"]."'";
    echo " > <br />";

    echo " automerk: <input type='text' ";
    echo " name = 'automerkvak' ";
    echo " value = '" .$auto["automerk"]."'";
    echo " > <br />";

    echo " autotype: <input type='text' ";
    echo " name = 'autotypevak' ";
    echo " value = '" .$auto["autotype"]."'";
    echo " > <br />";

    echo " autokmafstand: <input type='number' ";
    echo " name = 'autokmafstandvak' ";
    echo " value = '" .$auto["autokmafstand"]."'";
    echo " > <br />";

    echo " klantid: <input type='number' ";
    echo " name = 'klantidvak' ";
    echo " value = '" .$auto["klantid"]."'";
    echo " > <br />";
//}

echo "<input type='submit'>";
echo "</form>";

// er moet eigenlijk nog gecontroleerd worden op een bestaand auto
?>
</body>
</html>