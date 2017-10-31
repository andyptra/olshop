
<?php
date_default_timezone_set("asia/jakarta");
$seminggu= array("minggu","senin","selasa","rabu","kamis","jumat","sabtu");
$hari = date("w");
$hari_ini = $seminggu[$hari];

$tgl_sekarang= date ("ymd");
$jam_sekarang= date("H:i:s");
$tahun_sekarang = date("Y");

$bulan_sekarang= array(1=>"januar","februari","maret","appril","mei","juni","juli","agustus","september","oktober","november","desember");
?>

