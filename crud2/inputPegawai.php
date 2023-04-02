<!DOCTYPE html>
<html>
<head>
	<title>Input Data Pegawai</title>
</head>
<body>
<?php
        error_reporting();
        include 'koneksi.php';
    ?>
	<h1>Input Data Pegawai</h1>
	<form action="prosesInputPegawai.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <fieldset>
        <legend>Data Pegawai</legend>
            <table>
            <tr>
            <td>	<label for="id_pegawai">ID Pegawai</label></td>
            <td>:</td>
            <td>	<input type="text" id="id_pegawai" name="id_pegawai" required></td>
        </tr>
            <tr>
            <td>		<label for="nama">Nama:</label></td>
            <td>:</td>
            <td>	<input type="text" id="nama" name="nama" required></td>
        </tr>
            
            <tr>
            <td>	<label for="perusahaan">Perusahaan</label></td>
            <td>:</td>
            <td>	<input type="text" id="perusahaan" name="perusahaan" required></td>
        </tr>
            <tr>
            <td>	<label for="posisi">Posisi</label></td>
            <td>:</td>
            <td><select name="posisi" id="posisi">
                <option value="">---Pilih Posisi---</option>
                <option value="Teller">Teller</option>
                <option value="Back Office">Back Office</option>
                <option value="Marketing">Marketing</option>
            </select></td>
        </tr>
            
            <tr>
            <td>	<label for="foto">Foto</label></td>
            <td>:</td>
            <td>	<input type="file" id="foto" name="foto" required></td>
        </tr>
            
            <tr>
            <td></td>
            <td></td>
            <td>	<input type="submit" id="simpan" name="simpan" value="Simpan"required></td>
        </tr>

            </table>
        </fieldset>
</form>

</body>
</html>