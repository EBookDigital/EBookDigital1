<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("admin_menu.php");

	if (isset($_POST["submit"])) {
		$idaktiviti = $_POST["idaktiviti"];
        
        $sql = "select * from ahli";
        $result_ahli = mysqli_query($sambungan, $sql);
        $berjaya = false;
        
        while($ahli = mysqli_fetch_array($result_ahli)) {
            if (isset($_POST["$ahli[idahli]"])) {
                $idahli = $ahli['idahli'];
                $sql = "insert into kehadiran values('$idahli', '$idaktiviti', 'tidak') ";
                $result_kehadiran = mysqli_query($sambungan, $sql);
                if ($result_kehadiran == true) 
                    $berjaya = true;
                else
                    $berjaya = false;   
            }
        }
        if ($berjaya == true)  
            echo "<h4 class='ok'>MESEJ OUTPUT</h4>  
                  <div class='ok'>Berjaya tambah</div>";
        else  
            echo "<h4 class='ralat'>MESEJ RALAT</h4>  
                  <div class='ralat'>$sql<br><br>".mysqli_error($sambungan)."</div>";
	}
?>

<link rel="stylesheet" href="aaborang.css">