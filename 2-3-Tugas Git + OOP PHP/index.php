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

    require_once 'Animal.php';
    require_once 'Ape.php';
    require_once 'Frog.php';

    $sheep = new Animal("shaun");
    echo "Name : " . $sheep->getName(); // "shaun"
    echo "Legs : " . $sheep->getLegs(); // 4
    echo "Cold Blooded : " . $sheep->getColdBlooded(); // "no"

    echo "<br>";

    $kodok = new Frog("buduk");
    echo "Name : " . $kodok->getName(); // "kera sakti"
    echo "Legs : " . $kodok->getLegs(); // 4
    echo "Cold Blooded : " . $kodok->getColdBlooded(); // false
    echo "Jump : " . $kodok->jump() ; // "hop hop"

    echo "<br>";

    $sungokong = new Ape("kera sakti");
    echo "Name : " . $sungokong->getName(); // "kera sakti"
    echo "Legs : " . $sungokong->getLegs(); // 4
    echo "Cold Blooded : " . $sungokong->getColdBlooded(); // false
    echo "Yell : " . $sungokong->yell(); // "Auooo"

    // NB: Boleh juga menggunakan method get (get_name(), get_legs(), get_cold_blooded())

?>
</body>
</html>