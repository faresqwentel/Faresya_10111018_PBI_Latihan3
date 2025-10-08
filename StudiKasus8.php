<?php

/**
 * Mendefinisikan class exception khusus untuk menangani error validasi email.
 * Class ini merupakan turunan dari class Exception bawaan PHP.
 */
class EmailValidationException extends Exception
{
    /**
     * Fungsi untuk membuat format pesan error yang lebih detail.
     * Mengambil informasi file dan baris tempat error terjadi.
     */
    public function getCustomErrorMessage()
    {
        // Format pesan error sesuai dengan contoh output di studi kasus
        $errorMsg = "Error caught on line " . $this->getLine() . " in " . $this->getFile() . ": " . $this->getMessage();
        return $errorMsg;
    }
}

// Data email yang akan divalidasi, disimpan dalam sebuah array
$email_list = [
    'lab4a@polsub.ac.id',
    'lab4b@polsub.ac.id',
    'lab4c@polsub.ac.id',
    'lab4d@polsub.ac.id',
    'lab5a@polsub.ac.id',
    'lab5b@polsub.ac.id',
    'lab5c@polsub.ac.id',
    'someone@example...com' // Contoh email yang tidak valid
];

// Inisialisasi variabel untuk menghitung jumlah email
$lab4_count = 0;
$lab5_count = 0;
$invalid_count = 0;

// Melakukan perulangan untuk setiap email di dalam array
foreach ($email_list as $email) {
    try {
        // 1. Pengecekan format email menggunakan FILTER_VALIDATE_EMAIL
        $is_valid_format = filter_var($email, FILTER_VALIDATE_EMAIL) !== false;

        // 2. Pengecekan apakah email mengandung kata 'lab4' atau 'lab5'
        $contains_lab4 = strpos($email, 'lab4') !== false;
        $contains_lab5 = strpos($email, 'lab5') !== false;

        // Kondisi untuk melemparkan exception:
        // - Jika format email tidak valid, ATAU
        // - Jika email tidak mengandung 'lab4' dan juga tidak mengandung 'lab5'
        if (!$is_valid_format || (!$contains_lab4 && !$contains_lab5)) {
            $message = "<b>{$email}</b> tidak mengandung kata 'lab4/lab5' dan tidak valid is no valid E-Mail address";
            throw new EmailValidationException($message);
        }

        // Jika lolos dari pengecekan di atas, email dianggap valid sesuai kriteria
        if ($contains_lab4) {
            echo "{$email} mengandung kata 'lab4' dan E-mail valid<br>";
            $lab4_count++; // Tambah hitungan email lab 4
        } elseif ($contains_lab5) {
            echo "{$email} mengandung kata 'lab5' dan E-mail valid<br>";
            $lab5_count++; // Tambah hitungan email lab 5
        }
    } catch (EmailValidationException $e) {
        // Menangkap exception yang telah dilempar
        echo $e->getCustomErrorMessage() . "<br>";
        $invalid_count++; // Tambah hitungan email yang tidak valid
    }
}

// Menampilkan hasil akhir perhitungan
echo "<br>";
echo "Terdapat {$lab4_count} email lab 4 dan {$lab5_count} email lab 5<br>";
echo "Terdapat {$invalid_count} email bukan lab4/5<br>";

?>