<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Car</title>
</head>

<body>
    <h1>Add Car</h1>

    <form method="post" action="<?= site_url('car/store') ?>">
        <label for="make">Make:</label>
        <input type="text" name="make" id="make" required>

        <label for="model">Model:</label>
        <input type="text" name="model" id="model" required>

        <label for="price">Price:</label>
        <input type="number" name="price" id="price" required>

        <button type="submit">Save</button>
    </form>
</body>

</html>
<a class="btn btn-primary" href="<?= site_url('car/create') ?>">Add Car</a>
<?= $this->endSection() ?>