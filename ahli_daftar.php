<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Ahli Ke Aktiviti</title>
    <link rel="stylesheet" href="aaborang.css">
    <link rel="stylesheet" href="aabutton.css">
    <style>
        body {
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5eZUMUR9zIR1egtOHwi43HCsU_eqFVsHiB1sS2G-g_A&s'); 
            width： 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <?php
        include("keselamatan.php");
        include("sambungan.php");
        include("ahli_menu.php");

        $idahli = $_SESSION["idpengguna"];
        $namaahli = $_SESSION["namapengguna"];

        if (isset($_POST["submit"])) {
            $idaktiviti = $_POST["idaktiviti"];
            
            $sql = "insert into kehadiran values('$idahli', '$idaktiviti', 'tidak')";
            $result = mysqli_query($sambungan, $sql);
            if ($result == true) 
                echo "<h4 class='ok'>MESEJ OUTPUT</h4>
                      <div class='ok'>Berjaya tambah</div>";
            else 
                echo "<h4 class='ralat'>MESEJ RALAT</h4>
                      <div class='ralat'>$sql<br><br>".mysqli_error($sambungan)."</div>";
        }
    ?>

    <main>
        <h3 class="panjang">TAMBAH AHLI KE AKTIVITI</h3>
        <form class="panjang" action="ahli_daftar.php" method="post">
            <table>
                <tr>
                    <td>ID Ahli</td>
                    <td><input type="text" name="idahli" value="<?php echo $idahli; ?>"></td>
                </tr>
                <tr>
                    <td>Nama Ahli</td>
                    <td><input type="text" name="namaahli" value="<?php echo $namaahli; ?>"></td>
                </tr>
                <tr>
                    <td>Nama Aktiviti</td>
                    <td>
                        <select name="idaktiviti">
                        <?php
                            $sql = " select * from aktiviti where idaktiviti 
                            NOT IN (SELECT idaktiviti FROM kehadiran WHERE idahli = '$idahli') ";
                            $data = mysqli_query($sambungan, $sql);
                            while($aktiviti = mysqli_fetch_array($data)){
                                echo "<option value='$aktiviti[idaktiviti]'>$aktiviti[namaaktiviti]</option>";
                            }
                        ?>
                        </select>
                    </td>
                </tr>
            </table>
            <button class="tambah" type="submit" name="submit">Tambah</button>
        </form>
    </main>

    <?php
        include("footer.php");
    ?>
</body>
</html>