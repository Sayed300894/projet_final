<?php
    $tirage = [];

    for ($num = 0; $num < 6; $num++) {
        do{
            $numero = rand(1, 49);
        }
        while(in_array($numero, $tirage));
        $tirage[] = $numero;
    }
    // var_dump($tirage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
       <h2>Tirage de jour</h2>
        <ul>
        <?php foreach ($tirage as $numero) { ?>
            <li><?php echo $numero; ?></li>
        <?php } ?>
        </ul>
</body>
</html>