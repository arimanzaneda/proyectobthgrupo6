<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $asu=$_POST['asuntito'];
    $jorge=$_POST['come'];
    $archivo= fopen('punto.txt','a');
    fwrite($archivo,$asu .PHP_EOL);
    fwrite($archivo,$jorge .PHP_EOL);
    echo"<a href='archivo3.php'>ir a comentario</a>";
    ?>
</body>
</html>