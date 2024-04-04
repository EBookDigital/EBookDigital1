<?php
    include("keselamatan.php");
    include("sambungan.php");
	include("admin_menu.php");
?>

<link rel="stylesheet" href="aasenarai.css">
<link rel="stylesheet" href="aabutton.css">


<main>
    <?php
       if (isset($_POST['submit'])) {
              
            // idaktiviti, idahli, pilih dari fail
            // kehadiran_pilih.php pastikan anda
            // telah membuat pilihan
            
            $idaktiviti = $_POST['idaktiviti'];
            $idahli = $_POST['idahli'];
            $pilih = $_POST['pilih'];
       
            if ($pilih == 1) {
                
                            
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
                    <h3 class='tajuk'>Senarai Nama Kehadiran Mengikut Aktiviti</h3>
                    <h3 class='laporan'>Aktiviti: $namaaktiviti<br>
                    Tempat : $tempat<br>
                    Tarikh : $tarikh  Masa : $masa</h3>
                     </div>";

                echo "<table class='senarai'>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Hadir</th>
                        </tr> ";
                
                 }
            
        else
            echo "<h3 style=text-align:center;margin-top:100px;color:red;>TIADA SENARAI LAPORAN BAGI AKTIVITI</h3>";
        
      
                $result = mysqli_query($sambungan, $sql);
                while($kehadiran = mysqli_fetch_array($result)) {
                  echo "<tr><td>$kehadiran[idahli]</td>
                            <td class='nama'>$kehadiran[namaahli]</td>
                            <td>";

                        if ($kehadiran['hadir'] == "ya") 
                            echo "<img src='imej/right.png'>";
                        else 
                            echo "<img src='imej/absent.png'>";

                   echo "</td></tr>";
                }
                echo "</table>";
       
                
                 }
        if ($pilih == 2) {
                $sql = "select * from kehadiran 
                        join aktiviti on kehadiran.idaktiviti = aktiviti.idaktiviti
                        join ahli on kehadiran.idahli = ahli.idahli
                        where kehadiran.idahli = '$idahli' ";
            
                $result = mysqli_query($sambungan, $sql);
                $kehadiran = mysqli_fetch_array($result);
             $bil_rekod = mysqli_num_rows($result);
           
           
                if ($bil_rekod >0) {

                $namaahli = $kehadiran["namaahli"];

                echo "<div class='laporan'>
                    <h3 class='tajuk'>Senarai Nama Kehadiran Mengikut Ahli</h3>
                    <h3 class='laporan'>Nama: $namaahli<br>
                     </div>";

                echo "<table class='senarai'>
                    <tr>
                        <th>ID</th>
                        <th>Aktiviti</th>
                        <th>Hadir</th>
                    </tr>";
                }
            else
                echo "<h3 style=text-align:center;margin-top:100px;color:red;>TIADA SENARAI LAPORAN BAGI AHLI</h3>";
            
            
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
               echo "</table>";
            }
       }
            
      
    ?>
    <center>
        <button class="cetak" onclick='window.print()'>Cetak</button>
    </center>
</main>

<?php
    include("footer.php");
?>