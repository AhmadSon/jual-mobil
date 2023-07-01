<!-- app/Views/sales/create.php -->
<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<!-- app/Views/sales/create.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Add Sales</title>
    <!-- Add any necessary CSS or Bootstrap links here -->
</head>

<body>
    <h1>Add Sales</h1>

    <!-- Create a form to add a new sales record -->
    <form method="POST" action="/sales/store">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <br>
        <button class="btn btn-primary" type="submit">Add Sales</button>
    </form>

    <!-- Add any additional HTML or content as needed -->
</body>

</html>
<?= $this->endSection() ?>