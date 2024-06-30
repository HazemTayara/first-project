<?php

interface UserInterface
{
    public function login($email , $password);
    public function reges($data);
    public function logout();
    
}
