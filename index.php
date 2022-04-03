<?php
declare(strict_types=1);
session_start();

use App\Core\Validator;
use App\Models\Contract;

error_reporting(-1);

require __DIR__ . '/vendor/autoload.php';

if (!empty($_POST)) {
    $validator = new Validator();
    $data = $validator->load($_POST)
        ->clear()
        ->checkEmpty()
        ->getArray();

    if ($errors = $validator->getErrors()) {
        $_SESSION['errors'] = $errors;
    } else {
        try {
            $contract = new Contract(
                $data['number_contract'],
                (int)$data['product_id'],
                $data['delivery_time'],
                $data['comment'],
                (int)$data['price_contract'],
                $data['client_surname'],
                $data['client_name'],
                $data['client_patronymic'],
                $data['employee_surname'],
                $data['employee_name'],
                $data['employee_patronymic']
            );

            $_SESSION['success'] = 'Контракт создан';
        } catch (\Exception $e) {
            $_SESSION['errors'][] = $e->getMessage();
        }

    }

    header("Location: /");
    die;
}
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

    <?php if (!empty($_SESSION['errors'])): ?>
        <div class="alert alert-danger mt-2 mb-2" role="alert">
            <?php echo implode(' ', $_SESSION['errors']); ?>
        </div>
        <?php unset($_SESSION['errors']); ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['success'])): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['success']; ?>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

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
