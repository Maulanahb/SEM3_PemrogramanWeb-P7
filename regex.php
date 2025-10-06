<?php
$pattern = '/[a-z]/';
$text = 'This is a Sample Text';
if (preg_match($pattern, $text)) {
    echo "Huruf kecil ditemukan.";
}else{
    echo "Tidak ada huruf kecil.";
}
echo"<br>";
$pattern = '/[0-9]+/';
$text = 'There are 123 apples.';
if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0];
}else{
    echo "Tidak ada angka.";
}
echo "<br>";
$pattern = "/apple/";
$replacement ='banana';
$text='I like apple pie';
$new_text = preg_replace($pattern, $replacement,$text);
echo $new_text;//output: i like banana pie

echo '<br>';
$pattern = '/go?d/'; // Cocokkan "gd" atau "god" (huruf 'o' muncul 0 atau 1 kali)
$text = 'good god gd.';
if (preg_match($pattern, $text, $matches)) {
    echo "Cocokkan: " . $matches[0];
} else {
    echo "Tidak ada yang cocok!";
}
?>