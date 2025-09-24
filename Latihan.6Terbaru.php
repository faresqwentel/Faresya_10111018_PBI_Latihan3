<?php
class Belanja {
public $namaBarang;
public $harga;
public $jumlah;
public $total;

public function __destruct () {
echo "Destructor : Data Belanja '$this->namaBarang' dihapus\n";
}

public function __construct ($namaBarang, $harga, $jumlah) {
$this->namaBarang = $namaBarang;
$this->harga = $harga;
$this->jumlah = $jumlah;
$this->total = $harga * $jumlah;
echo "Constructor : Data Belanja '$this->namaBarang' dibuat.\n";
}

public function getinfo() {
return $this->namaBarang . " (" . $this->harga . "x" . $this->jumlah . ") = " . $this->total;
}
}

echo "Masukkan jumlah barang belanja yang dibeli : ";
$jml = (int)trim(fgets(STDIN));

$barang = [];
$totalBelanja = 0;

for ($i = 1; $i <= $jml; $i++) {
echo "\nBarang ke-$i\n";
echo "Nama Barang : ";
$namaBarang = trim(fgets(STDIN));
echo "Harga Satuan : ";
$harga = (int)trim(fgets(STDIN));
echo "Jumlah : ";
$jumlah = (int)trim(fgets(STDIN));

$item = new Belanja($namaBarang, $harga, $jumlah);
$barang[] = $item;
$totalBelanja += $item->total;
}

echo "\n---------- Daftar Belanja ----------\n";
foreach ($barang as $item) {
echo $item->getinfo() . "\n";
}
echo "------------------------------------\n";
echo "Total Belanja adalah : " . $totalBelanja . "\n";
?>