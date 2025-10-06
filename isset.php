<?php
$umur ;
    if(isset($umur) && $umur >= 18){
        echo "anda sudah dewasa";
    }else{
        echo "anda belum dewasa atau variable umur belum dibuat";
    }

echo"<br>";

$data = array("nama"=> "jane","Usia"=> 25);
    if(isset($data["alamat"])){
        echo "Nama : " . $data['nama'];
    }else{
        echo "Variable 'nama' tidak ditemukan dalam array.";
    }
?>