<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Vehicle</title>
</head>

<body>
    <h1>Edit Vehicle</h1>

    <form method="post" action="<?= site_url('vehicle/update/' . $vehicle['id']) ?>">
        <label>Brand:</label>
        <input type="text" name="brand" value="<?= $vehicle['brand'] ?>" required><br>

        <label>Model:</label>
        <input type="text" name="model" value="<?= $vehicle['model'] ?>" required><br>

        <label>Year:</label>
        <input type="number" name="year" value="<?= $vehicle['year'] ?>" required><br>

        <label>Price:</label>
        <input type="number" name="price" value="<?= $vehicle['price'] ?>" step="0.01" required><br>

        <input class="btn btn-primary" type="submit" value="Update">
    </form>
</body>

</html>
<?= $this->endSection() ?>