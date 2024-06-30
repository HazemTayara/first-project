<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="resource/css/style.css"> -->
    <title>Document</title>
</head>

<body>
    <div class="main">

        <h1>Welcome</h1>
        <hr>
        <a href="user/add"">add user</a>
        <br>
        <br>
        <table border="1" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>email</th>
                    <!-- <th>action</th> -->
                </tr>
            </thead>

            <tbody>
                <?php $i = 1;
                foreach ($users as $k => $v) : ?>

                    <tr>
                        <td><?= $i ?></td>                            
                        <td><?= ucfirst($v["name"]) ?></td>                            
                        <td><?= $v["email"] ?></td>                            
                        <td><a href="user/edit?id=<?= $v["id"] ?>">edit</a></td>                            
                        <td><a href="user/delete?id=<?= $v["id"] ?>">delete</a></td>                            
                    </tr>
                    
                <?php $i++;
                endforeach; ?>
            </tbody>
            </table>
    </div>
</body>

</html>