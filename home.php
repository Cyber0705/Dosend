<?php 

require "functions.php";

$dokumen = query("SELECT * FROM isi");

if (isset($_POST["submit"])) {
    $jenis = $_POST["jenis"];
    mysqli_query($conn, "INSERT INTO jenis (jenisDokumen) VALUES ('$jenis')");
}

$jenisDokumen = query("SELECT * FROM jenis");

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
<body>
    <div class="navbar">
        <div class="left-navbar">
            <!--<h1 class="header">DoSend</h1>-->
            <img src="LogoDosend.png" alt="" width="75">
        </div>
        <div class="right-navbar">
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">Jenis</button>
                <div id="myDropdown" class="dropdown-content">
                    <div class="kontainer">
                        <form action="" method="post">
                            <input type="text" name="jenis" id="jenis" placeholder="Tambah Jenis Dokumen">
                            <input type="submit" value="Tambah" name="submit">
                        </form>
                    </div>
                    <?php foreach ($jenisDokumen as $row): ?>
                        <a href="isiBuku.php?jenis=<?= strtolower($row["jenisDokumen"]); ?>"><?= ucfirst($row["jenisDokumen"]); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <span>Dokumen</span>
            <p>(<?= count($dokumen) ; ?>)</p>
        </div>
    </div>

    <!-- <div class="kontainer">
        <form action="" method="post">
            <input type="text" name="jenis" id="jenis" placeholder="Tambah Jenis Dokumen">
            <input type="submit" value="Tambah" name="submit">
        </form>
    </div> -->

    <div class="dokumen">
        <table border="1">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Jenis</th>
                    <th>Pengarang</th>
                    <th>Tanggal Terbit</th>
                    <th>Tempat Terbit</th>
                    <th>File</th>
                    <th colspan="2">Edit</th>
                </tr>
            </thead>
            <?php foreach ($dokumen as $row): ?>
            <tbody>    
                <tr>
                    <td><?= $row["judul"]; ?></td>
                    <td><?= $row["jenisdokumen"]; ?></td>
                    <td><?= $row["pengarang"]; ?></td>
                    <td><?= $row["tglterbit"]; ?></td>
                    <td><?= $row["tempatterbit"]; ?></td>
                    <td><a href="#"><?= $row["dokumen"]; ?></a></td>
                    <td><a href="hapus.php?id=<?= $row["id"]; ?>">hapus</a></td>
                    <td><a href="edit.php?id=<?= $row["id"]; ?>">edit</a></td>
                </tr>
            </tbody>
            <?php endforeach; ?>
        </table>
    </div>
    <footer>
        <p>Copyright &copy; 2023</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>









