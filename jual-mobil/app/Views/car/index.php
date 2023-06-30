<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<h1>Cars</h1>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Make</th>
            <th>Model</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cars as $car) : ?>
            <tr>
                <td><?= $car['make'] ?></td>
                <td><?= $car['model'] ?></td>
                <td><?= $car['price'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a class="btn btn-primary" href="<?= site_url('car/create') ?>">Add Car</a>
<?= $this->endSection() ?>