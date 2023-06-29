<!-- app/Views/transaction/create.php -->
<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<!-- app/Views/transaction/create.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Add Transaction</title>
</head>

<body>
    <h1>Add Transaction</h1>

    <form method="post" action="<?= site_url('transaction/store') ?>">
        <label>Customer:</label>
        <select name="customer_id" required>
            <option value="">Select a customer</option>
            <?php foreach ($customers as $customer) : ?>
                <option value="<?= $customer['id'] ?>"><?= $customer['name'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <label>Vehicle:</label>
        <select name="vehicle_id" required>
            <option value="">Select a vehicle</option>
            <?php foreach ($vehicles as $vehicle) : ?>
                <option value="<?= $vehicle['id'] ?>"><?= $vehicle['brand'] ?> <?= $vehicle['model'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <label>Transaction Date:</label>
        <input type="date" name="transaction_date" required><br>

        <label>Amount:</label>
        <input type="number" name="amount" id="amount" step="0.01" value="<?= $vehicle['price'] ?>" required><br>

        <input class="btn btn-primary" type="submit" value="Add">
    </form>
</body>

</html>

</form>
</body>

</html>
<?= $this->endSection() ?>