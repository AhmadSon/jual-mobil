<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<!-- app/Views/sales/index.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Sales List</title>
    <!-- Add any necessary CSS or Bootstrap links here -->
</head>

<body>
    <h1>Sales List</h1>


    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sales as $sale) : ?>
                <tr>
                    <td><?= $sale['id'] ?></td>
                    <td><?= $sale['name'] ?></td>
                    <td><?= $sale['email'] ?></td>
                    <td>
                        <a href="/sales/edit/<?= $sale['id'] ?>">Edit</a>
                        <a href="/sales/delete/<?= $sale['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a class="btn btn-primary" href="/sales/create">Add Sales</a>


    <!-- Add any additional HTML or content as needed -->
</body>

</html>

<?= $this->endSection() ?>