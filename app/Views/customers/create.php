<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
</head>
<body>
    <h2>Add New Customer</h2>
    <a href="<?= site_url('customers') ?>">Back to List</a><br><br>

    <?php if (isset($validation)): ?>
        <div style="color: red;"><?= $validation->listErrors() ?></div>
    <?php endif; ?>

    <form action="<?= site_url('customers/create') ?>" method="post">
        <?= csrf_field() ?>
        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="<?= set_value('full_name') ?>"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= set_value('email') ?>"><br><br>

        <label>Phone:</label><br>
        <input type="text" name="phone" value="<?= set_value('phone') ?>"><br><br>

        <button type="submit">Save Customer</button>
    </form>
</body>
</html>