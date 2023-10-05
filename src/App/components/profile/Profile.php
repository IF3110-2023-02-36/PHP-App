<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global CSS -->
    <link rel="stylesheet" href="../../public/styles/profile/Profile.css">
    <link rel="stylesheet" href="../../public/styles/template/Navbar.css">
    <title>Profile</title>
</head>

<body>
    <?php
    $current_page = "Profile";
    include(dirname(__DIR__) . '/template/Navbar.php');
    ?>
    <main>
        <h1>Profile</h1>
        <table>
            <tr>
                <th>Username</th>
                <!-- <td><?php echo $data['username'] ?></td> -->
                <td>foo</td>
            </tr>
            <tr>
                <th>Email</th>
                <!-- <td><?php echo $data['email'] ?></td> -->
                <td>foo@bar.com</td>
            </tr>
            <tr>
                <th>Name</th>
                <!-- <td><?php echo $data['name'] ?></td> -->
                <td>Foo Bar</td>
            </tr>
        </table>
    </main>
</body>