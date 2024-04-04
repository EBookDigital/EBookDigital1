<?php
    include("keselamatan.php");
    include("sambungan.php");
    include("admin_menu.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Title</title>
    <style>
        body {
            background-image: url('imej/night sky.png'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>

<main class='aktiviti'>
    <?php
        $sql = "select * from aktiviti";
        $result = mysqli_query($sambungan, $sql);
        while($aktiviti = mysqli_fetch_array($result)) {
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