<?php
// buat class komputer
class komputer {
    // Properti private hanya bisa diakses di class ini
    private $jenis_processor = "Intel Core i7-4790 3.6Ghz";
    
    // Properti protected bisa diakses di class ini dan turunannya
    protected $jenis_RAM = "DDR 4";
    
    // Properti public bisa diakses dari mana saja
    public $jenis_VGA = "PCI Express";

    // Method public untuk mengakses properti private $jenis_processor
    public function tampilkan_processor() {
        return $this->jenis_processor;
    }
}

// buat class laptop sebagai turunan dari komputer
class laptop extends komputer {
    // Method ini bisa mengakses properti protected dari induknya ($jenis_RAM)
    public function display_ram() {
        return $this->jenis_RAM;
    }

    // Method ini memanggil method public dari induknya
    public function display_processor_from_parent() {
        return $this->tampilkan_processor();
    }
}

// buat objek dari class
$laptop = new laptop();

// Menjalankan method
echo "Jenis Processor: " . $laptop->display_processor_from_parent() . "<br />";
echo "Jenis RAM: " . $laptop->display_ram() . "<br />";
echo "Jenis VGA: " . $laptop->jenis_VGA . "<br />";

?>