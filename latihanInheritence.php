<?php

class Kendaraan
{
  private $merk;
  private $harga;

  public function __construct($merk, $harga)
  {
    $this->merk = $merk;
    $this->harga = $harga;
  }

  public function getMerk()
  {
    return $this->merk;
  }

  public function getHarga()
  {
    return $this->harga;
  }
}

class Pesawat extends Kendaraan
{
  private $tinggiMaks;
  private $kecepatanMaks;

  public function __construct($merk, $harga, $tinggi, $kecepatan)
  {
    parent::__construct($merk, $harga);
    $this->tinggiMaks = $tinggi;
    $this->kecepatanMaks = $kecepatan;
  }

  public function getTinggiMaks()
  {
    return $this->tinggiMaks;
  }

  public function getKecepatanMaks()
  {
    return $this->kecepatanMaks;
  }

  public function hitungBiayaOperasional()
  {
    $hargaAsli = $this->getHarga() * 1000000;
    $biaya = 0;

    if ($this->tinggiMaks > 5000 && $this->kecepatanMaks > 800) {
      $biaya = 0.30 * $hargaAsli;
    } elseif ($this->tinggiMaks >= 3000 && $this->tinggiMaks <= 5000 && $this->kecepatanMaks >= 500 && $this->kecepatanMaks <= 800) {
      $biaya = 0.20 * $hargaAsli;
    } elseif ($this->tinggiMaks < 3000 && $this->kecepatanMaks < 500) {
      $biaya = 0.10 * $hargaAsli;
    } else {
      $biaya = 0.05 * $hargaAsli;
    }
    return $biaya;
  }
}

// ---- BAGIAN UTAMA ----

// 1. Membuat setiap objek satu per satu
$boeing737 = new Pesawat('Boeing 737', 2000, 7500, 650);
$boeing747 = new Pesawat('Boeing 747', 3500, 5800, 750);
$cassa = new Pesawat('Cassa', 750, 3500, 500);

// 2. Menampilkan output langsung untuk objek pertama
echo "Biaya operasional pesawat '" . $boeing737->getMerk() .
  "' dengan harga " . "Rp. " . number_format($boeing737->getHarga() * 1000000, 0, ',', '.') .
  " yang memiliki tinggi maksimum " . $boeing737->getTinggiMaks() .
  " feet dan kecepatan maksimum " . $boeing737->getKecepatanMaks() .
  " km/jam adalah " . "Rp. " . number_format($boeing737->hitungBiayaOperasional(), 0, ',', '.') .
  ".<br><br>";

// 3. Menampilkan output langsung untuk objek kedua
echo "Biaya operasional pesawat '" . $boeing747->getMerk() .
  "' dengan harga " . "Rp. " . number_format($boeing747->getHarga() * 1000000, 0, ',', '.') .
  " yang memiliki tinggi maksimum " . $boeing747->getTinggiMaks() .
  " feet dan kecepatan maksimum " . $boeing747->getKecepatanMaks() .
  " km/jam adalah " . "Rp. " . number_format($boeing747->hitungBiayaOperasional(), 0, ',', '.') .
  ".<br><br>";

// 4. Menampilkan output langsung untuk objek ketiga
echo "Biaya operasional pesawat '" . $cassa->getMerk() .
  "' dengan harga " . "Rp. " . number_format($cassa->getHarga() * 1000000, 0, ',', '.') .
  " yang memiliki tinggi maksimum " . $cassa->getTinggiMaks() .
  " feet dan kecepatan maksimum " . $cassa->getKecepatanMaks() .
  " km/jam adalah " . "Rp. " . number_format($cassa->hitungBiayaOperasional(), 0, ',', '.') .
  ".<br><br>";

?>