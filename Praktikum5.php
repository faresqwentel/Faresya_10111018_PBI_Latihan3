<?php
// Parent Class
class Employee
{
  protected $nama;
  protected $gaji;
  protected $lamaKerja;

  public function __construct($nama, $gaji, $lamaKerja)
  {
    $this->nama = $nama;
    $this->gaji = $gaji;
    $this->lamaKerja = $lamaKerja;
  }

  public function hitungGaji()
  {
    return $this->gaji; // default tidak ada bonus
  }

  public function getInfo()
  {
    return "Nama: {$this->nama}, Gaji: " . $this->hitungGaji();
  }
}

// Class Programmer
class Programmer extends Employee
{
  public function hitungGaji()
  {
    $bonus = 0;
    if ($this->lamaKerja >= 1 && $this->lamaKerja <= 10) {
      $bonus = 0.01 * $this->lamaKerja * $this->gaji;
    } elseif ($this->lamaKerja > 10) {
      $bonus = 0.02 * $this->lamaKerja * $this->gaji;
    }
    return $this->gaji + $bonus;
  }
}

// Class Direktur
class Direktur extends Employee
{
  public function hitungGaji()
  {
    $bonus = 0.5 * $this->lamaKerja * $this->gaji;
    $tunjangan = 0.1 * $this->lamaKerja * $this->gaji;
    return $this->gaji + $bonus + $tunjangan;
  }
}


class PegawaiMingguan extends Employee
{
  private $hargaBarang;
  private $stock;
  private $penjualan;

  public function __construct($nama, $gaji, $lamaKerja, $hargaBarang, $stock, $penjualan)
  {
    parent::__construct($nama, $gaji, $lamaKerja);
    $this->hargaBarang = $hargaBarang;
    $this->stock = $stock;
    $this->penjualan = $penjualan;
  }

  public function hitungGaji()
  {
    $bonus = 0;
    if ($this->penjualan > 0.7 * $this->stock) {
      $bonus = 0.1 * $this->hargaBarang * $this->penjualan;
    } else {
      $bonus = 0.03 * $this->hargaBarang * $this->penjualan;
    }
    return $this->gaji + $bonus;
  }
}


$prog = new Programmer("Budi", 5000000, 12);
echo $prog->getInfo() . PHP_EOL;

$dir = new Direktur("Andi", 10000000, 5);
echo $dir->getInfo() . PHP_EOL;

$peg = new PegawaiMingguan("Siti", 3000000, 2, 100000, 100, 80);
echo $peg->getInfo() . PHP_EOL;
