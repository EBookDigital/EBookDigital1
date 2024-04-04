<?php
    include("keselamatan.php");
    include("sambungan.php");

    $idaktiviti = $_GET["idaktiviti"];
    $idahli = $_GET["idahli"];

    $sql = "delete from kehadiran where idaktiviti = '$idaktiviti' and idahli = '$idahli' "; 
    $result = mysqli_query($sambungan, $sql);

    echo "<script>window.location='kehadiran_senarai.php?idaktiviti=$idaktiviti'</script>";
?>