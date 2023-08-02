<?php
require "./bootstrap.php";

try {
    router();
} catch (Exception $e) {
    var_dump($e->getMessage());
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= TESTE ?>
    </title>
</head>

<body>
    <h2>Index</h2>

</body>

</html>