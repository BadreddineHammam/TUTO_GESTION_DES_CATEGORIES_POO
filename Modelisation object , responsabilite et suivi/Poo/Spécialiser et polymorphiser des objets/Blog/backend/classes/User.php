<?php

class User
{
    protected $id;
    protected $email;
    protected $password;
    

    public function getRoleName(): string
    {
        return "Visiteur anonyme";
    }
}