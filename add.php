<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Pegawai</title>
</head>

<body>
  <?php
  require_once "koneksi.php";
  require_once "helper.php";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode_pegawai = kode_pegawai($conn);
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $gajiPokok = hitung_gajiPokok($jabatan);
    $transportasi = hitung_transportasi($gajiPokok);
    $gajiBersih = hitung_gajiBersih($gajiPokok, $transportasi);

    $SQL = "INSERT INTO tb_pegawai (col_name) VALUES (val)";

    $col_name = "kode_pegawai,nama,jabatan,gaji_pokok,transportasi,gaji_bersih";
    $value = "'" . $kode_pegawai . "',";
    $value .= "'" . $nama . "',";
    $value .= "'" . $jabatan . "',";
    $value .= "'" . $gajiPokok . "',";
    $value .= "'" . $transportasi . "',";
    $value .= "'" . $gajiBersih . "'";

    $SQL = str_replace("col_name", $col_name, $SQL);
    $SQL = str_replace("val", $value, $SQL);
    echo  $SQL;
    $result = $conn->query($SQL);
    if ($result) {
      header("location:index.php");
    } else {
      echo "Data gagal disimpan";
    }
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