<?php
class Karyawan {
private $nama;
private $golongan;
private $jamLembur;
private $gajiPokok;
private $gajiTotal;

// daftar gaji pokok per golongan
private $listGaji = [
"Ib" => 1250000, "Ic" => 1300000, "Id" => 1350000,
"IIa" => 2000000, "IIb" => 2100000, "IIc" => 2200000, "IId" => 2300000,
"IIIa" => 2400000, "IIIb" => 2500000, "IIIc" => 2600000, "IIId" => 2700000,
"IVa" => 2800000, "IVb" => 2900000, "IVc" => 3000000, "IVd" => 3100000
];

const LEMBUR = 15000; // per jam

// Constructor
public function __construct($nama, $golongan, $jamLembur) {
$this->nama = $nama;
$this->golongan = $golongan;
$this->jamLembur = $jamLembur;
$this->hitungGaji();
}

// Getter
public function getNama() {
return $this->nama;
}

public function getGolongan() {
return $this->golongan;
}

public function getJamLembur() {
return $this->jamLembur;
}

// Versi cara ke-2 (tanpa isset, pakai loop manual)
public function getGajiPokok() {
$gaji = 0; // default jika golongan tidak ditemukan
foreach ($this->listGaji as $gol => $nilai) {
if ($gol == $this->golongan) {
$gaji = $nilai;
break; // stop kalau sudah ketemu
}
}
return $gaji;
}

public function getTotalGaji() {
return $this->gajiTotal;
}

// Hitung gaji
private function hitungGaji() {
$this->gajiPokok = $this->getGajiPokok();
$this->gajiTotal = $this->gajiPokok + ($this->jamLembur * self::LEMBUR);
}

// Destructor
public function __destruct() {
echo "Object {$this->nama} dihapus\n";
}
}

// ================= MAIN ==================
$karyawanList = [];

echo "Masukkan jumlah karyawan: ";
$jumlah = (int) trim(fgets(STDIN));

for ($i = 0; $i < $jumlah; $i++) {
echo "\nData Karyawan ke-" . ($i+1) . "\n";
echo "Nama Karyawan : ";
$nama = trim(fgets(STDIN));

echo "Golongan (contoh: IIb, IIIc, IVb): ";
$golongan = trim(fgets(STDIN));

echo "Total Jam Lembur : ";
$jam = (int) trim(fgets(STDIN));

$karyawanList[] = new Karyawan($nama, $golongan, $jam);
}

// Tampilkan tabel
echo "\n==========================================================\n";
echo "Nama Karyawan Golongan Jam Lembur Total Gaji\n";
echo "==========================================================\n";

foreach ($karyawanList as $k) {
echo $k->getNama() . " " .
$k->getGolongan() . " " .
$k->getJamLembur() . " " .
"Rp " . number_format($k->getTotalGaji(), 0, ',', '.') . "\n";
}

echo "\n==========================================================\n";