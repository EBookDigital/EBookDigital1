<?php
    include("keselamatan.php");
    include("sambungan.php");
	include("ahli_menu.php");
?>

<link rel="stylesheet" href="aasenarai.css">
<link rel="stylesheet" href="aabutton.css">

<main>
    <table class="senarai">
        <caption>Senarai Aktiviti Yang DiHadiri</caption>
        <tr>
            <th>ID</th>
            <th>Aktiviti</th>
            <th>Hadir</th>
        </tr>

        <?php
    
        $idahli = $_SESSION["idpengguna"];
        $namaahli = $_SESSION["namapengguna"];
    
        $sql = "select * from kehadiran 
                join aktiviti on kehadiran.idaktiviti = aktiviti.idaktiviti
                join ahli on kehadiran.idahli = ahli.idahli
                where kehadiran.idahli = '$idahli' ";
        
        $result = mysqli_query($sambungan, $sql);
        while($kehadiran = mysqli_fetch_array($result)) {
          echo "<tr><td>$kehadiran[idaktiviti]</td>
                    <td class='nama'>$kehadiran[namaaktiviti]</td>
					<td>";
            
            if ($kehadiran['hadir'] == "ya") 
                echo "<img src='imej/right.png'>";
            else 
                echo "<img src='imej/absent.png'>";
                          
           echo "</td></tr>";
        }
    ?>
    
    </table>

    <center><button class="cetak" onclick='window.print()'>Cetak</button></center>
</main>

<?php
    include("footer.php");
?>