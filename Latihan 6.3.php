<?php
class KonversiSuhu
{
    private $celcius;

    public function __construct($suhu)
    {
        $this->celcius = $suhu;
    }

    public function keKelvin()
    {
        return $this->celcius + 273.15;
    }

    public function keFahrenheit()
    {
        return ($this->celcius * 9 / 5) + 32;
    }

    public function tampilkan()
    {
        echo "<h2>Konversi Suhu dari Celcius</h2>";
        echo "suhu dalam celcius = " . $this->celcius . " derajat<br>";
        echo "suhu dalam kelvin = " . $this->keKelvin() . " derajat<br>";
        echo "suhu dalam fahrenheit = " . $this->keFahrenheit() . " derajat<br>";
        echo "<br>Sekian konfersi suhu yang bisa dilakukan";
    }
}

// Mengambil nilai suhu dari parameter GET, defaultnya adalah 36
$suhuAwal = isset($_GET['suhu']) ? $_GET['suhu'] : 36;
$konversi = new KonversiSuhu($suhuAwal);
$konversi->tampilkan();
?>