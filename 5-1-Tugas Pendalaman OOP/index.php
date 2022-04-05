<?php
trait hewan
{
    public $nama,
        $darah = 50,
        $jumlahkaki,
        $keahlian;

    public function atraksi()
    {
        return "$this->nama sedang $this->keahlian";
    }
}

trait fight
{
    public $attackPower, $defensePower;

    public function serang($diserang)
    {
        return "$this->nama sedang menyerang $diserang";
    }

    public function diserang($attackPenyerang, $defenseDiserang)
    {
        $darah = $this->darah;

        $darahSekarang = $this->darah = $darah - ($attackPenyerang / $defenseDiserang);

        return "$this->nama sedang diserang. darah $this->nama sekarang adalah $darahSekarang";
    }
}


class elang
{
    use hewan, fight;

    public function __construct($nama)
    {
        $this->nama = $nama;
        $this->jumlahkaki = 2;
        $this->keahlian = 'terbang tinggi';
        $this->attackPower = 10;
        $this->defensePower = 5;
    }

    public function getInfoHewan()
    {
        return [
            $this->nama,
            $this->darah,
            $this->jumlahkaki,
            $this->keahlian,
            $this->attackPower,
            $this->defensePower,
        ];
    }
}


class harimau
{
    use hewan, fight;

    public function __construct($nama)
    {
        $this->nama = $nama;
        $this->jumlahkaki = 4;
        $this->keahlian = 'lari cepat';
        $this->attackPower = 7;
        $this->defensePower = 8;
    }

    public function getInfoHewan()
    {

        return [
            $this->nama,
            $this->darah,
            $this->jumlahkaki,
            $this->keahlian,
            $this->attackPower,
            $this->defensePower,
        ];
    }
}


echo "Profil Elang : <hr>";
$elang = new elang('Griff');
$getElang = $elang->getInfoHewan();
foreach ($getElang as $info) {
    echo "| $info | ";
}

echo "<br><br>";
echo "Profil Harimau : <hr>";
$harimau = new harimau('Spooky');
$getHarimau = $harimau->getInfoHewan();
foreach ($getHarimau as $info) {
    echo "| $info | ";
}
echo "<br><br>";

echo "Nama dan Keahlian : <hr>";
echo $elang->atraksi();
echo "<br>";
echo $harimau->atraksi();
echo "<br><br>";

echo "Fight : <hr>";

echo $elang->serang($harimau->nama);
echo "<br>";
echo $harimau->diserang($elang->attackPower, $harimau->defensePower);
echo "<br><br>";

echo "Info Hewan saat ini : <hr>";
$getElang = $elang->getInfoHewan();
foreach ($getElang as $info) {
    echo "| $info | ";
}

echo "<br>";

$getHarimau = $harimau->getInfoHewan();
foreach ($getHarimau as $info) {
    echo "| $info | ";
}
