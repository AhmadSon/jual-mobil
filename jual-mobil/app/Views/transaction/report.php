<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<h1>Transaction Report</h1>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Car</th>
            <th>Customer</th>
            <th>Sales</th>
            <th>Price</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($transactions as $transaction) : ?>
            <tr>
                <td><?= $transaction['car_id'] ?></td>
                <td><?= $transaction['customer_id'] ?></td>
                <td><?= $transaction['sales_id'] ?></td>
                <td><?= $transaction['price'] ?></td>
                <td><?= $transaction['date'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>