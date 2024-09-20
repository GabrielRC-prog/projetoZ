<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Exception;

class User extends DataLayer
{
    public function __construct()
    {
        parent::__construct("users", ["username", "password", "email"], "id", true);
    }

    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function validate()
    {
        if(empty($this->username)){
            throw new Exception("O nome de usuario não pode estar vazio.");
        }

        if(empty($this->email)){
            throw new Exception("O email é inválido");
        }
        
        if(empty($this->password)){
            throw new Exception("a senha está incorreta");
        }
    }

    public function checkPassword($password)
    {
        return password_verify($password, $this->password);
    }

    public static function findByUser($username)
    {
        return (new self())->find("username = :username", "username = {$username}")->fetch();
    }

    public static function findByEmail($email)
    {
        return(new self())->find("email = :email", "email = {$email}")->fetch();
    }

    public function add($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->setPassword($password);

        $this->validate();

        if(!$this->save){
            throw new Exception("Erro ao salvar o usuario: "("," . $this->fail()->getMessage()));
        }
    }
}