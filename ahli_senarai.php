<?php
    include("keselamatan.php");
    include("sambungan.php");
	include("admin_menu.php");
?>
<main>
    <link rel="stylesheet" href="aasenarai.css">

    <table class="ahli">
        <caption>SENARAI NAMA AHLI</caption>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Password</th>
            <th colspan="2">Tindakan</th>
        </tr>

        <?php
        $sql = "select * from ahli";
        $result = mysqli_query($sambungan, $sql);
        while($ahli = mysqli_fetch_array($result)) {
        $idahli = $ahli["idahli"];
        echo "<tr>  <td>$ahli[idahli]</td>
                    <td class='nama'>$ahli[namaahli]</td>
                    <td>$ahli[password]</td>
                    <td>
                        <a href='ahli_update.php?idahli=$idahli'>
                            <img src='imej/update.png'>
                        </a>
                    </td>
                    <td>
                        <a href='javascript:padam(\"$idahli\");'>
                            <img src='imej/delete.png'>
                        </a>
                    </td>
               </tr>";
        }
    ?>
    </table>

    <script>
        function padam(id) {
            if (confirm("Adakah anda ingin padam") == true) {
                window.location = "ahli_delete.php?idahli=" + id;
            }
        }
    </script>
</main>

<?php
    include("footer.php");
?>