<?php

class BangunRuang
{

  var $sisi;
  var $jariJari;
  var $tinggi;

  function setSisi($sisi)
  {
    $this->sisi = $sisi;
  }

  function getSisi()
  {
    return $this->sisi;
  }

  function setJariJari($jariJari)
  {
    $this->jariJari = $jariJari;
  }

  function getJariJari()
  {
    return $this->jariJari;
  }

  function setTinggi($tinggi)
  {
    $this->tinggi = $tinggi;
  }

  function getTinggi()
  {
    return $this->tinggi;
  }

  function hitungVolume()
  {
    return 0;
  }
}

class Bola extends BangunRuang
{
  function hitungVolume()
  {
    return (4 / 3) * 3.14 * pow($this->jariJari, 3);
  }
}

class Kerucut extends BangunRuang
{
  function hitungVolume()
  {
    return (1 / 3) * 3.14 * pow($this->jariJari, 2) * $this->tinggi;
  }
}

class LimasSegiEmpat extends BangunRuang
{
  function hitungVolume()
  {
    return (1 / 3) * pow($this->sisi, 2) * $this->tinggi;
  }
}

class Kubus extends BangunRuang
{
  function hitungVolume()
  {
    return pow($this->sisi, 3);
  }
}

class Tabung extends BangunRuang
{
  function hitungVolume()
  {
    return 3.14 * pow($this->jariJari, 2) * $this->tinggi;
  }
}

$semuaBangunRuang = [];

$bola = new Bola();
$bola->setJariJari(7);
$semuaBangunRuang['Bola'] = $bola;

$kerucut = new Kerucut();
$kerucut->setJariJari(14);
$kerucut->setTinggi(10);
$semuaBangunRuang['Kerucut'] = $kerucut;

$limas = new LimasSegiEmpat();
$limas->setSisi(8);
$limas->setTinggi(24);
$semuaBangunRuang['Limas Segi Empat'] = $limas;

$kubus = new Kubus();
$kubus->setSisi(30);
$semuaBangunRuang['Kubus'] = $kubus;

$tabung = new Tabung();
$tabung->setJariJari(7);
$tabung->setTinggi(10);
$semuaBangunRuang['Tabung'] = $tabung;

foreach ($semuaBangunRuang as $nama => $bangun) {
  echo "Jenis Bangun Ruang: " . $nama . "<br>";

  switch ($nama) {
    case 'Bola':
      echo "Sisi: 0<br>";
      echo "Jari-jari: " . $bangun->getJariJari() . "<br>";
      echo "Tinggi: 0<br>";
      break;
    case 'Kerucut':
      echo "Sisi: 0<br>";
      echo "Jari-jari: " . $bangun->getJariJari() . "<br>";
      echo "Tinggi: " . $bangun->getTinggi() . "<br>";
      break;
    case 'Limas Segi Empat':
      echo "Sisi: " . $bangun->getSisi() . "<br>";
      echo "Jari-jari: 0<br>";
      echo "Tinggi: " . $bangun->getTinggi() . "<br>";
      break;
    case 'Kubus':
      echo "Sisi: " . $bangun->getSisi() . "<br>";
      echo "Jari-jari: 0<br>";
      echo "Tinggi: 0<br>";
      break;
    case 'Tabung':
      echo "Sisi: 0<br>";
      echo "Jari-jari: " . $bangun->getJariJari() . "<br>";
      echo "Tinggi: " . $bangun->getTinggi() . "<br>";
      break;
  }

  echo "Volume: " . $bangun->hitungVolume() . "<br>";
  echo "----------------------------------------<br><br>";
}

?>