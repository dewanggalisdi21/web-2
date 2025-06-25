<!DOCTYPE html>
<html>
<head>
    <title>Form Nilai Siswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Form Nilai Siswa</h1>
    <form class="form-horizontal" 
    method="POST" action="nilai-siswa.php"> 
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input id="nama" name="nama" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="matkul">Mata Kuliah</label>
            <select id="matkul" name="matkul" class="form-control" required>
                <option value="DDP">Dasar-Dasar Pemograman</option>
                <option value="BD1">Basis Data 1</option>
                <option value="WEB1">Pemograman Web</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nilai_uts">Nilai UTS</label>
            <input id="nilai_uts" name="nilai_uts" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nilai_uas">Nilai UAS</label>
            <input id="nilai_uas" name="nilai_uas" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nilai_tugas">Nilai Tugas/Praktikum</label>
            <input id="nilai_tugas" name="nilai_tugas" type="text" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $matkul = $_POST['matkul'];
    $nilai_uts = $_POST['nilai_uts'];
    $nilai_uas = $_POST['nilai_uas'];
    $nilai_tugas = $_POST['nilai_tugas'];

    $total = ($nilai_uts * 0.3) + ($nilai_uas * 0.35) + ($nilai_tugas * 0.35);

    echo "<br><br>";
    echo "Nama: $nama<br>";
    echo "Mata Kuliah: $matkul<br>";
    echo "Nilai UTS: $nilai_uts<br>";
    echo "Nilai UAS: $nilai_uas<br>";
    echo "Nilai Tugas/Praktikum: $nilai_tugas<br>";
    echo "Nilai Total: $total<br>";

    if ($total > 55) {
        echo "Status: <b>LULUS</b>";
    } else {
        echo "Status: <b>TIDAK LULUS</b>";
    }
}
?>
</body>
</html>