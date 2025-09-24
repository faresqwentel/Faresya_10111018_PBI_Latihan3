<?php
    
class Belanja {
    public $namabarang;
    public $harga;
    public $jumlah;
    public $total;

    public function __destruct(){
        echo "Destructor : data belanja '$this->namabarang' dihapus";
    }
    public function __construct($namabarang, $harga, $jumlah){
        $this->namabarang = $namabarang;
        $this->harga = $harga;
        $this->jumlah = $jumlah;
        $this->total = $jumlah * $harga;
        echo "Constructor :  Data Belanja' $this->namabarang 'dibuat.\n";
    }
    public function getInfo(){
        return $this->namabarang. "(" . $this->harga . "x" . $this->jumlah . ") = " . $this->total;
    }
}

$mie = new Belanja("indomie", 2000, 100);
