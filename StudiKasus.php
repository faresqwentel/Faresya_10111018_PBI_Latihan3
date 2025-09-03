<?php

class Kendaraan
{
    private $harga;
    private $bahanBakar;
    private $tahunPembuatan;
    private $platNomor;

    public function setHarga($harga)
    {
        $this->harga = $harga;
    }

    public function setBahanBakar($bahanBakar)
    {
        $this->bahanBakar = $bahanBakar;
    }

    public function setTahunPembuatan($tahun)
    {
        $this->tahunPembuatan = $tahun;
    }

    public function setPlatNomor($plat)
    {
        $this->platNomor = $plat;
    }

    public function getStatusHarga()
    {
        if ($this->harga > 50000000) {
            return "Mahal";
        } else {
            return "Murah";
        }
    }

    public function getStatusSubsidi()
    {
        if ($this->bahanBakar == "Premium" && $this->tahunPembuatan < 2005) {
            return "Mendapat Subsidi";
        } else {
            return "Tidak Mendapat Subsidi";
        }
    }

    public function getHargaBekas()
    {
        $hargaBekas = 0;
        if ($this->tahunPembuatan > 2005) {
            $hargaBekas = $this->harga * 0.80;
        } elseif ($this->tahunPembuatan >= 2000 && $this->tahunPembuatan <= 2005) {
            $hargaBekas = $this->harga * 0.70;
        } elseif ($this->tahunPembuatan < 2000) {
            $hargaBekas = $this->harga * 0.60;
        }
        return $hargaBekas;
    }

    public function getJumlahPajak()
    {
        if ($this->tahunPembuatan <= 2017) {
            return $this->harga * 0.025;
        } else {
            return 0;
        }
    }

    public function getHariOperasi()
    {
        if ($this->platNomor % 2 == 0) {
            return "Selasa,Kamis,Sabtu";
        } else {
            return "Senin,Rabu,Jumat,Minggu";
        }
    }
}

$mobilSaya = new Kendaraan();

$mobilSaya->setHarga(50000000);
$mobilSaya->setBahanBakar("Premium");
$mobilSaya->setTahunPembuatan(1999);
$mobilSaya->setPlatNomor(2024);

echo "Status Harga : " . $mobilSaya->getStatusHarga() . "<br>";
echo "Status BBM: " . $mobilSaya->getStatusSubsidi() . "<br>";
echo "Harga Bekas: " . $mobilSaya->getHargaBekas() . "<br>";
echo "Jumlah Pajak: " . $mobilSaya->getJumlahPajak() . "<br>";
echo "Hari Operasi: " . $mobilSaya->getHariOperasi() . "<br>";

?>