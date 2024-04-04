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
            
            if (isset($_POST["$ahli[idahli]"]))
                $hadir = "ya";
            else
                $hadir = "tidak";
            
            $sql = "update kehadiran 
                    set hadir = '$hadir'
                    where idahli = '$ahli[idahli]' and idaktiviti = '$idaktiviti' ";

		    $result_kehadiran = mysqli_query($sambungan, $sql);
            if ($result_kehadiran == true) 
                $berjaya = true;
            else
                $berjaya = false;
        }

        if ($berjaya == true) 
            echo "<h4 class='ok'>MESEJ OUTPUT</h4>
                  <div class='ok'>Berjaya sahkan</div>";
        else 
            echo "<h4 class='ralat'>MESEJ RALAT</h4>
                  <div class='ralat'>$sql<br><br>".mysqli_error($sambungan)."</div>";    
	}
?>

<link rel="stylesheet" href="aaborang.css">
<link rel="stylesheet" href="aabutton.css">

