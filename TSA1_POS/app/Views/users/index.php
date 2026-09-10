<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title>User Accounts</title>
</head>
<body>
    <nav>
        <a href="<?= base_url('/') ?>">Home</a> | 
        <a href="<?= base_url('/about') ?>">About</a> | 
        <a href="<?= base_url('/customers') ?>">Customers</a> | 
        <a href="<?= base_url('/users') ?>">Users</a>
    </nav>
    
    <h1>User Accounts</h1>
    <table border="1">
        <tr>
            <th>Username</th>
            <th>Full Name</th>
            <th>Role</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= esc($user['username']) ?></td>
            <td><?= esc($user['fullname']) ?></td>
            <td><?= esc($user['role']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>