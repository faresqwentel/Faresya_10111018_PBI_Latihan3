<?php
//membuat class
class Kendaraan
{
    var $merek;
    var $jmlRoda;
    var $harga;
    var $warna;
    var $bhnBakar;
    var $tahun;

    function setMerek($x)
    {
        $this->merek = $x;
    }

    function setHarga($x)
    {
        $this->harga = $x;
    }

    function setJmlRoda($x)
    {
        $this->jmlRoda = $x;
    }

    function setWarna($x)
    {
        $this->warna = $x;
    }

    function setBhnBakar($x)
    {
        $this->bhnBakar = $x;
    }

    function setTahun($x)
    {
        $this->tahun = $x;
    }
}

$kendaraan1 = new Kendaraan();
$kendaraan1->setMerek('Toyota Yaris');
$kendaraan1->setJmlRoda(4);
$kendaraan1->setHarga(160000000);
$kendaraan1->setWarna("Merah");
$kendaraan1->setBhnBakar("Premium");
$kendaraan1->setTahun(2005);

$kendaraan2 = new Kendaraan();
$kendaraan2->setMerek('Honda Scoopy');
$kendaraan2->setJmlRoda(2);
$kendaraan2->setHarga(13000000);
$kendaraan2->setWarna("Putih");
$kendaraan2->setBhnBakar("Premium");
$kendaraan2->setTahun(2004);

$kendaraan3 = new Kendaraan();
$kendaraan3->setMerek('Isuzu Panther');
$kendaraan3->setJmlRoda(4);
$kendaraan3->setHarga(170000000);
$kendaraan3->setWarna("Hitam");
$kendaraan3->setBhnBakar("Solar");
$kendaraan3->setTahun(2003);


echo $kendaraan1->merek;
echo "<br>";
echo $kendaraan1->jmlRoda;
echo "<br>";
echo $kendaraan1->harga;
echo "<br>";
echo $kendaraan1->warna;
echo "<br>";
echo $kendaraan1->bhnBakar;
echo "<br>";
echo $kendaraan1->tahun;
echo "<br>";
echo "<br>"; // Pengganti <hr>

echo $kendaraan2->merek;
echo "<br>";
echo $kendaraan2->jmlRoda;
echo "<br>";
echo $kendaraan2->harga;
echo "<br>";
echo $kendaraan2->warna;
echo "<br>";
echo $kendaraan2->bhnBakar;
echo "<br>";
echo $kendaraan2->tahun;
echo "<br>";
echo "<br>"; // Pengganti <hr>

echo $kendaraan3->merek;
echo "<br>";
echo $kendaraan3->jmlRoda;
echo "<br>";
echo $kendaraan3->harga;
echo "<br>";
echo $kendaraan3->warna;
echo "<br>";
echo $kendaraan3->bhnBakar;
echo "<br>";
echo $kendaraan3->tahun;

?>