<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = $_POST["password"]; // Ambil nilai password
    $errors = array();

    // Validasi Nama (Tetap)
    if (empty($nama)) {
        $errors[] = "Nama harus diisi.";
    }

    // Validasi Email (Tetap)
    if (empty($email)) {
        $errors[] = "Email harus diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }

    // VALIDASI PASSWORD (BARU)
    if (empty($password)) {
        $errors[] = "Password harus diisi.";
    } elseif (strlen($password) < 8) { // Cek panjang karakter
        $errors[] = "Password minimal 8 karakter.";
    }
    
    // ... Bagian pemrosesan error/sukses selanjutnya ...

    if (!empty($errors)) {
        // Tampilkan error jika ada
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        // Data berhasil
        echo "Data berhasil dikirim: <br>Nama = $nama<br> Email = $email<br> Password telah diterima.";
    }
}
?>