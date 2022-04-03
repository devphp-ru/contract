<?php
declare(strict_types=1);
error_reporting(-1);

require __DIR__ . '/vendor/autoload.php';


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DEMO-CONTRACT</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
</head>
<body>

<div class="container">

    <?php require __DIR__ . '/view/blocks/navbar/_navbar-top.php'; ?>

    <div class="row mt-5">

        <?php require __DIR__ . '/view/blocks/navbar/_navbar-left.php'; ?>

        <div class="col-md-9">
            <?php require __DIR__ . '/view/form-contract.php'; ?>
        </div>

    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <hr>
        <div class="col-md-12">
            <p>© <?php echo date('Y')?> DEMO-CONTRACT</p>
        </div>
    </div>
</div>

<script src="assets/js/jquery-1.12.4.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>
