<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
</head>
<body>
    <h2>User Accounts</h2>
    <a href="<?= site_url('users/new') ?>">+ Add New User</a><br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Avatar</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users) && is_array($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td>
                            <?php if (!empty($user['avatar']) && file_exists(FCPATH . 'uploads/' . $user['avatar'])): ?>
                                <img src="<?= base_url('uploads/' . $user['avatar']) ?>" width="50" height="50" style="object-fit:cover; border-radius:50%;">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/50?text=User" width="50" height="50" style="border-radius:50%;">
                            <?php endif; ?>
                        </td>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['full_name']) ?></td>
                        <td><a href="<?= site_url('users/edit/' . $user['id']) ?>">Edit</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4">No user records found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>