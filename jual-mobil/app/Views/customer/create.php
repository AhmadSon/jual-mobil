<!-- app/Views/customer/create.php -->
<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Customer</title>
    <!-- Add any necessary CSS or Bootstrap links here -->
</head>

<body>
    <h1>Add Customer</h1>

    <!-- Create a form to add a new customer -->
    <form method="POST" action="/customer/store">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" required><br>

        <button class="btn btn-primary" type="submit">Add Customer</button>
    </form>

    <!-- Add any additional HTML or content as needed -->
</body>

</html>
<?= $this->endSection() ?>