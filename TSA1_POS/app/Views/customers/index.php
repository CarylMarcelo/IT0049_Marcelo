<!DOCTYPE html>
<html>
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
<head><title>Customer Accounts</title></head>
<body>
    <nav>
        <a href="<?= base_url('/') ?>">Home</a> | 
        <a href="<?= base_url('/about') ?>">About</a> | 
        <a href="<?= base_url('/customers') ?>">Customers</a> | 
        <a href="<?= base_url('/users') ?>">Users</a>
    </nav>

    <h1>Customer Accounts</h1>
    <table border="1">
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        <?php foreach ($customers as $customer): ?>
        <tr>
            <td><?= esc($customer['name']) ?></td>
            <td><?= esc($customer['email']) ?></td>
            <td><?= esc($customer['phone']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>