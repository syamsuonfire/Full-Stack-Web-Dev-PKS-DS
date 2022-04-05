<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal</title>
</head>
<body>
    <?php

    require_once 'Hewan.php';


    $elang = new Elang("Elang");
    echo "Name : " . $elang->nama ."<br>"; 
    echo "Darah : " . $elang->darah ."<br>"; 
    echo "Jumlah Kaki : " . $elang->jumlahKaki ."<br>"; 
    echo "Keahlian : " . $elang->keahlian ."<br>"; 
    echo "Attack Power : " . $elang->attackPower ."<br>"; 
    echo "Defence Power : " . $elang->defencePower ."<br>"; 

    echo "<br>";
    $harimau = new Harimau("Harimau");
    echo "Name : " . $harimau->nama ."<br>"; 
    echo "Darah : " . $harimau->darah ."<br>"; 
    echo "Jumlah Kaki : " . $harimau->jumlahKaki ."<br>"; 
    echo "Keahlian : " . $harimau->keahlian ."<br>"; 
    echo "Attack Power : " . $harimau->attackPower ."<br>"; 
    echo "Defence Power : " . $harimau->defencePower ."<br>"; 

?>
</body>
</html>