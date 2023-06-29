<!-- app/Views/transaction/index.php -->
<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<!-- app/Views/transaction/index.php -->

<h1>Transaction List</h1>


<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Vehicle</th>
            <th>Salesperson</th>
            <th>Transaction Date</th>
            <th>Amount</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($transactions as $transaction) : ?>
            <tr>
                <td><?= $transaction['id'] ?></td>
                <td><?= $transaction['customer_id'] ?></td>
                <td><?= $transaction['vehicle_id'] ?></td>
                <td><?= $transaction['sales_id'] ?></td>
                <td><?= $transaction['transaction_date'] ?></td>
                <td><?= $transaction['amount'] ?></td>
                <td>
                    <a href="<?= site_url('transaction/edit/' . $transaction['id']) ?>">Edit</a>
                    <a href="<?= site_url('transaction/delete/' . $transaction['id']) ?>" onclick="return confirm('Are you sure you want to delete this transaction?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a class="btn btn-primary" href="<?= site_url('transaction/create') ?>">Add Transaction</a>
<?= $this->endSection() ?>