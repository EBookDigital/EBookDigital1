<?php
    include("keselamatan.php");
    include("sambungan.php");
	include("admin_menu.php");
?>

<link rel="stylesheet" href="aaborang.css">
<link rel="stylesheet" href="aabutton.css">

<main>
<h3 class="pendek">PILIH JENIS LAPORAN</h3>

<form class="pendek" action="kehadiran_laporan.php" method="post">

    <select id='pilih' name='pilih' onchange='papar_pilihan()'>
        <option value=1>Senarai Mengikut Aktiviti</option>
        <option value=2>Senarai Mengikut Ahli</option>
    </select> <br>

    <div id="aktiviti" style="display:block">
        <select name="idaktiviti">
            <?php
                include('sambungan.php');
                $sql = "select * from aktiviti";
                $data = mysqli_query($sambungan, $sql);
                while ($aktiviti = mysqli_fetch_array($data)) {
                   echo "<option value='$aktiviti[idaktiviti]'>$aktiviti[namaaktiviti]</option>";
                }
            ?>
        </select>
    </div>

    <div id="ahli" style="display:none">
        <select name="idahli">
            <?php
                include('sambungan.php');
                $sql = "select * from ahli";
                $data = mysqli_query($sambungan, $sql);
                while ($ahli = mysqli_fetch_array($data)) {
                   echo "<option value='$ahli[idahli]'>$ahli[namaahli]</option>";
                }
            ?>
        </select>
    </div>

    <button class="papar" name="submit" type="submit">Papar</button>
</form>

<script>
    function papar_pilihan() {
        var pilih = document.getElementById("pilih").value;
        var paparaktiviti = 'none';
        var paparahli = 'none';
        
        if (pilih == 1) {
            paparaktiviti = 'block';
            paparahli = 'none';
        } 
        else if (pilih == 2) {
            paparaktiviti = 'none';
            paparahli = 'block';
        }
        document.getElementById('aktiviti').style.display = paparaktiviti;
        document.getElementById('ahli').style.display = paparahli;
    }
</script>
</main>
<?php
    include("footer.php");
?>