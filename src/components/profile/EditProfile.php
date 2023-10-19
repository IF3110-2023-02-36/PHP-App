<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/profile/Profile.css">
    <link rel="stylesheet" href="../../styles/Global.css">
    <title>Profile</title>
</head>

<body>
    <?php
    include(dirname(__DIR__) . '/template/Navbar.php');
    ?>
    <main>
        <h1>Profile</h1>
        <form method="POST">
            <table>
                <tr>
                    <th>Username</th>
                    <td>
                        <input type="text" name="username" required value="<?= $this->data['username'] ?>">
                    </td>

                </tr>
                <tr>
                    <th>Email</th>
                    <td>
                        <input type="text" name="email" required value="<?= $this->data['email'] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>
                        <input type="text" name="name" required value="<?= $this->data['name'] ?>">
                    </td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td><?php echo $this->data['category'] ?></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>
                        <textarea name="description">
                            <? echo isset($data['description']) ? $data['description'] : ''; ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <th>
                        <button type="submit">Save</button>
                    </th>
                </tr>
            </table>
        </form>
    </main>
</body>