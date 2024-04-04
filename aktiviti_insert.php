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
        $idadmin = $_POST["idadmin"];

		$sql = "insert into aktiviti values('$idaktiviti', '$namaaktiviti', '$tempat', 
                '$tarikhmasa', '$gambar', '$idadmin')";
        
		$result = mysqli_query($sambungan, $sql);
		if ($result == true)  
            echo "<h4 class='ok'>MESEJ OUTPUT</h4>  
                  <div class='ok'>Berjaya Tambah</div>";
		else  
            echo "<h4 class='ralat'>MESEJ RALAT</h4>  
                  <div class='ralat'>$sql<br><br>".mysqli_error($sambungan)."</div>";
	}
?>

<link rel="stylesheet" href="aaborang.css">
<link rel="stylesheet" href="aabutton.css">

<main>
    <h3 class="panjang">TAMBAH AKTIVITI</h3>
    <form class="panjang" action="aktiviti_insert.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>ID aktiviti</td>
                <td><input type="text" name="idaktiviti"></td>
            </tr>
            <tr>
                <td>Nama aktiviti</td>
                <td><input type="text" name="namaaktiviti"></td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td><input type="text" name="tempat"></td>
            </tr>
            <tr>
                <td>Tarikh/Masa</td>
                <td><input type="datetime-local" name="tarikhmasa"></td>
            </tr>
            <tr>
                <td>Gambar 500x400</td>
                <td><input type="file" name="namafail" accept=".jpg"></td>
            </tr>
            <tr>
                <td>Admin</td>
                <td>
                    <select name="idadmin">
                        <?php
                            $sql = "select * from admin";
                            $data = mysqli_query($sambungan, $sql);
                            while($admin = mysqli_fetch_array($data)){
                                echo "<option value='$admin[idadmin]'>$admin[namaadmin]</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
        </table>
        <button class="update" type="submit" name="submit">Tambah</button>
    </form>
</main>

<?php
    include("footer.php");
?>