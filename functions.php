<?php 

$conn = mysqli_connect("localhost", "root", "", "dosend");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM isi WHERE id=$id");
    return mysqli_affected_rows($conn);
}

function ubah($data, $id) {
    global $conn;
    $judul = $data["judul"];
    $pengarang = $data["pengarang"];
    $tgl = $data["tglterbit"];
    $tempat = $data["tempatterbit"];

    $query = "UPDATE isi SET judul='$judul', pengarang='$pengarang', tglterbit='$tgl', tempatterbit='$tempat'  WHERE id=$id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

?>