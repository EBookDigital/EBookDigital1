<?php
    include("keselamatan.php");
    include("sambungan.php");
	include("admin_menu.php");
?>

<link rel="stylesheet" href="aasenarai.css">
<link rel="stylesheet" href="aabutton.css">

<main>
    <form action="kehadiran_update.php" method="post">
        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Hadir</th>
                <th>Tindakan</th>
            </tr>

            <?php
    
           if (isset($_GET['idaktiviti']))
                $idaktiviti = $_GET['idaktiviti'];

            echo "<input type='text' hidden name='idaktiviti' value='$idaktiviti'>";

            $sql = "select * from kehadiran 
                    join aktiviti on kehadiran.idaktiviti = aktiviti.idaktiviti
                    join ahli on kehadiran.idahli = ahli.idahli
                    where kehadiran.idaktiviti = '$idaktiviti' ";

            $result = mysqli_query($sambungan, $sql);
            $kehadiran = mysqli_fetch_array($result);
            $bil_rekod = mysqli_num_rows($result);
           
                if ($bil_rekod >0) {

            $tempat = $kehadiran["tempat"];
            $namaaktiviti = $kehadiran["namaaktiviti"];
            $tarikh = date_format(date_create($kehadiran['tarikhmasa']), 'd-m-Y');
            $masa = date_format(date_create($kehadiran['tarikhmasa']), 'h:i A');

            echo "<div class='laporan'>
                     <h3 class='tajuk'>MENGESAHKAN KEHADIRAN</h3>
                     <h3 class='laporan'>Aktiviti: $namaaktiviti<br>
                      Tempat : $tempat<br>
                      Tarikh : $tarikh  Masa : $masa</h3>
                 </div>";

            $result = mysqli_query($sambungan, $sql);
            
            while($kehadiran = mysqli_fetch_array($result)) {
              echo "<tr><td>$kehadiran[idahli]</td>
                        <td class='nama'>$kehadiran[namaahli]</td>
                        <td>";

                    if ($kehadiran['hadir'] == "ya") 
                        echo "<input type='checkbox' checked name='$kehadiran[idahli]'>";
                    else 
                        echo "<input type='checkbox' name='$kehadiran[idahli]'>";

               echo "</td>
                     <td>
                         <a href='kehadiran_delete.php?idaktiviti=$idaktiviti&&idahli=$kehadiran[idahli]'>
                            <img src='imej/delete.png'>
                         </a>
                      </td></tr>";
         }
                }
                    
            else 
                 echo "<h3 style=text-align:center;margin-top:100px;color:red;>TIADA SENARAI PELAJAR</h3>";
        ?>
        </table>
        <center><button class="update" type="submit" name="submit">Update</button></center>
    </form>
</main>

<?php
    include("footer.php");
?>