<?php

?>



<html>
<head>
    <title>Klanten | Zoeken</title>

</head>
<body>

<h1>Klant zoeken</h1>
<h2>Maar via 1 veld zoeken!!</h2>
<form name="klant zoeken" method="post" action="werkzaamhedenzoeken.php">
    <label>Welke klant wil je zoeken?</label><br>
    <label>Voornaam: </label>
    <input name="voornaam" type="text"><br>
    <label>Achternaam:      </label>
    <input type="text" name="achternaam"><br>
    <label>Email:           </label>
    <input type="text" name="mail"><br>
    <label>Telefoon nummer: </label>
    <input type="tel" name="telefoon"><br>
    <label>Kenteken: </label>
    <input type="text" name="kenteken"><br>
    <input type="submit" name="submit" value="Zoeken!">
</form>
<br> <a href="index.php"><-- Terug naar home</a>

</body>

</html>

