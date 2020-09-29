<?php
require 'Customer.php';

?>
    <head>
        <title>Klanten | Zoeken</title>

    </head>
<?php

    if (isset($_POST['submit'])){

        $conn = mysqli_connect("localhost", "root", "root", "klantenbestand");
        if(!$conn){
            die( "er is iets fout gegaan!" . mysqli_connect_error());
        }


        $voornaam = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $mail = $_POST['mail'];
        $telefoon = $_POST['telefoon'];
        $kenteken = $_POST['kenteken'];
        //echo $voornaam. $achternaam. $mail. $telefoon;

        // check if there are any values entered
        if(empty($voornaam) && empty($achternaam) && empty($mail) && empty($telefoon) && empty($kenteken)){
            echo "Er zijn geen gegevens ingevuld!";
        }

        //search the database using the "Voornaam" variabele
        if(empty($achternaam) && empty($mail) && empty($telefoon) && empty($kenteken)){
            $sql = "SELECT * FROM customer WHERE voornaam= '$voornaam';";
            $result = $conn->query($sql);
            if($result->num_rows > 1 ){
                echo "Meer dan 1 resultaat gevonden op Naam: " . $voornaam . "<br>";
                echo "Gebruik zoeken op kenteken voor het beste resultaat <br>";
                while($row = $result->fetch_assoc()) {
                    echo "Naam: " . $row['voornaam'] . " " . $row['achternaam'] . "<br>";
                    echo "Telefoon nummer: " . $row['telefoon'] . "<br>";
                    echo "Factuurnr: " . $row['factuurnr'] . "<br>";
                    echo "Kenteken: " . $row['kenteken'] . "<br>";
                    echo "Verrichte werkzaamheden: " . $row['werkzaamheden'] . "<br> <br>";
                }
            }else if($result->num_rows > 0 ){
                $row = $result->fetch_assoc();
                // fetch the serialized value out of the database
                $seWerkzaamheden = $row['werkzaamheden'];
                // unserialize the fetched data so it is in an array again
                $deWerkzaamheden = unserialize($seWerkzaamheden);
                echo $row['klantId'];
                // create a new customer with an empty "Werkzaamheden" field because otherwise an array will be added to the objects array
                $klant = new Customer($row['klantId'], $row['voornaam'], $row['achternaam'], $row['email'], $row['telefoon'], $row['kenteken'], $row['factuurnr'], $row['merk'], $row['type'], "");
                //loop through the unserialized data so it turns into a string and can be added to the objects array
                for($t = 0 ; $t < count($deWerkzaamheden) ; $t++){
                    $str = $deWerkzaamheden[$t];
                    $klant->setWerkzaamheden($str);
                }

                ?>
                <form name="klant aanmaken" method="post" action="updateKlant.php">
                    <label><h3>Pas hier eventueel gegevens aan</h3></label>
                    <input type="radio" name="klantId" value="<?php echo $klant->klantId  ?>" checked><br>
                    <label>Voornaam klant: </label>
                    <input name="voornaam" type="text" value="<?php echo $klant->voornaam; ?>"><br>
                    <label>Achternaam klant: </label>
                    <input name="achternaam" type="text" value="<?php echo $klant->achternaam; ?>"><br>
                    <label>E-mail klant: </label>
                    <input name="mail" type="text" value="<?php echo $klant->email; ?>"><br>
                    <label>Telefoon nummer: </label>
                    <input name="telefoon" type="text" value="<?php echo $klant->telefoon; ?>"><br>
                    <label>Kenteken:* </label>
                    <input name="kenteken" type="text" value="<?php echo $klant->kenteken; ?>"><br>
                    <label>Bijbehoorende factuur: </label>
                    <input name="factuurnr" type="text" value="<?php echo $klant->factuur; ?>"><br>
                    <label>Merk: </label>
                    <input name="merk" type="text" value="<?php echo $klant->merk; ?>"><br>
                    <label>Type: </label>
                    <input name="type" type="text" value="<?php echo $klant->type; ?>"><br>
                    <label>Verrichte werkzaamheden: <?php

                        $array = $klant->werkzaamheden;
                        for($i = 0 ; $i<count($array) ; $i++){
                            echo  $array[$i] . "<br>";
                        }
                        ?> </label><br>
                    <label>Werkzaamheden toevoegen: </label><br>
                    <textarea name="extrawerkzaamheden" rows="5" cols="50" ></textarea><br>
                    <label>*Vergeet niet de "-" toe te voegen!!</label><br>
                    <input type="submit" name="update" value="Update gegevens">
                </form>

                <?php
            }
        }

        //search the database using the "achternaam" variabele
        if(empty($voornaam) && empty($mail) && empty($telefoon) && empty($kenteken)){
            $sql = "SELECT * FROM customer WHERE achternaam= '$achternaam';";
            $result = $conn->query($sql);
            if($result->num_rows > 0 ){
                $row = $result->fetch_assoc();
                // fetch the serialized value out of the database
                $seWerkzaamheden = $row['werkzaamheden'];
                // unserialize the fetched data so it is in an array again
                $deWerkzaamheden = unserialize($seWerkzaamheden);
                echo $row['klantId'];
                // create a new customer with an empty "Werkzaamheden" field because otherwise an array will be added to the objects array
                $klant = new Customer($row['klantId'], $row['voornaam'], $row['achternaam'], $row['email'], $row['telefoon'], $row['kenteken'], $row['factuurnr'], $row['merk'], $row['type'], "");
                //loop through the unserialized data so it turns into a string and can be added to the objects array
                for($t = 0 ; $t < count($deWerkzaamheden) ; $t++){
                    $str = $deWerkzaamheden[$t];
                    $klant->setWerkzaamheden($str);
                }

                ?>
                <form name="klant aanmaken" method="post" action="updateKlant.php">
                    <label><h3>Pas hier eventueel gegevens aan</h3></label>
                    <input type="radio" name="klantId" value="<?php echo $klant->klantId  ?>" checked><br>
                    <label>Voornaam klant: </label>
                    <input name="voornaam" type="text" value="<?php echo $klant->voornaam; ?>"><br>
                    <label>Achternaam klant: </label>
                    <input name="achternaam" type="text" value="<?php echo $klant->achternaam; ?>"><br>
                    <label>E-mail klant: </label>
                    <input name="mail" type="text" value="<?php echo $klant->email; ?>"><br>
                    <label>Telefoon nummer: </label>
                    <input name="telefoon" type="text" value="<?php echo $klant->telefoon; ?>"><br>
                    <label>Kenteken:* </label>
                    <input name="kenteken" type="text" value="<?php echo $klant->kenteken; ?>"><br>
                    <label>Bijbehoorende factuur: </label>
                    <input name="factuurnr" type="text" value="<?php echo $klant->factuur; ?>"><br>
                    <label>Merk: </label>
                    <input name="merk" type="text" value="<?php echo $klant->merk; ?>"><br>
                    <label>Type: </label>
                    <input name="type" type="text" value="<?php echo $klant->type; ?>"><br>
                    <label>Verrichte werkzaamheden: <?php

                        $array = $klant->werkzaamheden;
                        for($i = 0 ; $i<count($array) ; $i++){
                            echo  $array[$i] . "<br>";
                        }
                        ?> </label><br>
                    <label>Werkzaamheden toevoegen: </label><br>
                    <textarea name="extrawerkzaamheden" rows="5" cols="50" ></textarea><br>
                    <label>*Vergeet niet de "-" toe te voegen!!</label><br>
                    <input type="submit" name="update" value="Update gegevens">
                </form>

                <?php
            }
        }

        //search the database using the "Mail" variabele
        if(empty($achternaam) && empty($voornaam) && empty($telefoon) && empty($kenteken)){
            $sql = "SELECT * FROM customer WHERE email= '$mail';";
            $result = $conn->query($sql);
            if($result->num_rows > 0 ){
                $row = $result->fetch_assoc();
                // fetch the serialized value out of the database
                $seWerkzaamheden = $row['werkzaamheden'];
                // unserialize the fetched data so it is in an array again
                $deWerkzaamheden = unserialize($seWerkzaamheden);
                echo $row['klantId'];
                // create a new customer with an empty "Werkzaamheden" field because otherwise an array will be added to the objects array
                $klant = new Customer($row['klantId'], $row['voornaam'], $row['achternaam'], $row['email'], $row['telefoon'], $row['kenteken'], $row['factuurnr'], $row['merk'], $row['type'], "");
                //loop through the unserialized data so it turns into a string and can be added to the objects array
                for($t = 0 ; $t < count($deWerkzaamheden) ; $t++){
                    $str = $deWerkzaamheden[$t];
                    $klant->setWerkzaamheden($str);
                }

                ?>
                <form name="klant aanmaken" method="post" action="updateKlant.php">
                    <label><h3>Pas hier eventueel gegevens aan</h3></label>
                    <input type="radio" name="klantId" value="<?php echo $klant->klantId  ?>" checked><br>
                    <label>Voornaam klant: </label>
                    <input name="voornaam" type="text" value="<?php echo $klant->voornaam; ?>"><br>
                    <label>Achternaam klant: </label>
                    <input name="achternaam" type="text" value="<?php echo $klant->achternaam; ?>"><br>
                    <label>E-mail klant: </label>
                    <input name="mail" type="text" value="<?php echo $klant->email; ?>"><br>
                    <label>Telefoon nummer: </label>
                    <input name="telefoon" type="text" value="<?php echo $klant->telefoon; ?>"><br>
                    <label>Kenteken:* </label>
                    <input name="kenteken" type="text" value="<?php echo $klant->kenteken; ?>"><br>
                    <label>Bijbehoorende factuur: </label>
                    <input name="factuurnr" type="text" value="<?php echo $klant->factuur; ?>"><br>
                    <label>Merk: </label>
                    <input name="merk" type="text" value="<?php echo $klant->merk; ?>"><br>
                    <label>Type: </label>
                    <input name="type" type="text" value="<?php echo $klant->type; ?>"><br>
                    <label>Verrichte werkzaamheden: <?php

                        $array = $klant->werkzaamheden;
                        for($i = 0 ; $i<count($array) ; $i++){
                            echo  $array[$i] . "<br>";
                        }
                        ?> </label><br>
                    <label>Werkzaamheden toevoegen: </label><br>
                    <textarea name="extrawerkzaamheden" rows="5" cols="50" ></textarea><br>
                    <label>*Vergeet niet de "-" toe te voegen!!</label><br>
                    <input type="submit" name="update" value="Update gegevens">
                </form>

                <?php
            }
        }

        //search the database using the "Telefoon" variabele
        if(empty($achternaam) && empty($mail) && empty($voornaam) && empty($kenteken)){
            $sql = "SELECT * FROM customer WHERE telefoon=$telefoon;";
            $result = $conn->query($sql);
            if($result->num_rows > 0 ){
                $row = $result->fetch_assoc();

                // fetch the serialized value out of the database
                $seWerkzaamheden = $row['werkzaamheden'];
                // unserialize the fetched data so it is in an array again
                $deWerkzaamheden = unserialize($seWerkzaamheden);
                echo $row['klantId'];
                // create a new customer with an empty "Werkzaamheden" field because otherwise an array will be added to the objects array
                $klant = new Customer($row['klantId'], $row['voornaam'], $row['achternaam'], $row['email'], $row['telefoon'], $row['kenteken'], $row['factuurnr'], $row['merk'], $row['type'], "");
                //loop through the unserialized data so it turns into a string and can be added to the objects array
                for($t = 0 ; $t < count($deWerkzaamheden) ; $t++){
                    $str = $deWerkzaamheden[$t];
                    $klant->setWerkzaamheden($str);
                }

                ?>
                <form name="klant aanmaken" method="post" action="updateKlant.php">
                    <label><h3>Pas hier eventueel gegevens aan</h3></label>
                    <input type="radio" name="klantId" value="<?php echo $klant->klantId  ?>" checked><br>
                    <label>Voornaam klant: </label>
                    <input name="voornaam" type="text" value="<?php echo $klant->voornaam; ?>"><br>
                    <label>Achternaam klant: </label>
                    <input name="achternaam" type="text" value="<?php echo $klant->achternaam; ?>"><br>
                    <label>E-mail klant: </label>
                    <input name="mail" type="text" value="<?php echo $klant->email; ?>"><br>
                    <label>Telefoon nummer: </label>
                    <input name="telefoon" type="text" value="<?php echo $klant->telefoon; ?>"><br>
                    <label>Kenteken:* </label>
                    <input name="kenteken" type="text" value="<?php echo $klant->kenteken; ?>"><br>
                    <label>Bijbehoorende factuur: </label>
                    <input name="factuurnr" type="text" value="<?php echo $klant->factuur; ?>"><br>
                    <label>Merk: </label>
                    <input name="merk" type="text" value="<?php echo $klant->merk; ?>"><br>
                    <label>Type: </label>
                    <input name="type" type="text" value="<?php echo $klant->type; ?>"><br>
                    <label>Verrichte werkzaamheden: <?php

                        $array = $klant->werkzaamheden;
                        for($i = 0 ; $i<count($array) ; $i++){
                            echo  $array[$i] . "<br>";
                        }
                        ?> </label><br>
                    <label>Werkzaamheden toevoegen: </label><br>
                    <textarea name="extrawerkzaamheden" rows="5" cols="50" ></textarea><br>
                    <label>*Vergeet niet de "-" toe te voegen!!</label><br>
                    <input type="submit" name="update" value="Update gegevens">
                </form>

                <?php
            }
        }

        //search the database using the "Kenteken" variabele
        if(empty($achternaam) && empty($mail) && empty($voornaam) && empty($telefoon)){
            strtoupper($kenteken);
            $sql = "SELECT * FROM customer WHERE kenteken='$kenteken';";
            $result = $conn->query($sql);
            if($result->num_rows > 0 ){
                $row = $result->fetch_assoc();
//
                // fetch the serialized value out of the database
                $seWerkzaamheden = $row['werkzaamheden'];
                // unserialize the fetched data so it is in an array again
                $deWerkzaamheden = unserialize($seWerkzaamheden);
                echo $row['klantId'];
               // create a new customer with an empty "Werkzaamheden" field because otherwise an array will be added to the objects array
                $klant = new Customer($row['klantId'], $row['voornaam'], $row['achternaam'], $row['email'], $row['telefoon'], $row['kenteken'], $row['factuurnr'], $row['merk'], $row['type'], "");
                //loop through the unserialized data so it turns into a string and can be added to the objects array
                for($t = 0 ; $t < count($deWerkzaamheden) ; $t++){
                    $str = $deWerkzaamheden[$t];
                    $klant->setWerkzaamheden($str);
                }

                ?>
                <form name="klant aanmaken" method="post" action="updateKlant.php">
    <label><h3>Pas hier eventueel gegevens aan</h3></label>
    <input type="radio" name="klantId" value="<?php echo $klant->klantId  ?>" checked><br>
    <label>Voornaam klant: </label>
    <input name="voornaam" type="text" value="<?php echo $klant->voornaam; ?>"><br>
    <label>Achternaam klant: </label>
    <input name="achternaam" type="text" value="<?php echo $klant->achternaam; ?>"><br>
    <label>E-mail klant: </label>
    <input name="mail" type="text" value="<?php echo $klant->email; ?>"><br>
    <label>Telefoon nummer: </label>
    <input name="telefoon" type="text" value="<?php echo $klant->telefoon; ?>"><br>
    <label>Kenteken:* </label>
    <input name="kenteken" type="text" value="<?php echo $klant->kenteken; ?>"><br>
    <label>Bijbehoorende factuur: </label>
    <input name="factuurnr" type="text" value="<?php echo $klant->factuur; ?>"><br>
    <label>Merk: </label>
    <input name="merk" type="text" value="<?php echo $klant->merk; ?>"><br>
    <label>Type: </label>
    <input name="type" type="text" value="<?php echo $klant->type; ?>"><br>
    <label>Verrichte werkzaamheden: <?php

        $array = $klant->werkzaamheden;
        for($i = 0 ; $i<count($array) ; $i++){
            echo  $array[$i] . "<br>";
        }
        ?> </label><br>
     <label>Werkzaamheden toevoegen: </label><br>
    <textarea name="extrawerkzaamheden" rows="5" cols="50" ></textarea><br>
    <label>*Vergeet niet de "-" toe te voegen!!</label><br>
    <input type="submit" name="update" value="Update gegevens">
</form>

                <?php
            }
        }
        ?>

   <br> <a href="index.php"><-- Terug naar home</a>

<?php

    }

    ?>