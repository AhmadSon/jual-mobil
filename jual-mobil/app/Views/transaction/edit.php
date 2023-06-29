<!-- app/Views/transaction/edit.php -->
<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<!-- app/Views/transaction/edit.php -->

<h1>Edit Transaction</h1>

<form action="<?= site_url('transaction/update/' . $transaction['id']) ?>" method="post">
    <label for="customer_id">Customer:</label>
    <select name="customer_id" id="customer_id" required>
        <?php foreach ($customers as $customer) : ?>
            <option value="<?= $customer['id'] ?>" <?= $customer['id'] == $transaction['customer_id'] ? 'selected' : '' ?>>
                <?= $customer['name'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="vehicle_id">Vehicle:</label>
    <select name="vehicle_id" id="vehicle_id" required>
        <?php foreach ($vehicles as $vehicle) : ?>
            <option value="<?= $vehicle['id'] ?>" <?= $vehicle['id'] == $transaction['vehicle_id'] ? 'selected' : '' ?>>
                <?= $vehicle['model'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="sales_id">Salesperson:</label>
    <select name="sales_id" id="sales_id" required>
        <?php foreach ($sales as $salesperson) : ?>
            <option value="<?= $salesperson['id'] ?>" <?= $salesperson['id'] == $transaction['sales_id'] ? 'selected' : '' ?>>
                <?= $salesperson['name'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="transaction_date">Transaction Date:</label>
    <input type="date" name="transaction_date" id="transaction_date" value="<?= $transaction['transaction_date'] ?>" required><br>

    <label for="amount">Amount:</label>
    <input type="number" name="amount" id="amount" step="0.01" value="<?= $transaction['amount'] ?>" required><br>

    <button class="btn btn-primary" type="submit">Update</button>
</form>
<?= $this->endSection() ?>