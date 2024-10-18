<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encrypt Angka 1-50 ke Alfabet</title>
</head>
<body>
    <h2>Masukkan angka dari 1 sampai 50 yang ingin dienkripsi (dipisahkan dengan spasi):</h2>
    <form method="POST" action="">
        <input type="text" id="numberinput" name="numberinput" required placeholder="Contoh: 1 2 3">
        <br><br>
        <input type="submit" value="Proses">
    </form>

    <?php
    // Daftar angka dari 1 sampai 50
    $numbers = [
        1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 
        11, 12, 13, 14, 15, 16, 17, 18, 19, 20,
        21, 22, 23, 24, 25, 26, 27, 28, 29, 30,
        31, 32, 33, 34, 35, 36, 37, 38, 39, 40,
        41, 42, 43, 44, 45, 46, 47, 48, 49, 50
    ];

    // Daftar huruf A-Z satu per satu
    $alphabet = [
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 
        'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
    ];

    // Fungsi untuk enkripsi angka menjadi alfabet
    function customEncrypt($input_numbers, $numbers, $alphabet) {
        // Enkripsi setiap angka ke huruf yang sesuai
        $encrypted = [];
        foreach ($input_numbers as $input_number) {
            if (in_array($input_number, $numbers)) {
                // Hitung indeks dalam alfabet (1-26 diulang kembali setelah 26)
                $index = ($input_number - 1) % 26;
                $encrypted[] = $alphabet[$index];
            } else {
                $encrypted[] = "?"; // Jika angka di luar jangkauan
            }
        }

        return implode(' ', $encrypted); // Gabungkan hasil enkripsi dengan spasi
    }

    // Fungsi untuk dekripsi alfabet kembali ke angka
    function customDecrypt($letters, $alphabet) {
        // Dekripsi setiap huruf kembali ke angka
        $decrypted = [];
        foreach ($letters as $letter) {
            $index = array_search($letter, $alphabet);
            if ($index !== false) {
                $decrypted[] = $index + 1; // Konversi indeks ke angka
            } else {
                $decrypted[] = "?"; // Jika karakter tidak valid
            }
        }

        return implode(' ', $decrypted); // Gabungkan hasil dekripsi dengan spasi
    }

    // Mengecek apakah form di-submit
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['numberinput'])) {
        // Ambil input dari form dan ubah menjadi array angka
        $input_text = $_POST['numberinput'];
        $input_numbers = explode(' ', trim($input_text)); // Pisahkan angka berdasarkan spasi

        echo "<h3>Hasil:</h3>";
        echo "Angka asli: " . htmlspecialchars($input_text) . "<br>";

        // Enkripsi angka ke huruf
        $encrypted_text = customEncrypt($input_numbers, $numbers, $alphabet);
        echo "Teks terenkripsi: " . htmlspecialchars($encrypted_text) . "<br>";

        // Dekripsi kembali ke angka
        $decrypted_letters = explode(' ', $encrypted_text); // Pisahkan huruf terenkripsi
        $decrypted_text = customDecrypt($decrypted_letters, $alphabet);
        echo "Angka setelah dekripsi: " . htmlspecialchars($decrypted_text) . "<br>";
    }
    ?>
</body>
</html>
