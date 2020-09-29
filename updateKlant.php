<?php
// require 'Customer.php';
 include 'werkzaamhedenzoeken.php';

    if(isset($_POST['update'])) {
        $conn = mysqli_connect("localhost", "root", "root", "klantenbestand");
        if (!$conn) {
            die("er is iets fout gegaan!" . mysqli_connect_error());
        }
        $klantId = $_POST['klantId'];

        $sql = "SELECT * FROM customer WHERE klantId='$klantId' ";
        $result = $conn->query($sql);
        if($result){
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
        }else if(!$result){
            die("Er is iets fout gegaan! " . mysqli_error($conn));

        }


        $voornaam = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $mail = $_POST['mail'];
        $telefoon = $_POST['telefoon'];
        $kenteken = $_POST['kenteken'];
        $factuur = $_POST['factuurnr'];
        $merk = $_POST['merk'];
        $type = $_POST['type'];
        strtoupper($kenteken);

        if($voornaam !== $klant->voornaam){
            $sqlvoornaam = "UPDATE customer SET voornaam = '$voornaam' WHERE klantId= '$klantId'";
            $resultVoornaam = $conn->query($sqlvoornaam);
            if($resultVoornaam){
                echo "Voornaam gewijzigd <br>";
            }else if(!$resultVoornaam){
                die("Er is iets fout gegaan: " . mysqli_error($conn));
            }
        }

        if($achternaam !== $klant->achternaam){
            $sqlachternaam = "UPDATE customer SET achternaam = '$achternaam' WHERE klantId= $klantId";
            $resultachternaam = $conn->query($sqlachternaam);
            if($resultachternaam){
                echo "achternaam gewijzigd <br>";
            }else if(!$resultachternaam){
                die("Er is iets fout gegaan: " . mysqli_error($conn));
            }
        }

        if($mail !== $klant->email){
            $sqlmail = "UPDATE customer SET email = '$mail' WHERE klantId= $klantId";
            $resultmail = $conn->query($sqlmail);
            if($resultmail){
                echo "E-mail gewijzigd <br>";
            }else if(!$resultmail){
                die("Er is iets fout gegaan: " . mysqli_error($conn));
            }
        }

        if($telefoon !== $klant->telefoon){
            $sqltelefoon = "UPDATE customer SET telefoon = $telefoon WHERE klantId= $klantId";
            $resulttelefoon = $conn->query($sqltelefoon);
            if($resulttelefoon){
                echo "Telefoon nummer gewijzigd <br>";
            }else if(!$resulttelefoon){
                die("Er is iets fout gegaan: " . mysqli_error($conn));
            }
        }

        if($kenteken !== $klant->kenteken){
            $sqlkenteken = "UPDATE customer SET kenteken = '$kenteken' WHERE klantId= $klantId";
            $resultkenteken = $conn->query($sqlkenteken);
            if($resultkenteken){
                echo "Kenteken gewijzigd <br>";
            }else if(!$resultkenteken){
                die("Er is iets fout gegaan: " . mysqli_error($conn));
            }
        }

        if($factuur !== $klant->factuur){
            $sqlfactuur = "UPDATE customer SET factuurnr = $factuur WHERE klantId= $klantId";
            $resultfactuur = $conn->query($sqlfactuur);
            if($resultfactuur){
                echo "Factuur nummer gewijzigd <br>";
            }else if(!$resultfactuur){
                die("Er is iets fout gegaan: " . mysqli_error($conn));
            }
        }

        if($merk !== $klant->merk){
            $sqlmerk = "UPDATE customer SET merk = '$merk' WHERE klantId= $klantId";
            $resultmerk = $conn->query($sqlmerk);
            if($resultmerk){
                echo "Merk gewijzigd <br>";
            }else if(!$resultmerk){
                die("Er is iets fout gegaan: " . mysqli_error($conn));
            }
        }

        if($type !== $klant->type){
            $sqltype = "UPDATE customer SET type = '$type' WHERE klantId= $klantId";
            $resulttype = $conn->query($sqltype);
            if($resulttype){
                echo "Type gewijzigd <br>";
            }else if(!$resulttype){
                die("Er is iets fout gegaan: " . mysqli_error($conn));
            }
        }

        if (!empty($_POST['extrawerkzaamheden'])){
            $extraWerkzaamheden = date("d/m/y"). ": " . $_POST['extrawerkzaamheden'];
            $klant->setWerkzaamheden($extraWerkzaamheden);
            $nieuweWerkzaamheden = serialize($klant->werkzaamheden);
            $sqlWerkzaamheden = "UPDATE customer SET werkzaamheden = '$nieuweWerkzaamheden' WHERE klantId= $klantId";
            $resultWerkzaamheden = $conn->query($sqlWerkzaamheden);
            if($resultWerkzaamheden){
                echo "Werkzaamheden toegevoegd";
            }else if(!$resultWerkzaamheden){
                die("Er is iets fout gegaan: " . mysqli_error($conn));
            }
    }


    }

    ?>

<br> <a href="index.php"><-- Terug naar home</a>
