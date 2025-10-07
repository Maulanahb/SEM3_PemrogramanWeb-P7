<!DOCTYPE html>
<html>
<head>
    <title>Contoh Form dengan PHP dan jQuery</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</head>
<body>
    <h2>Form Contoh</h2>
    <form id="myForm">
        <label for="buah">Pilih Buah:</label><br>
        <select name="buah" id="buah">
            <option value="apel">Apel</option>
            <option value="jeruk">Jeruk</option>
            <option value="mangga">Mangga</option>
            <option value="pisang">Pisang</option>
        </select>

        <br><br>

        <label>Pilih Warna Favorit:</label><br>
        <input type="checkbox" name="warna[]" value="merah"> Merah<br>
        <input type="checkbox" name="warna[]" value="biru"> Biru<br>
        <input type="checkbox" name="warna[]" value="hijau"> Hijau<br>

        <br>
        <label>Pilih Jenis Kelamin:</label><br>
        <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki<br>
        <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan<br>

        <br>
        <input type="submit" value="Submit">
    </form>

    <div id="hasil">
        <!-- Hasil akan ditampilkan di sini -->
    </div>

    <script>
        $(document).ready(function() {
            $("#myForm").submit(function(e) {
                e.preventDefault(); // Mencegah reload halaman

                var formData = $(this).serialize(); // Ambil data form

                $.ajax({
                    type: "POST",
                    url: "proses_lanjut.php",
                    data: formData,
                    success: function(response) {
                        $("#hasil").html(response); // Tampilkan hasil di bawah form
                    }
                });
            });
        });
    </script>
</body>
</html>
