<?php
include 'koneksi.php';

if(isset($_GET['id'])){
    // Mendapatkan id pegawai dari URL
    $id = $_GET['id'];
    
    // Mengeksekusi query untuk mendapatkan data pegawai berdasarkan id
    $result = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai='$id'");
    while($row = mysqli_fetch_array($result)){
        $old_photo = $row['foto'];
        if ($old_photo != "") {
            // Menghapus foto pegawai
            unlink("foto/" . $old_photo);
        }
    }
    
    // Mengeksekusi query untuk menghapus data pegawai dari database
    $hapus = mysqli_query($koneksi, "DELETE FROM pegawai WHERE id_pegawai='$id'");
    if($hapus){
        // Jika berhasil dihapus, redirect ke halaman utama
        echo "<script>
        alert('Data Berhasil Dihapus');
        window.location.href='index.php';
        </script>";
    } else{
        // Jika gagal dihapus, tampilkan pesan error
        die("Data gagal dihapus." . mysqli_error($koneksi));
    }
} else{
    // Jika tidak ada id pegawai yang diberikan, redirect ke halaman utama
    header("Location: index.php");
}
?>
