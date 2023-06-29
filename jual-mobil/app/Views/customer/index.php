<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<h1>Customers</h1>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?= $customer['name'] ?></td>
                <td><?= $customer['email'] ?></td>
                <td><?= $customer['phone'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a class="btn btn-primary" href="<?= site_url('customer/create') ?>">Add Customer</a>
<?= $this->endSection() ?>