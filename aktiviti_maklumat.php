<?php
    include("keselamatan.php");
    include("sambungan.php");

    $status = $_SESSION["status"];

    if ($status == "ahli") 
        include("ahli_menu.php");
    else if ($status == "admin")
        include("admin_menu.php");

	$idaktiviti = $_POST["idaktiviti"];

	$sql = "select * from aktiviti where idaktiviti = '$idaktiviti'";

	$result = mysqli_query($sambungan, $sql);
	while($aktiviti = mysqli_fetch_array($result)) {
            $tempat = $aktiviti["tempat"];
            $namaaktiviti = $aktiviti["namaaktiviti"];
            $tarikh = date_format(date_create($aktiviti['tarikhmasa']), 'd-m-Y');
            $masa = date_format(date_create($aktiviti['tarikhmasa']), 'h:i A');
            $gambar= $aktiviti["gambar"];
	}
?>

<link rel="stylesheet" href="aasenarai.css">
<link rel="stylesheet" href="aabutton.css">

<main>
    <table class="maklumat">
        <caption>MAKLUMAT AKTIVITI</caption>
        <tr>
            <th>Perkara</th>
            <th>Maklumat</th>
        </tr>
        <tr>
            <td class="maklumat">ID Aktiviti</td>
            <td class="maklumat"><?php echo $idaktiviti; ?></td>
        </tr>
        <tr>
            <td class="maklumat">Gambar</td>
            <td class="maklumat"><?php echo "<img width=300 src='imej/$gambar'>";?></td>
        </tr>
        <tr>
            <td class="maklumat">Nama</td>
            <td class="maklumat"><?php echo $namaaktiviti; ?></td>
        </tr>
        <tr>
            <td class="maklumat">Tempat</td>
            <td class="maklumat"><?php echo $tempat; ?></td>
        </tr>
        <tr>
            <td class="maklumat">Tarikh/Masa</td>
            <td class="maklumat"><?php echo "$tarikh, $masa"; ?></td>
        </tr>
    </table>
    <center><button class="cetak" onclick="window.print()">Cetak</button></center>
</main>

<?php
    include("footer.php");
?>