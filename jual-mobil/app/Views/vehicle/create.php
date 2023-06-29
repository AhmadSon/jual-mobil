<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Vehicle</title>
</head>

<body>
    <h1>Add Vehicle</h1>

    <form method="post" action="<?= site_url('vehicle/store') ?>">
        <label>Brand:</label>
        <input type="text" name="brand" required><br>

        <label>Model:</label>
        <input type="text" name="model" required><br>

        <label>Year:</label>
        <input type="number" name="year" required><br>

        <label>Price:</label>
        <input type="number" name="price" step="0.01" required><br>

        <input class="btn btn-primary" type="submit" value="Add">
    </form>
</body>

</html>
<?= $this->endSection() ?>