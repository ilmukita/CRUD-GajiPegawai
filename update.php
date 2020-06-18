<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perbaharui data pegawai</title>
</head>

<body>
  <h1>Perbaharui data pegawai</h1>
  <a href="index.php"><button>Batal</button></a>
  <hr>
  <?php
  session_start();
  require_once "koneksi.php";
  require_once "helper.php";
  $kd = $_GET['kd'];

  $result = $conn->query("SELECT * FROM tb_pegawai WHERE kode_pegawai='" . $kd . "'");

  $dP = $result->fetch_assoc();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $gajiPokok = hitung_gajiPokok($jabatan);
    $transportasi = hitung_transportasi($gajiPokok);
    $gajiBersih = hitung_gajiBersih($gajiPokok, $transportasi);

    $SQL = "UPDATE tb_pegawai SET val  WHERE kode_pegawai='" . $kd . "'";

    $value = "kode_pegawai='" . $kd . "',";
    $value .= "nama='" . $nama . "',";
    $value .= "jabatan='" . $jabatan . "',";
    $value .= "gaji_pokok='" . $gajiPokok . "',";
    $value .= "transportasi='" . $transportasi . "',";
    $value .= "gaji_bersih='" . $gajiBersih . "'";

    $SQL = str_replace("val", $value, $SQL);
    echo  $SQL;
    $result = $conn->query($SQL);
    if ($result) {
      $_SESSION['pesan'] = "Data pegawai  berhasil diperbaharui";
      header("location:index.php");
    } else {
      echo "Data gagal diperbaharui";
    }
  }
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