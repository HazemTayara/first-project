<?php
session_start();

require __DIR__ . "/../models/UserModel.php";
require __DIR__ . "/../helper/validation.php";
require __DIR__ . "/../interface/UserInterface.php";

class UserController implements userInterface
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
    }
    public function add()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
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
                    echo json_encode(
                        [
                            'msg' => 'faild to add user'
                        ]
                    );
                }
            } else {
                echo json_encode(
                    [
                        'msg' => 'your data is wrong'
                    ]
                );
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
            echo json_encode(
                [
                    'msg' => $error[$i]
                ]
            );
        } else {
            echo json_encode(
                [
                    'msg' => 'this ID is not exist'
                ]
            );
        }
    }
    public function delete($id)
    {
        if ($this->model->get($id)) {
            if ($this->model->delete($id)) {
                header("LOCATION:" . BASE_BATH);
            }
        } else {
            echo json_encode(
                ['msg' => 'this ID is not exist']
            );
        }
    }


    public function login()
    {
        $email = $_POST["email"] ; 
        $password = $_POST["password"] ;
        $is_exist = $this->model->getEmail($email);
        if ($is_exist) {
            if ($is_exist["password"] == $password) {
                $_SESSION["login"] = True;
                header("LOCATION:" . BASE_BATH);
            } else {
                /**
                 * Here we well return Json 
                 * return this message : Your password is incorrect 
                 */
                echo json_encode(
                    [
                        'msg' => 'Your password is incorrect'
                    ]
                );
            }
        } else {
            /**
             * Here we well return Json 
             * return this message : Your email is not exist 
             */
            echo json_encode(
                [
                    'msg' => ' Your email is not exist'
                ]
            );
            
        }
    }
    public function reges()
    {
        if ($_SERVER["REQUEST_METHOD"] != 'POST') {
            echo json_encode(
                [
                    'msg' => "Access denied"
                ]
            );
        }
        $data = [
            'name' => $_POST["username"],
            'password' => $_POST["password"],
            'email' => $_POST["email"],
            'password_configuration' => $_POST['password']
        ];
        if ($this->validate($data)) {
            $reges = $this->model->reges($data);
            if ($reges) {
                $_SESSION['login'] = true;
                /**
                 * return Json message ={ Registration : True }  
                 */
                echo json_encode(
                    [
                        'Registration' => True
                    ]
                );
            } else {

                /**
                 * return Json message :{ Registration : False  }
                 */
                echo json_encode(
                    [
                        'Registration' => False
                    ]
                );
            }
        } else {

            /**
             * return Json message : Your data is invalid  
             */
            echo json_encode(
                [
                    'msg' => ' Your data is invalid'
                ]
            );
        }
    }
    public function logout()
    {
        session_destroy();
    }
}
