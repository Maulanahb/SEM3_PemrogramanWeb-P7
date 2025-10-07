<!DOCTYPE html>
<html>
<head>
    <title>Form Input dengan Validasi (AJAX)</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
</head>
<body>
    <h1>Form Input dengan Validasi (AJAX)</h1>
    <form id="myForm" method="post" action="proses_validasi.php">
        <label for="nama">Nama: </label>
        <input type="text" id="nama" name="nama">
        <span id="nama-error" style="color: red;"></span><br>
        
        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <span id="email-error" style="color: red;"></span><br>
        
        <input type="submit" value="Submit">
    </form>
    
    <div id="server-response" style="margin-top: 15px; padding: 10px; border: 1px solid #ccc;">
        Hasil Server akan muncul di sini.
    </div>

    <script>
        $(document).ready(function() {
            $("#myForm").submit(function(event) {
                event.preventDefault(); // Mencegah pengiriman form biasa
                
                // --- Validasi Sisi Klien (Client-Side Validation) ---
                var nama = $("#nama").val();
                var email = $("#email").val();
                var valid = true; 
                
                $("#nama-error").text("");
                $("#email-error").text("");
                
                // 1. Validasi Nama
                if (nama === "") {
                    $("#nama-error").text("Nama harus diisi.");
                    valid = false;
                }
                
                // 2. Validasi Email (Hanya cek kosong)
                if (email === "") {
                    $("#email-error").text("Email harus diisi.");
                    valid = false;
                }
                
                // --- Pemrosesan AJAX (Hanya jika Validasi Klien Berhasil) ---
                if (valid) {
                    var formData = $(this).serialize(); // Mengumpulkan semua data form
                    
                    $.ajax({
                        url: "proses_validasi.php", // Ganti sesuai file PHP Anda
                        type: "POST",
                        data: formData,
                        success: function(response) {
                            // Tampilkan hasil (pesan error atau sukses) dari server
                            $("#server-response").html(response);
                        },
                        error: function() {
                            $("#server-response").html("<span style='color: red;'>Terjadi kesalahan pada server.</span>");
                        }
                    });
                } else {
                    $("#server-response").html("Validasi klien gagal, form tidak dikirim.");
                }
            });
        });
    </script>
</body>
</html>