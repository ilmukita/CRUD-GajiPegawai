<?php
session_start();
require_once "koneksi.php";
$kd = $_GET['kd'];

$SQL = "DELETE FROM tb_pegawai WHERE kode_pegawai='" . $kd . "'";

$result = $conn->query($SQL);

if ($result) {
  $_SESSION['pesan'] = "Data pegawai berhasil dihapus";
  header("location:index.php");
} else {
  $_SESSION['pesan'] = "Data pegawai gagal dihapus";
  header("location:index.php");
}
