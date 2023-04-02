<!DOCTYPE html>
<html>

<head>
    <title>Daftar Karyawan</title>
</head>

<body>
    <?php
        error_reporting();
        include 'koneksi.php';
    ?>

    <h1 style="text-align:center;">Data Pegawai</h1>

    <table border='1' style="margin:auto;">
        <thead><tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Posisi</th>
            <th>Perusahaan</th>
            <th>Foto</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
        
        <?php
        $no=0;
        $result = mysqli_query($koneksi, "SELECT * FROM pegawai ORDER BY id_pegawai ASC;");
        while ($row = mysqli_fetch_array($result)) {
                $no++;
                echo "<tr>";
                echo "<td>" . $no . "</td>";
                echo "<td>" . $row['id_pegawai'] . "</td>";
                echo "<td>" . $row['Nama'] . "</td>";
                echo "<td>" . $row['posisi'] . "</td>";
                echo "<td>" . $row['perusahaan'] . "</td>";
                echo "<td> 
                <center><img src='foto/" . $row['foto'] . "' alt='Foto' width='70px' height='70px'>
                </center>
                </td>";
                echo "<td><a href='editPegawai.php?id=" . $row['id_pegawai'] . "'>Edit</a></td>";
                echo "<td><a href='hapusPegawai.php?id=" . $row['id_pegawai'] . "'>Hapus</a></td>";
                echo "</tr>";

                
                
            }

        mysqli_close($koneksi);
        ?>
    </table>

    <br>
    <center><a href="inputPegawai.php">Tambah Data</a>

</center>
</body>

</html>
