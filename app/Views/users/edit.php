<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
</head>
<body>
    <h2>Edit User</h2>
    <a href="<?= site_url('users') ?>">Back to List</a><br><br>

    <?php if (isset($validation)): ?>
        <div style="color: red;"><?= $validation->listErrors() ?></div>
    <?php endif; ?>

    <form action="<?= site_url('users/update/' . $user['id']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <label>Username:</label><br>
        <input type="text" name="username" value="<?= set_value('username', $user['username']) ?>"><br><br>

        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="<?= set_value('full_name', $user['full_name']) ?>"><br><br>

        <label>Profile Avatar (JPG/PNG, Max 2MB):</label><br>
        <?php if (!empty($user['avatar']) && file_exists(FCPATH . 'uploads/' . $user['avatar'])): ?>
            <img src="<?= base_url('uploads/' . $user['avatar']) ?>" width="80" style="display:block; margin: 5px 0;">
        <?php endif; ?>
        <input type="file" name="avatar" accept="image/png, image/jpeg, image/jpg"><br><br>

        <button type="submit">Update User</button>
    </form>
</body>
</html>