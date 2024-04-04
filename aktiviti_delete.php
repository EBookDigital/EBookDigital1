<?php
    include("sambungan.php");
    include("admin_menu.php");

    $idaktiviti = $_GET["idaktiviti"];

    $sql = "delete from aktiviti where idaktiviti = '$idaktiviti' ";
    $result = mysqli_query($sambungan, $sql);	

    echo "<script>window.location='aktiviti_senarai.php'</script>";
?>