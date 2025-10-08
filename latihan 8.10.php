<?php
// Definisikan Custom Exception Class
class customException extends Exception {
    public function errorMessage() {
        //error message
        $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
        .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
        return $errorMsg;
    }
}

// ----------------------------------------------------
// SKENARIO 1: EMAIL TIDAK VALID (Memicu Exception)
// ----------------------------------------------------
$email_invalid = "someone@example...com";

// Baris 1: Teks penjelasan sebelum validasi
echo "Email $email_invalid tidak valid<br>";

try {
    if(filter_var($email_invalid, FILTER_VALIDATE_EMAIL) === FALSE) {
        // Baris ini akan melempar customException
        throw new customException($email_invalid);
    }
}
catch (customException $e) {
    // Baris 2: Output dari exception (pesan error panjang)
    echo $e->errorMessage() . "<br>";
}


$email_valid = "mahasiswa@studeat.polsub.ac.id";

// Baris 3: Teks penjelasan sebelum validasi
echo "Email $email_valid valid ";

try {
    if(filter_var($email_valid, FILTER_VALIDATE_EMAIL) === FALSE) {
        // Kondisi ini FALSE, exception TIDAK dilempar
        throw new customException($email_valid);
    }
    // Jika valid, kode di dalam try setelah if ini akan dieksekusi
    echo "Email Address";
}
catch (customException $e) {
    // Blok ini dilewati karena tidak ada exception yang dilempar
}
?>