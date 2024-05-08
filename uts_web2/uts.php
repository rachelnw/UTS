<?php
session_start();

// Inisialisasi data klasemen jika belum ada dalam session
if (!isset($_SESSION['klasemen'])) {
    $_SESSION['klasemen'] = array(
        array(
            "Negara" => "Irak U-23",
            "P" => 0,
            "M" => 0,
            "S" => 0,
            "K" => 0,
            "Poin" => 0,
            "Operator" => "",
            "NIM" => ""
        ),
        array(
            "Negara" => "Arab Saudi U-23",
            "P" => 0,
            "M" => 0,
            "S" => 0,
            "K" => 0,
            "Poin" => 0,
            "Operator" => "",
            "NIM" => ""
        ),
        array(
            "Negara" => "Tajikistan U-23",
            "P" => 0,
            "M" => 0,
            "S" => 0,
            "K" => 0,
            "Poin" => 0,
            "Operator" => "",
            "NIM" => ""
        ),
        array(
            "Negara" => "Thailand U-23",
            "P" => 0,
            "M" => 0,
            "S" => 0,
            "K" => 0,
            "Poin" => 0,
            "Operator" => "",
            "NIM" => ""
        )
    );
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama_negara = $_POST['nama_negara'];
    $jumlah_pertandingan = $_POST['jumlah_pertandingan'];
    $jumlah_menang = $_POST['jumlah_menang'];
    $jumlah_seri = $_POST['jumlah_seri'];
    $jumlah_kalah = $_POST['jumlah_kalah'];
    $jumlah_poin = $_POST['jumlah_poin'];
    $nama_operator = $_POST['nama_operator'];
    $nim_mahasiswa = $_POST['nim_mahasiswa'];

    // Update data klasemen
    foreach ($_SESSION['klasemen'] as &$data) {
        if ($data['Negara'] == $nama_negara) {
            $data['P'] += $jumlah_pertandingan;
            $data['M'] += $jumlah_menang;
            $data['S'] += $jumlah_seri;
            $data['K'] += $jumlah_kalah;
            $data['Poin'] += $jumlah_poin;
            $data['Operator'] = $nama_operator;
            $data['NIM'] = $nim_mahasiswa;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piala Asia U-23 Qatar Group C</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: inline-block;
            width: 150px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 200px;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 style='text-align: center;'>Data Group C Piala Asia Qatar U-23</h2>
        <p style='text-align: center;'>Per <?php echo date("d F Y H:i:s"); ?></p>
        <p style='text-align: center;'>Rachel Nabila Wijaya/211011401064<?php echo isset($_SESSION['klasemen'][0]["Operator"]) ? $_SESSION['klasemen'][0]["Operator"] : ''; ?>/<?php echo isset($_SESSION['klasemen'][0]["NIM"]) ? $_SESSION['klasemen'][0]["NIM"] : ''; ?></p>

        <h2>Input Data Poin Klasemen Piala Asia U-23 Qatar Group C</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="nama_negara">Nama Negara:</label>
            <select name="nama_negara" id="nama_negara">
                <option value="Irak U-23">Irak U-23</option>
                <option value="Arab Saudi U-23">Arab Saudi U-23</option>
                <option value="Tajikistan U-23">Tajikistan U-23</option>
                <option value="Thailand U-23">Thailand U-23</option>
            </select><br>
            <label for="jumlah_pertandingan">Jumlah Pertandingan (P):</label>
            <input type="number" name="jumlah_pertandingan" id="jumlah_pertandingan" required><br>
            <label for="jumlah_menang">Jumlah Menang (M):</label>
            <input type="number" name="jumlah_menang" id="jumlah_menang" required><br>
            <label for="jumlah_seri">Jumlah Seri (S):</label>
            <input type="number" name="jumlah_seri" id="jumlah_seri" required><br>
            <label for="jumlah_kalah">Jumlah Kalah (K):</label>
            <input type="number" name="jumlah_kalah" id="jumlah_kalah" required><br>
            <label for="jumlah_poin">Jumlah Poin:</label>
            <input type="number" name="jumlah_poin" id="jumlah_poin" required><br>
            <label for="nama_operator">Nama Operator:</label>
            <input type="text" name="nama_operator" id="nama_operator" required><br>
            <label for="nim_mahasiswa">NIM Mahasiswa:</label>
            <input type="text" name="nim_mahasiswa" id="nim_mahasiswa" required><br>
            <input type="submit" value="Submit">
        </form>

        <h2>Data Klasemen Piala Asia U-23 Qatar Group C</h2>
        <table>
            <tr>
                <th>Negara</th>
                <th>P</th>
                <th>M</th>
                <th>S</th>
                <th>K</th>
                <th>Poin</th>
            </tr>
            <?php if (isset($_SESSION['klasemen']) && is_array($_SESSION['klasemen'])) : ?>
                <?php foreach ($_SESSION['klasemen'] as $data) : ?>
                    <tr>
                        <td><?php echo $data["Negara"]; ?></td>
                        <td><?php echo $data["P"]; ?></td>
                        <td><?php echo $data["M"]; ?></td>
                        <td><?php echo $data["S"]; ?></td>
                        <td><?php echo $data["K"]; ?></td>
                        <td><?php echo $data["Poin"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6">Tidak ada data klasemen</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
