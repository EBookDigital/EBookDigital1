<?php
    include("keselamatan.php");
    include("sambungan.php");

    $status = $_SESSION["status"];

    if ($status == "ahli") 
        include("ahli_menu.php");
    else if ($status == "admin")
        include("admin_menu.php");
?>

<link rel="stylesheet" href="aaborang.css">
<link rel="stylesheet" href="aabutton.css">

<main>
    <h3 class="panjang">CARIAN AKTIVITI</h3>
    <form class="panjang" action="aktiviti_maklumat.php" method="post">

        <table>
            <tr>
                <td>Aktiviti</td>
                <td>
                    <select name="idaktiviti">
                        <?php
                            $sql = "select * from aktiviti";
                            $data = mysqli_query($sambungan, $sql);
                            while($aktiviti = mysqli_fetch_array($data)){
                                echo "<option value='$aktiviti[idaktiviti]'>
                                $aktiviti[namaaktiviti]</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
           
        </table>
        <button class="cari" type="submit" name="submit">Cari</button>
    </form>
</main>

<?php
    include("footer.php");
?>