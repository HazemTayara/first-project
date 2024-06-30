<?php


class UserModel
{
    private $tableName = "users";
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
        $this->db->setPrefix("this_");
    }

    public function home()
    {
        $cols = ["id", "name", "email"];

        $users = $this->db->get($this->tableName , null , $cols);
        return $users;
    }
    public function add($data)
    {
        return $this->db->insert($this->tableName, $data);
    }
    public function get($id)
    {
        return $this->db->where("id", $id)->getOne($this->tableName);
    }
    public function edit($id, $data)
    {
        return $this->db->where("id", $id)->update($this->tableName, $data);
    }
    public function delete($id)
    {
        return $this->db->where("id" , $id )->delete($this->tableName, $id);
    }
}
