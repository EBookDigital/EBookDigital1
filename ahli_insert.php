<?php
    include("keselamatan.php");
	include("sambungan.php");
	include("admin_menu.php");

	if (isset($_POST["submit"])) {
		$idahli = $_POST["idahli"];
		$password = $_POST["password"];
		$namaahli = $_POST["namaahli"];

		$sql = "insert into ahli values('$idahli', '$password', '$namaahli')";
		$result = mysqli_query($sambungan, $sql);
		if ($result == true) 
            echo "<h4 class='ok'>MESEJ OUTPUT</h4>
                  <div class='ok'>Berjaya tambah</div>";
		else 
            echo "<h4 class='ralat'>MESEJ RALAT</h4>  
                  <div class='ralat'>$sql<br><br>".mysqli_error($sambungan)."</div>";
        
	}
?>

<link rel="stylesheet" href="aaborang.css">
<link rel="stylesheet" href="aabutton.css">

<main>
    <h3 class="panjang">TAMBAH AHLI</h3>
    <form class="panjang" action="ahli_insert.php" method="post">
        <table>
            <tr>
                <td class="warna">ID ahli</td>
                <td><input required type="text" name="idahli" 
                    placeholder="cth: A065" pattern="[A-Z0-9]{4}" 
                    oninvalid="this.setCustomValidity('Sila masukkan 4 aksara')" 
                    oninput="this.setCustomValidity('')">
                </td>
            </tr>
            <tr>
                <td class="warna">Nama ahli</td>
                <td><input type="text" name="namaahli" placeholder="cth: Hajar"></td>
            </tr>
            <tr>
                <td class="warna">Password</td>
                <td><input type="text" name="password" placeholder="cth: 123"></td>
            </tr>
        </table>
        <button class="tambah" type="submit" name="submit">Tambah</button>
    </form>

    <br>
    <center>
        <button class="biru" onclick="tukar_warna(0)">Biru</button>
        <button class="hijau" onclick="tukar_warna(1)">Hijau</button>
        <button class="merah" onclick="tukar_warna(2)">Merah</button>
        <button class="hitam" onclick="tukar_warna(3)">Hitam</button>
    </center>

    <script>
        function tukar_warna(n) {
            var warna = ["Blue", "Green", "Red", "Black"];
            var teks = document.getElementsByClassName("warna");
            for (var i = 0; i < teks.length; i++)
                teks[i].style.color = warna[n];
        }

    </script>
</main>

<?php
   include("footer.php");
?>