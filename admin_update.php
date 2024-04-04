<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("admin_menu.php");

	if (isset($_POST["submit"])) {
		$idadmin = $_POST["idadmin"];
		$namaadmin = $_POST["namaadmin"];
		$password = $_POST["password"];

		$sql = "update admin 
                set namaadmin = '$namaadmin', password = '$password' 
                where idadmin = '$idadmin' ";
		$result = mysqli_query($sambungan, $sql);
		if ($result == true) 
            echo "<h4 class='ok'>MESEJ OUTPUT</h4>
                  <div class='ok'>Berjaya Kemaskini</div>";
		else 
            echo "<h4 class='ralat'>MESEJ RALAT</h4>
                  <div class='ralat'>$sql<br><br>".mysqli_error($sambungan)."</div>";
        
	}

    // idadmin daripada fail admin_senarai.php pastikan anda
    // memilih admin dari senarai dan jangan run terus.

	if (isset($_GET['idadmin']))
        $idadmin = $_GET['idadmin'];

	$sql = "select * from admin where idadmin = '$idadmin' ";
	$result = mysqli_query($sambungan, $sql);
	while($admin = mysqli_fetch_array($result)) {
		$password = $admin['password'];
		$namaadmin = $admin['namaadmin'];
	}
?>

<link rel="stylesheet" href="aaborang.css">
<link rel="stylesheet" href="aabutton.css">

<main>
    <h3 class="panjang">KEMASKINI ADMIN</h3>
    <form class="panjang" action="admin_update.php" method="post">
        <table>
            <tr>
                <td>ID admin</td>
                <td><input type="text" name="idadmin" value="<?php echo $idadmin; ?>"></td>
            </tr>
            <tr>
                <td>Nama admin</td>
                <td><input type="text" name="namaadmin" value="<?php echo $namaadmin; ?>"></td>
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