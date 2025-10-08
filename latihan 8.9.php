<?php
// Kelas custom exception yang merupakan turunan dari kelas Exception bawaan PHP
class customException extends Exception {
  // Fungsi untuk menampilkan pesan error yang lebih informatif
  public function errorMessage() {
    //error message
    $errorMsg = 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
      . ': <b>' . $this->getMessage() . '</b> is not a valid E-Mail address';
    return $errorMsg;
  }
}

// 1. Tes dengan email yang tidak valid
$email_invalid = "someone@example...com";

try {
  // Memeriksa apakah format email tidak valid menggunakan filter_var
  if (filter_var($email_invalid, FILTER_VALIDATE_EMAIL) === FALSE) {
    // Jika tidak valid, lemparkan custom exception
    throw new customException($email_invalid);
  }
} catch (customException $e) {
  // Menangkap exception dan menampilkan pesan error dari method errorMessage()
  echo $e->errorMessage();
  echo "<br>"; // Tambahan untuk baris baru
}

// 2. Tes dengan email yang valid
$email_valid = "mahasiswa@student.polsub.ac.id";

try {
  // Memeriksa apakah format email valid
  if (filter_var($email_valid, FILTER_VALIDATE_EMAIL) === FALSE) {
    // Baris ini tidak akan dieksekusi karena emailnya valid
    throw new customException($email_valid);
  } else {
    // Jika valid, tampilkan pesan sukses
    echo "Email " . $email_valid . " valid Email Address";
  }
} catch (customException $e) {
  // Baris ini tidak akan dieksekusi karena tidak ada exception yang dilempar
  echo $e->errorMessage();
}
?>