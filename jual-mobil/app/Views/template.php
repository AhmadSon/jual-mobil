<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Car Sales' ?></title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?= site_url('/') ?>">Car Sales</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/vehicle') ?>">Vehicles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/customer') ?>">Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/sales') ?>">Sales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/transaction') ?>">Transactions</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <?= $this->renderSection('content') ?>
    </div>

    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
</body>

</html>