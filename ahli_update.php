<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("admin_menu.php");

	if (isset($_POST["submit"])) {
		$idahli = $_POST["idahli"];
		$namaahli = $_POST["namaahli"];
		$password = $_POST["password"];

		$sql = "update ahli 
                set namaahli = '$namaahli', password = '$password' 
                where idahli = '$idahli' ";
		$result = mysqli_query($sambungan, $sql);
		if ($result == true)  
            echo "<h4 class='ok'>MESEJ OUTPUT</h4>  
                  <div class='ok'>Berjaya Kemaskini</div>";	
		else   
            echo "<h4 class='ralat'>MESEJ RALAT</h4>  
                  <div class='ralat'>$sql<br><br>".mysqli_error($sambungan)."</div>";
         
	}

    // idahli daripada fail ahli_senarai.php pastikan anda
    // memilih ahli dari senarai dan jangan run terus.

	if (isset($_GET['idahli']))
        $idahli = $_GET['idahli'];

	$sql = "select * from ahli where idahli = '$idahli' ";
	$result = mysqli_query($sambungan, $sql);
	while($ahli = mysqli_fetch_array($result)) {
		$password = $ahli['password'];
		$namaahli = $ahli['namaahli'];
	}
?>

<link rel="stylesheet" href="aaborang.css">
<link rel="stylesheet" href="aabutton.css">

<main>
    <h3 class="panjang">KEMASKINI AHLI</h3>
    <form class="panjang" action="ahli_update.php" method="post">
        <table>
            <tr>
                <td>ID ahli</td>
                <td><input type="text" name="idahli" value="<?php echo $idahli; ?>"></td>
            </tr>
            <tr>
                <td>Nama ahli</td>
                <td><input type="text" name="namaahli" value="<?php echo $namaahli; ?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password" value="<?php echo $password; ?>"></td>
            </tr>
        </table>
        <button class="update" type="submit" name="submit">Update</button>
    </form>
</main>

<?php
    include("footer.php");
?>