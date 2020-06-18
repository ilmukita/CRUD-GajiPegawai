<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Pegawai</title>
</head>

<body>
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
  }
  ?>
  <h1>Tambah Pegawai</h1>
  <a href="index.php"><button>Batal</button></a>
  <hr>
  <form action="" method="POST">
    <table>
      <tr>
        <td>Nama pegawai</td>
        <td>
          <input type="text" name="nama">
        </td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td>
          <select name="jabatan">
            <option value="Manager">Manager</option>
            <option value="Asisten Manager">Asisten Manager</option>
            <option value="HRD">HRD</option>
            <option value="Staf Keuangan">Staf Keuanagan</option>
            <option value="karyawan">karyawan</option>
            <option value="Office Boy">Office Boy</option>
          </select>
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <input type="submit" value="Simpan">
          <input type="reset" value="Reset">
        </td>
      </tr>
    </table>
  </form>
</body>

</html>