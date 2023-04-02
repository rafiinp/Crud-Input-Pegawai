<?php
        error_reporting();
        include 'koneksi.php';
        if(isset($_POST['simpan'])){

            $id_pegawai = $_POST['id_pegawai'];
            $nama = $_POST['nama'];
            $posisi = $_POST['posisi'];
            $perusahaan = $_POST['perusahaan'];
            $foto = $_FILES['foto']['name'];
            $tmp = $_FILES['foto']['tmp_name'];
            
            // Set path folder tempat menyimpan foto
            $path = "foto/".$foto;
        
            // Proses upload foto ke folder
            if(move_uploaded_file($tmp, $path)){
        
                // Query untuk menyimpan data ke database
                $query = "INSERT INTO pegawai (id_pegawai, Nama, posisi, perusahaan, foto) VALUES ('$id_pegawai','$nama','$posisi','$perusahaan','$foto')";
                $result = mysqli_query($koneksi, $query);
        
                // Cek apakah proses simpan data berhasil atau tidak
                if($result){
                    echo "<script>alert('Data berhasil disimpan!'); window.location = 'index.php';</script>";
                }else{
                    echo "<script>alert('Data gagal disimpan!'); window.location = 'InputPegawai.php';</script>";
                }
        
            }else{
                echo "<script>alert('Gagal upload foto!'); window.location = 'InputPegawai.php';</script>";
            }
        
        }
    ?>