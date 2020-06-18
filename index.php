<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman utama</title>
</head>

<body>
  <?php
  require_once "koneksi.php";

  $SQL = "SELECT * FROM tb_pegawai";
  $result = $conn->query($SQL);
  ?>
  <h1>Data Pegawai</h1>
  <hr>
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
          <a href=""><button>Update</button></a>
          <a href=""><button>Delete</button></a>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>

</html>