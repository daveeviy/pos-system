<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
</head>
<body>
    <h2>Customer Accounts</h2>
    <a href="<?= site_url('customers/new') ?>">+ Add New Customer</a><br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($customers) && is_array($customers)): ?>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= esc($customer['full_name']) ?></td>
                        <td><?= esc($customer['email']) ?></td>
                        <td><?= esc($customer['phone']) ?></td>
                        <td><a href="<?= site_url('customers/edit/' . $customer['id']) ?>">Edit</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4">No customer records found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>