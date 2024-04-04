<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("admin_menu.php");

    $idahli = $_GET["idahli"];

    $sql = "delete from ahli where idahli = '$idahli' ";
    $result = mysqli_query($sambungan, $sql);	

    echo "<script>window.location='ahli_senarai.php'</script>";
?>