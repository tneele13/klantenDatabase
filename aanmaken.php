<?php

?>

<html>
<head>
    <title>Klanten | Aanmaken voor de test</title>

</head>
<h1>Klant aanmaken</h1>
<form name="klant aanmaken" method="post" action="klantAanmaken.php">
    <label><h3>Vul hier de gegevens in</h3></label>
    <label>Voornaam klant: </label>
    <input name="voornaam" type="text" REQUIRED><br>
    <label>Achternaam klant: </label>
    <input name="achternaam" type="text" ><br>
    <label>E-mail klant: </label>
    <input name="mail" type="text" ><br>
    <label>Telefoon nummer: </label>
    <input name="telefoon" type="text" ><br>
    <label>Kenteken:* </label>
    <input name="kenteken" type="text" ><br>
    <label>Bijbehoorende factuur: </label>
    <input name="factuurnr" type="text" ><br>
    <label>Merk: </label>
    <input name="merk" type="text" ><br>
    <label>Type: </label>
    <input name="type" type="text" ><br>
    <label>Verrichte werkzaamheden: </label><br>
    <textarea name="werkzaamheden" rows="5" cols="50" ></textarea><br>
    <label>*Vergeet niet de "-" toe te voegen!!</label><br>
    <input type="submit" name="submit" value="Aanmaken!">
</form>
<br> <a href="index.php"><-- Terug naar home</a>
</html>
