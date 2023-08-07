<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <title>
        <?= $title ?>
    </title>
</head>

<body>
    <header>
        <div id="header">
            <?php require "partials/header.php" ?>
        </div>
    </header>
    <div class="container">
        <?php require VIEWS . $view; ?>
    </div>
</body>

</html>