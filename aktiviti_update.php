<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("admin_menu.php");

	if (isset($_POST["submit"])) {
		$idaktiviti = $_POST["idaktiviti"];
		$namaaktiviti = $_POST["namaaktiviti"];
        $tempat = $_POST["tempat"];
		$tarikhmasa = $_POST["tarikhmasa"];
        $gambar = $idaktiviti.".jpg";
        $sementara = $_FILES["namafail"]["tmp_name"];
        move_uploaded_file($sementara, "imej/$gambar"); 

		$sql = "update aktiviti 
                set namaaktiviti = '$namaaktiviti', tempat= '$tempat', 
                tarikhmasa = '$tarikhmasa', gambar = '$gambar' 
                where idaktiviti = '$idaktiviti' ";
		$result = mysqli_query($sambungan, $sql);
		if ($result == true)  
            echo "<h4 class='ok'>MESEJ OUTPUT</h4>  
                  <div class='ok'>Berjaya Kemaskini</div>";
		else  
            echo "<h4 class='ralat'>MESEJ RALAT</h4>  
                  <div class='ralat'>$sql<br><br>".mysqli_error($sambungan)."</div>";
	}

    // idaktiviti daripada fail aktiviti_senarai.php pastikan anda
    // memilih aktiviti dari senarai dan jangan run terus.

	if (isset($_GET['idaktiviti']))
        $idaktiviti = $_GET['idaktiviti'];

	$sql = "select * from aktiviti where idaktiviti = '$idaktiviti' ";
	$result = mysqli_query($sambungan, $sql);
	while($aktiviti = mysqli_fetch_array($result)) {
		$tarikhmasa = $aktiviti['tarikhmasa'];
		$namaaktiviti = $aktiviti['namaaktiviti'];
        $tempat = $aktiviti['tempat'];
        $gambar = $aktiviti['gambar'];
	}
?>

<link rel="stylesheet" href="aaborang.css">
<link rel="stylesheet" href="aabutton.css">

<main>
    <h3 class="panjang">KEMASKINI AKTIVITI</h3>
    <form class="panjang" action="aktiviti_update.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>ID aktiviti</td>
                <td><input type="text" name="idaktiviti" value="<?php echo $idaktiviti; ?>"></td>
            </tr>
            <tr>
                <td>Nama aktiviti</td>
                <td><input type="text" name="namaaktiviti" value="<?php echo $namaaktiviti; ?>"></td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td><input type="text" name="tempat" value="<?php echo $tempat; ?>"></td>
            </tr>
            <tr>
                <td>Tarikh/Masa</td>
                <td><input type="datetime-local" name="tarikhmasa" value="<?php echo $tarikhmasa; ?>"></td>
            </tr>
            <tr>
                <td>Gambar 500x400</td>
                <td>
                   <input type="file" name="namafail" accept=".jpg">
                   <?php echo "<img width=100 src='imej/$gambar'>"; ?>
                </td>
            </tr>
        </table>
        <button class="update" type="submit" name="submit">Update</button>
    </form>
</main>

<?php
    include("footer.php");
?>