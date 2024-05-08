<!DOCTYPE html>
<html>
<head>
    <title>Input Data Klasemen Piala Asia U-23 Group A</title>
</head>
<body>
    <h2>Input Data Klasemen Piala Asia U-23 Group A</h2>
    <form method="post" action="">
        <label for="country">Nama Negara:</label>
        <select name="country" id="country">
            <option value="Qatar U-23">Qatar U-23</option>
            <option value="Indonesia U-23">Indonesia U-23</option>
            <option value="Australia U-23">Australia U-23</option>
            <option value="Yordania U-23">Yordania U-23</option>
        </select><br><br>
        <label for="matches">Jumlah Pertandingan (P):</label>
        <input type="number" name="matches" id="matches"><br><br>
        <label for="wins">Jumlah Menang (M):</label>
        <input type="number" name="wins" id="wins"><br><br>
        <label for="draws">Jumlah Seri (S):</label>
        <input type="number" name="draws" id="draws"><br><br>
        <label for="losses">Jumlah Kalah (K):</label>
        <input type="number" name="losses" id="losses"><br><br>
        <label for="operator">Nama Operator:</label>
        <input type="text" name="operator" id="operator"><br><br>
        <label for="nim">NIM Mahasiswa:</label>
        <input type="text" name="nim" id="nim"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if(isset($_POST['submit'])) {
        // Set zona waktu ke Asia/Jakarta (WIB)
        date_default_timezone_set('Asia/Jakarta');
        
        $country = $_POST['country'];
        $matches = $_POST['matches'];
        $wins = $_POST['wins'];
        $draws = $_POST['draws'];
        $losses = $_POST['losses'];
        $operator = $_POST['operator'];
        $nim = $_POST['nim'];

        // Hitung jumlah poin
        $points = ($wins * 3) + ($draws * 1);

        // Format data
        $data = "A\n";
        $data .= "Data Group A Piala Asia Qatar U-23 Per " . date("d M Y H:i:s") . "\n";
        $data .= "Nama Operator/NIM: $operator/$nim\n\n";
        $data .= "Negara\t\tP\tM\tS\tK\tPoin\n";
        $data .= "1. $country\t$matches\t$wins\t$draws\t$losses\t$points\n";

        // Simpan data ke file
        file_put_contents('data.txt', $data, FILE_APPEND | LOCK_EX);

        // Tampilkan output
        echo "<h3>Data telah disimpan:</h3>";
        echo "<pre>$data</pre>";
    }
    ?>
</body>
</html>
