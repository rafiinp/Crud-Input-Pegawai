<?php
include 'koneksi.php';

// Mendapatkan data yang di-submit dari form
$id_pegawai = $_POST['id_pegawai'];
$nama = $_POST['nama'];
$posisi = $_POST['posisi'];
$perusahaan = $_POST['perusahaan'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

// Cek apakah ada foto yang diupload atau tidak
if ($foto != "") {
    // Direktori tempat foto disimpan
    $path = "foto/";

    // Menghapus foto yang lama
    $result = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai'");
    while($row = mysqli_fetch_array($result)){
        $old_photo = $row['foto'];
        if ($old_photo != "") {
            unlink($path . $old_photo);
        }
    }

    // Menyimpan foto yang baru
    $foto = uniqid() . '-' . $foto;
    move_uploaded_file($tmp, $path . $foto);
} else {
    // Jika foto tidak diupload, gunakan foto lama
    $result = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai'");
    while($row = mysqli_fetch_array($result)){
        $foto = $row['foto'];
    }
}

// Menyimpan data pegawai ke database
$hasil = mysqli_query($koneksi, "UPDATE pegawai SET nama='$nama', posisi='$posisi', perusahaan='$perusahaan', foto='$foto' WHERE id_pegawai='$id_pegawai'");

if (!$hasil){
    die ("Data Gagal Diubah".mysqli_errno($koneksi).mysqli_error($koneksi));
} else {
    echo "<script>alert('Data Berhasil Diubah');window.location.href='index.php'</script>";
}
?>
