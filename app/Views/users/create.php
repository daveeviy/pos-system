<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
</head>
<body>
    <h2>Add New User</h2>
    <a href="<?= site_url('users') ?>">Back to List</a><br><br>

    <?php if (isset($validation)): ?>
        <div style="color: red;"><?= $validation->listErrors() ?></div>
    <?php endif; ?>

    <form action="<?= site_url('users/create') ?>" method="post">
        <?= csrf_field() ?>
        <label>Username:</label><br>
        <input type="text" name="username" value="<?= set_value('username') ?>"><br><br>

        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="<?= set_value('full_name') ?>"><br><br>

        <button type="submit">Save User</button>
    </form>
</body>
</html>