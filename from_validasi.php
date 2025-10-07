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
        <span id="nama-error" style="color: red;"></span><br><br>
        
        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <span id="email-error" style="color: red;"></span><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <span id="password-error" style="color: red;"></span><br><br>
        
        <input type="submit" value="Submit">
    </form>
    
    <div id="server-response" style="margin-top: 20px; padding: 10px; border: 1px solid #ccc;">
        Hasil Server akan muncul di sini.
    </div>

    <script>
        $(document).ready(function() {
            $("#myForm").submit(function(event) {
                event.preventDefault(); // Mencegah pengiriman form biasa
                
                // --- Ambil Nilai Input ---
                var nama = $("#nama").val();
                var email = $("#email").val();
                var password = $("#password").val(); // Ambil nilai password
                var valid = true;
                
                // --- Reset Pesan Error Klien ---
                $("#nama-error").text("");
                $("#email-error").text("");
                $("#password-error").text(""); 
                $("#server-response").empty(); // Kosongkan respons server sebelumnya
                
                // 1. Validasi Nama
                if (nama === "") {
                    $("#nama-error").text("Nama harus diisi.");
                    valid = false;
                }
                
                // 2. Validasi Email
                if (email === "") {
                    $("#email-error").text("Email harus diisi.");
                    valid = false;
                }
                
                // 3. VALIDASI PASSWORD (Minimal 8 Karakter)
                if (password === "") {
                    $("#password-error").text("Password harus diisi.");
                    valid = false;
                } else if (password.length < 8) {
                    $("#password-error").text("Password minimal 8 karakter.");
                    valid = false;
                }

                // --- Pemrosesan AJAX ---
                if (valid) {
                    var formData = $(this).serialize(); // Mengumpulkan semua data form
                    
                    $.ajax({
                        url: "proses_validasi.php", // File PHP endpoint
                        type: "POST",
                        data: formData,
                        success: function(response) {
                            // Tampilkan hasil (error atau sukses) dari server
                            $("#server-response").html(response);
                        },
                        error: function() {
                            $("#server-response").html("<span style='color: red;'>Terjadi kesalahan saat menghubungi server.</span>");
                        }
                    });
                } else {
                    $("#server-response").html("<span style='color: orange;'>Mohon periksa kembali input Anda.</span>");
                }
            });
        });
    </script>
</body>
</html>