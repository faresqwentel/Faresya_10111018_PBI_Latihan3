<?php
class DiskonCalculator {
    private $kartu;
    private $total_belanja;
    private $diskon;
    private $total_bayar;

    function setKartu($x) {
        $this->kartu = $x;
    }

    function getKartu() {
        return $this->kartu;
    }

    function setTotalBelanja($y) {
        $this->total_belanja = $y;
    }

    function getTotalBelanja() {
        return $this->total_belanja;
    }

    function getDiskon() {
        return $this->diskon;
    }

    function getTotalBayar() {
        return $this->total_bayar;
    }

    function hitungDiskon() {
        $this->diskon = 0;
        if ($this->kartu == "ya") {
            if ($this->total_belanja > 500000) {
                $this->diskon = 50000;
            } elseif ($this->total_belanja > 100000) {
                $this->diskon = 15000;
            } else {
                $this->diskon = 0;
            }
        } elseif ($this->kartu == "tidak") {
            if ($this->total_belanja > 100000) {
                $this->diskon = 5000;
            } else {
                $this->diskon = 0;
            }
        } else {
            $this->diskon = 0;
        }
        $this->total_bayar = $this->total_belanja - $this->diskon;
    }

    function tampilkanHasil() {
        echo "Apakah ada kartu member: " . $this->kartu . "<br>";
        echo "Total belanja: " . number_format($this->total_belanja, 0, ',', '.') . "<br>";
        echo "Total Bayar: Rp " . number_format($this->total_bayar, 0, ',', '.') . "<br>";
    }
}

// Contoh penggunaan
$calculator = new DiskonCalculator();
$calculator->setKartu("ya");
$calculator->setTotalBelanja(334000);
$calculator->hitungDiskon();
$calculator->tampilkanHasil();
?>