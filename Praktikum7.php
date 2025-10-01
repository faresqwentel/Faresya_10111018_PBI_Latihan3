<?php

class Tabungan {
    private $saldo;

    public function __construct($saldoAwal) {
        $this->saldo = $saldoAwal;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function setor($jumlah) {
        $this->saldo = $this->saldo + $jumlah;
        echo "Berhasil menabung. Saldo baru: Rp" . $this->saldo . "\n";
    }

    public function tarik($jumlah) {
        if ($this->saldo < $jumlah) {
            echo "Gagal, saldo tidak cukup.\n";
        } else {
            $this->saldo = $this->saldo - $jumlah;
            echo "Berhasil menarik uang. Saldo baru: Rp" . $this->saldo . "\n";
        }
    }
}

class Siswa extends Tabungan {
    private $nis;
    private $nama;

    public function __construct($nis, $nama, $saldoAwal) {
        $this->nis = $nis;
        $this->nama = $nama;
        parent::__construct($saldoAwal);
    }
    
    public function getNIS() {
        return $this->nis;
    }

    public function getNama() {
        return $this->nama;
    }
}

$daftarSiswa = [
    '1001' => new Siswa('1001', 'Budi', 50000),
    '1002' => new Siswa('1002', 'Ani', 75000),
    '1003' => new Siswa('1003', 'Citra', 120000),
];

while (true) {
    echo "\n==============================\n";
    echo "PROGRAM TABUNGAN SEKOLAH\n";
    echo "==============================\n";

    foreach ($daftarSiswa as $siswa) {
        echo "NIS: " . $siswa->getNIS() . ", Nama: " . $siswa->getNama() . ", Saldo: Rp" . $siswa->getSaldo() . "\n";
    }
    
    echo "\nMENU:\n";
    echo "1. Setor Uang\n";
    echo "2. Tarik Uang\n";
    echo "3. Keluar\n";
    echo "Pilih: ";

    $pilihan = trim(fgets(STDIN));

    if ($pilihan == '1') {
        echo "Masukkan NIS: ";
        $nis = trim(fgets(STDIN));
        if (isset($daftarSiswa[$nis])) {
            echo "Masukkan jumlah setor: ";
            $jumlah = trim(fgets(STDIN));
            $daftarSiswa[$nis]->setor($jumlah);
        } else {
            echo "NIS tidak ditemukan.\n";
        }
    } else if ($pilihan == '2') {
        echo "Masukkan NIS: ";
        $nis = trim(fgets(STDIN));
        if (isset($daftarSiswa[$nis])) {
            echo "Masukkan jumlah tarik: ";
            $jumlah = trim(fgets(STDIN));
            $daftarSiswa[$nis]->tarik($jumlah);
        } else {
            echo "NIS tidak ditemukan.\n";
        }
    } else if ($pilihan == '3') {
        echo "Terima kasih!\n";
        break;
    } else {
        echo "Pilihan tidak ada.\n";
    }
}

?>