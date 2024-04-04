<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("ahli_menu.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Dashboard</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link your existing CSS file -->
    <style>
        body {
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5eZUMUR9zIR1egtOHwi43HCsU_eqFVsHiB1sS2G-g_A&s');
            width： 100%; 
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>

<main class='aktiviti'>
    <?php
        $sql = "SELECT * FROM aktiviti";
        $result = mysqli_query($sambungan, $sql);
        while ($aktiviti = mysqli_fetch_array($result)) {
            echo "<figure>
                      <img class='home' src='imej/$aktiviti[gambar]'>
                      <figcaption>$aktiviti[namaaktiviti]</figcaption>
                  </figure>";
        }
    ?>
</main>

<?php include("footer.php"); ?>

</body>
</html>