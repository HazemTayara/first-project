<?php


require __DIR__ . "/../models/UserModel.php";
require __DIR__ . "/../helper/validation.php";
class UserController
{

    private $model;
    use validation;
    public function __construct($db)
    {
        $this->model = new UserModel($db);
    }

    public function home()
    {
        $users = $this->model->home();
        // include __DIR__.'/../resource/views/home.php';
        include __DIR__.'/../../resource/view/home.php';
    }
    public function add()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            include __DIR__ . "/../../resource/view/add.php";
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'name' => $_POST["username"],
                'password' => $_POST["password"],
                'email' => $_POST["email"],
                'password_configuration' => $_POST['password']
            ];

            if ($this->validate($data)) {
                unset($data['password_configuration']);
                if ($this->model->add($data)) {
                    header("LOCATION: " . BASE_BATH);
                } else {
                    include __DIR__ . "/../../resource/view/add.php";
                    echo "<p>Failed to add user.</p>";
                }
            } else {
                include __DIR__ . "/../../resource/view/add.php";
                echo "<p>your data is wrong</p>";
            }
        }
    }
    public function edit($id)
    {
        $error = ["", "your data is wrong", "Failed to edit user"];
        $i = 0;
        
        if ($this->model->get($id)) {
            if ($_SERVER["REQUEST_METHOD"] == 'POST') {
                $data = [
                    'name' => $_POST["username"],
                    'password' => $_POST["password"],
                    'email' => $_POST["email"],
                    'password_configuration' => $_POST['password']
                ];
                if ($this->validate($data)) {
                    unset($data['password_configuration']);
                    if (!$this->model->edit($id, $data)) {
                        $i = 2;
                    } 
                } else {
                    $i = 1;
                }
            }
            $user = $this->model->get($id);
            include __DIR__ . "/../../resource/view/edit.php";
            echo "<p>" . $error[$i] . "</p>";
        } else {
            echo "<h1>this ID is not exist</h1>";
        }
    }
    public function delete($id)
    {
        if ($this->model->get($id)) {
            if ($this->model->delete($id)) {
                header("LOCATION:" . BASE_BATH);
            }
        } else {
            echo "<h1>this ID is not exist</h1>";
        }
    }
}
