<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <h1>Edit <?= ucfirst($user['name'])  ?></h1>
    <form action="" method="post">
        <div>
            <label for="first">
                Username:
            </label>
            <input type="text" id="first" name="username" placeholder="Enter your Username" required value="<?= $user["name"] ?>">
        </div>
        <br>
        <div>
            <label for="second">
                email:
            </label>
            <input type="text" id="second" name="email" placeholder="Enter your email" required value="<?= $user["email"] ?>">
        </div>
        <br>
        <div>
            <label for="password">
                Password:
            </label>
            <input type="text" id="password" name="password" placeholder="Enter your Password" required value="<?= $user["password"] ?>">
        </div>
        <br>
        <input type="submit" value="save">
        <a href="<?= BASE_BATH ?>">Go back</a>
    </form>
</body>

</html>