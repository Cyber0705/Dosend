<?php 

require "functions.php";

// tambah data dokumen ke database
if (isset($_POST["submit"])) {
    $jenisDokumen = $_GET["jenis"];
    $judul = $_POST["judul"];
    $pengarang = $_POST["pengarang"];
    $tglTerbit = $_POST["tanggalTerbit"];
    $tempatTerbit = $_POST["tempatTerbit"];
    $file = upload();
    mysqli_query($conn, "INSERT INTO isi (jenisdokumen, judul, pengarang, tglterbit, tempatterbit, dokumen) VALUES ('$jenisDokumen', '$judul', '$pengarang', '$tglTerbit', '$tempatTerbit', '$file')");

    echo "<script>document.location.href = 'home.php';</script>";
}

function upload() {
    $namaFile = $_FILES["dokumen"]["name"];
    $error = $_FILES["dokumen"]["error"];
    $tmpName = $_FILES["dokumen"]["tmp_name"];

    if ($error == 4) {
        echo "<script>alert('Pilih file terlebih dahulu.');</script>";
        return false;
    }

    move_uploaded_file($tmpName, 'upload/' . $namaFile);

    return $namaFile;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="gmbr">
    <div class="dkmn">
        <h2>Pengisian Dokumen</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="formdok">
                <label for="judul">Judul Dokumen: </label>
                <input type="text" name="judul" id="judul">
            </div>
            <div class="formdok">
                <label for="Deskripsi">Deskripsi: </label>
                <input type="text" name="deskripsi" id="deskripsi">
            </div>
            <div class="formdok">
                <label for="pengarang">Pengarang: </label>
                <input type="text" name="pengarang" id="pengarang">
            </div>
            <div class="formdok">
                <label for="tanggalTerbit">Tanggal Terbit: </label>
                <input type="date" name="tanggalTerbit" id="tanggalTerbit">
            </div>
            <div class="formdok">
                <label for="tempatTerbit">Tempat Terbit: </label>
                <input type="text" name="tempatTerbit" id="tempatTerbit">
            </div>
            <div class="formdok">        
                <input type="file" name="dokumen" id="dokumen">
            </div>
            <div class="formdok">
                <!-- <input type="submit" name="submit" value="submit"> -->
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>