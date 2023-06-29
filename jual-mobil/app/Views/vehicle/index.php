<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Vehicle List</title>
</head>

<body>
    <h1>Vehicle List</h1>


    <table class="table">
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Year</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($vehicles as $vehicle) : ?>
            <tr>
                <td><?= $vehicle['id'] ?></td>
                <td><?= $vehicle['brand'] ?></td>
                <td><?= $vehicle['model'] ?></td>
                <td><?= $vehicle['year'] ?></td>
                <td><?= $vehicle['price'] ?></td>
                <td>
                    <a href="<?= site_url('vehicle/edit/' . $vehicle['id']) ?>">Edit</a>
                    <a href="<?= site_url('vehicle/delete/' . $vehicle['id']) ?>" onclick="return confirm('Are you sure you want to delete this vehicle?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
<a class="btn btn-primary" href="<?= site_url('vehicle/create') ?>">Add Vehicle</a>

</html>
<?= $this->endSection() ?>