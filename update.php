<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perbaharui data pegawai</title>
</head>

<body>
  <h1>Perbaharui data pegawai</h1>
  <hr>
  <?php
  require_once "koneksi.php";
  require_once "helper.php";
  $kd = $_GET['kd'];

  $result = $conn->query("SELECT * FROM tb_pegawai WHERE kode_pegawai='" . $kd . "'");

  $dP = $result->fetch_assoc();

  ?>
  <form action="" method="POST">
    <table>
      <tr>
        <td>Kode pegawai</td>
        <td>
          <input type="text" readonly value="<?= $dP['kode_pegawai'] ?>">
        </td>
      </tr>
      <tr>
        <td>Nama pegawai</td>
        <td>
          <input type="text" name="nama" value="<?= $dP['nama'] ?>">
        </td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td>
          <select name="jabatan">
            <option <?= selected($dP['jabatan'], "Manager") ?> value="Manager">Manager</option>
            <option <?= selected($dP['jabatan'], "Asisten Manager") ?> value="Asisten Manager">Asisten Manager</option>
            <option <?= selected($dP['jabatan'], "HRD") ?> value="HRD">HRD</option>
            <option <?= selected($dP['jabatan'], "Staf Keuangan") ?> value="Staf Keuangan">Staf Keuanagan</option>
            <option <?= selected($dP['jabatan'], "karyawan") ?> value="karyawan">karyawan</option>
            <option <?= selected($dP['jabatan'], "Office Boy") ?> value="Office Boy">Office Boy</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Gaji pokok</td>
        <td>
          <input type="text" readonly value="<?= 'Rp.' . number_format($dP['gaji_pokok'], 0, ',', '.') ?>">
        </td>
      </tr>
      <tr>
        <td>Transportasi</td>
        <td>
          <input type="text" readonly value="<?= 'Rp.' . number_format($dP['transportasi'], 0, ',', '.') ?>">
        </td>
      </tr>
      <tr>
        <td>Gaji bersih</td>
        <td>
          <input type="text" readonly value="<?= 'Rp.' . number_format($dP['gaji_bersih'], 0, ',', '.') ?>">
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