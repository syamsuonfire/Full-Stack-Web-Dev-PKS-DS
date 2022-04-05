
<?php

// Class Hewan
abstract class Hewan {

    public $nama;
    public $darah = 50;
    public $jumlahKaki;
    public $keahlian;


}
// Trait Fight
trait Fight {
    public $attackPower;
    public $defencePower;
}

// Child Class Elang
class Elang extends Hewan {
   use Fight;

    public function __construct($nama) {
    $this->nama = $nama;
    $this->attackPower = 10;
    $this->defencePower = 5;
  }

   public $jumlahKaki = 2;
   public $keahlian = "terbang tinggi";

}


// Child Class Harimau
class Harimau extends Hewan {
   use Fight;

    public function __construct($nama) {
    $this->nama = $nama;
    $this->attackPower = 7;
    $this->defencePower = 8;
  }

   public $jumlahKaki = 4;
   public $keahlian = "lari cepat";

}

  

