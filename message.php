<?php
$pesan = (isset($_SESSION['pesan'])) ? $_SESSION['pesan'] : "";

?>

<?php if ($pesan !== "") : ?>
  <fieldset><?= $pesan ?></fieldset>
<?php
  unset($_SESSION['pesan']);
endif;

?>