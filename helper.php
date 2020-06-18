<?php

function kode_pegawai($conn)
{
  $newKode = "";
  $result = $conn->query("SELECT kode_pegawai FROM tb_pegawai ORDER BY kode_pegawai DESC LIMIT 1");
  if ($result->num_rows > 0) {
    $kode_pegawai = $result->fetch_assoc();
    $kode_pegawai = substr($kode_pegawai['kode_pegawai'], -3);
    $noUrut = $kode_pegawai + 1;
    $newKode = "PGW" . sprintf("%03s", $noUrut);
  } else {
    $newKode = "PGW001";
  }
  return $newKode;
}

function hitung_gajiPokok($jabatan)
{
  $gaji = 0;
  switch ($jabatan) {
    case 'Manager':
      $gaji = 6000000;
      break;
    case 'Asisten Manager':
      $gaji = 4500000;
      break;
    case 'HRD':
      $gaji = 4200000;
      break;
    case 'Staf Keuangan':
      $gaji = 3500000;
      break;
    case 'karyawan':
      $gaji = 3200000;
      break;
    case 'Office Boy':
      $gaji = 2500000;
      break;
    default:
      $gaji = 0;
      break;
  }
  return $gaji;
}

function hitung_transportasi($gajiPokok)
{
  return $gajiPokok * 0.1;
}

function hitung_gajiBersih($gajiPokok, $transportasi)
{
  return $gajiPokok + $transportasi;
}
