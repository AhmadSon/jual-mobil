<!-- app/Views/sales/edit.php -->
<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Sales</title>
    <!-- Add any necessary CSS or Bootstrap links here -->
</head>

<body>
    <h1>Edit Sales</h1>

    <!-- Create a form to edit the selected sales record -->
    <form method="POST" action="/sales/update/<?= $sale['id'] ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?= $sale['name'] ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= $sale['email'] ?>" required><br>

        <button class="btn btn-primary" type="submit">Update Sales</button>
    </form>

    <!-- Add any additional HTML or content as needed -->
</body>

</html>
<?= $this->endSection() ?>