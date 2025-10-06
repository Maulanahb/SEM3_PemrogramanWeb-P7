<!DOCTYPE html>
<html>
<head>
    <title>Contoh Form dengan PHP</title>
</head>
<body>
    <h2>Form Contoh</h2>
    <form method="post" action="">
        <label for="buah">Pilih Buah:</label>
        <select name="buah[]" id="buah" multiple>
            <option value="apel">Apel</option>
            <option value="jeruk">Jeruk</option>
            <option value="mangga">Mangga</option>
            <option value="pisang">Pisang</option>
        </select>

        <br><br>

        <label>Pilih Warna Favorit:</label><br>
        <input type="checkbox" name="warna[]" value="merah"> Merah<br>
        <input type="checkbox" name="warna[]" value="kuning"> Kuning<br>
        <input type="checkbox" name="warna[]" value="hijau"> Hijau<br>

        <br>
        <label>Pilih Jenis Kelamin:</label><br>
        <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki<br>
        <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan<br>

        <br>
        <input type="submit" value="Submit">
    </form>

    <hr>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selectedBuah = $_POST['buah'] ?? [];
        $selectedWarna = $_POST['warna'] ?? [];
        $selectedJenisKelamin = $_POST['jenis_kelamin'] ?? '';

        echo "Anda memilih buah: " . implode(", ", $selectedBuah) . "<br>";

        if (!empty($selectedWarna)) {
            echo "Warna favorit Anda: " . implode(", ", $selectedWarna) . "<br>";
        } else {
            echo "Anda tidak memilih warna favorit.<br>";
        }

        echo "Jenis kelamin Anda: " . $selectedJenisKelamin;
    }
    ?>
</body>
</html>
