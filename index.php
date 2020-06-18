<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman utama</title>
</head>

<body>
  <?php
  session_start();
  require_once "koneksi.php";

  $cari = (isset($_GET['cari'])) ? $_GET['cari'] : "";

  if ($cari == "") {
    $SQL = "SELECT * FROM tb_pegawai";
  } else {
    $SQL = "SELECT * FROM tb_pegawai WHERE kode_pegawai='" . $cari . "' OR nama LIKE '%" . $cari . "%'";
  }

  $result = $conn->query($SQL);
  ?>

  <h1>Data Pegawai</h1>
  <a href="add.php"><button>Tambah</button></a>
  <hr>
  <?php require_once "message.php"; ?>
  <form style="display: inline;" action="" method="get">
    <input type="text" name="cari" placeholder="Cari kode/nama">
    <input type="submit" value="Cari">
  </form>
  <a href="index.php"><button>Refresh</button></a>
  <table border="1">
    <tr>
      <th>KODE PEGAWAI</th>
      <th>NAMA</th>
      <th>JABATAN</th>
      <th>GAJI POKOK</th>
      <th>TRANPORTASI</th>
      <th>GAJI BERSIH</th>
      <th>ACTION</th>
    </tr>
    <?php while ($d = $result->fetch_assoc()) : ?>
      <tr>
        <td><?= $d['kode_pegawai'] ?></td>
        <td><?= $d['nama'] ?></td>
        <td><?= $d['jabatan'] ?></td>
        <td>Rp.<?= number_format($d['gaji_pokok'], 0, ',', '.') ?></td>
        <td>Rp.<?= number_format($d['transportasi'], 0, ',', '.') ?></td>
        <td>Rp.<?= number_format($d['gaji_bersih'], 0, ',', '.') ?></td>
        <td>
          <a href="update.php?kd=<?= $d['kode_pegawai'] ?>"><button>Update</button></a>
          <a href="delete.php?kd=<?= $d['kode_pegawai'] ?>" onclick="return confirm('Yakin akan dihapus?')"><button>Delete</button></a>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>

</html>