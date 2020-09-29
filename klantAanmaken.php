<?php
require 'Customer.php';

?>
<head>
    <title>Klanten | Aanmaken</title>

</head>
<?php
if(isset($_POST['submit'])) {

    $conn = mysqli_connect("localhost", "root", "root", "klantenbestand");
    if (!$conn) {
        die("er is iets fout gegaan!" . mysqli_connect_error());
    }

    $sqlRows = "SELECT * FROM customer;";
    $resultRows = $conn->query($sqlRows);
    $klantId = $resultRows->num_rows + 1;

    $werkzaamhedenDate = date("d/m/y") . ": " .  $_POST['werkzaamheden'];


    $customer = new Customer($klantId,$_POST['voornaam'], $_POST['achternaam'], $_POST['mail'], $_POST['telefoon'], strtoupper($_POST['kenteken']), $_POST['factuurnr'], $_POST['merk'], $_POST['type'], $werkzaamhedenDate);



//

        $blub = $customer->getWerkzaamheden();
    $werkzaamheden = serialize($blub);
    $sql = "INSERT INTO customer VALUES ($klantId, '$customer->voornaam', '$customer->achternaam', '$customer->email', $customer->telefoon, '$customer->kenteken' , '$werkzaamheden' , $customer->factuur, '$customer->merk', '$customer->type');";
    $result = $conn->query($sql);
    if($result) {

        echo "<h1>Klant toegevoegd</h1> ";
        echo $customer->toString();
        $array = $customer->getWerkzaamheden();
        for($i = 0 ; $i<count($customer->getWerkzaamheden()) ; $i++){
            echo  $array[$i] . "<br>";
        }
    }else{
        echo "Er is iets mis gegaan" . mysqli_error($conn);
    }

}









    ?>

    <a href="index.php"><-- Terug naar home</a>


