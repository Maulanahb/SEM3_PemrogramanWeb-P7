<!DOCTYPE html>
<html>
<head>
    <title>Form Aman PHP</title>
</head>
<body>
    <h2>Form Input Aman PHP</h2>

    <?php
    // Inisialisasi variabel
    $nama = $email = "";
    $namaErr = $emailErr = "";

    // Mengecek apakah form disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // --- Validasi dan keamanan untuk input nama ---
        if (empty($_POST["nama"])) {
            $namaErr = "Nama harus diisi!";
        } else {
            $nama = $_POST["nama"];
            // Mengubah karakter berbahaya agar aman
            $nama = htmlspecialchars($nama, ENT_QUOTES, 'UTF-8');
        }

        // --- Validasi dan keamanan untuk input email ---
        if (empty($_POST["email"])) {
            $emailErr = "Email harus diisi!";
        } else {
            $email = $_POST["email"];
            // Mengubah karakter berbahaya
            $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

            // Cek format email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Format email tidak valid!";
            }
        }

        // Jika tidak ada error, tampilkan data aman
        if (empty($namaErr) && empty($emailErr)) {
            echo "<h3>Data Berhasil Disimpan!</h3>";
            echo "Nama: $nama <br>";
            echo "Email: $email <br>";
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="<?php echo $nama; ?>">
        <span style="color:grey;"><?php echo $namaErr; ?></span>
        <br><br>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="<?php echo $email; ?>">
        <span style="color:grey;"><?php echo $emailErr; ?></span>
        <br><br>

        <input type="submit" name="submit" value="Kirim">
    </form>
</body>
</html>


