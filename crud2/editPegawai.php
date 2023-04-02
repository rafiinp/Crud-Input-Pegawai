<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Pegawai</title>
</head>
<body>
<?php
    error_reporting();
    include 'koneksi.php';
    if(isset($_GET['id'])){
        // Mendapatkan id pegawai dari URL
    $id = $_GET['id'];
    
    // Mengeksekusi query untuk mendapatkan data pegawai berdasarkan id
    $result = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai='$id'");
    while($row = mysqli_fetch_array($result)){
        $id_pegawai = $row['id_pegawai'];
        $nama = $row['Nama'];
        $posisi = $row['posisi'];
        $perusahaan = $row['perusahaan'];
        $foto = $row['foto'];
    }
    } else{
        header("Location: index.php");
    }
?>
	<h1>Edit Data Pegawai</h1>
	<form action="prosesEditPegawai.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <fieldset>
        <legend>Data Pegawai</legend>
            <table>
            <tr>
            <td>	<label for="id_pegawai">ID Pegawai</label></td>
            <td>:</td>
            <td>	<input type="text" id="id_pegawai" name="id_pegawai" readonly value="<?php echo $id_pegawai;?>"></td>
        </tr>
            <tr>
            <td>		<label for="nama">Nama:</label></td>
            <td>:</td>
            <td>	<input type="text" id="nama" name="nama" required value="<?php echo $nama;?>"></td>
        </tr>
            
            <tr>
            <td>	<label for="perusahaan">Perusahaan</label></td>
            <td>:</td>
            <td>	<input type="text" id="perusahaan" name="perusahaan" required value="<?php echo $perusahaan;?>"></td>
        </tr>
            <tr>
            <td>	<label for="posisi">Posisi</label></td>
            <td>:</td>
            <td><select name="posisi" id="posisi">
                <option value="">---Pilih Posisi---</option>
                <option value="Teller" <?php if ($posisi=='Teller') echo 'selected="selected"';?>>Teller</option>
                <option value="Back Office" <?php if ($posisi=='Back Office') echo 'selected="selected"';?>>Back Office</option>
                <option value="Marketing" <?php if ($posisi=='Marketing') echo 'selected="selected"';?>>Marketing</option>
            </select></td>
        </tr>
            
            <tr>
            <td>	<label for="foto">Foto</label></td>
            <td>:</td>
            <td>	<input type="file" id="foto" name="foto"  value="<?php echo $foto;?>"></td>
        </tr>
            
            <tr>
            <td></td>
            <td></td>
            <td>	<input type="submit" id="edit" name="edit" value="Edit"required></td>
        </tr>

            </table>
        </fieldset>
</form>

</body>
</html>