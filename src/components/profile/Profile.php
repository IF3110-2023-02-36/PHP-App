<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/profile/Profile.css">
    <link rel="stylesheet" href="../../public/styles/Global.css">
    <title>Profile</title>
</head>

<body>
    <?php
    include(dirname(__DIR__) . '/template/Navbar.php');
    ?>
    <main>
        <h1>Profile</h1>
        <table>
            <tr>
                <th>Username</th>
                <td><?php echo $this->data['username'] ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $this->data['email'] ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo $this->data['name'] ?></td>
            </tr>
            <tr>
                <th>Category</th>
                <td><?php echo $this->data['category'] ?></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><?php
                    if (!isset($data['description'])) {
                        echo '-';
                    } else {
                        echo $this->data['description'];
                    } ?></td>
            </tr>
            <tr>
                <th>
                    <form method="" action="/EditProfile">
                        <button type="submit">Edit</button>
                    </form>
                </th>
            </tr>
        </table>
    </main>
</body>