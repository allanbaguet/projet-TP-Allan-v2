<?php 

require_once __DIR__ . '/../config/database.php';


class User {
    //private correspond à la portée des attributs / $----- est un attribut
    private int $id_users;
    private string $username;
    private string $mail;
    private string $password;
    private ?string $picture;
    private bool $role;
    private DateTime $added_at;
    private string $confirmed_at;
    private ?string $deleted_at;
    //?string -> rend l'attribut null



    public function getId_users(): int
    {
        return $this->id_users;
    }

    public function setId_users(int $id_users)
    {
        $this->id_users = $id_users;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function getMail(): string
    {
        return $this->mail;
    }

    public function setMail(string $mail)
    {
        $this->mail = $mail;
    }
    
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function setPicture(string $picture)
    {
        $this->picture = $picture;
    }

    public function getRole(): bool
    {
        return $this->role;
    }

    public function setRole(bool $role)
    {
        $this->role = $role;
    }
    

    public function getAdded_at(): DateTime
    {
        return $this->added_at;
    }

    public function setAdded_at(string $added_at)
    {
        $this->added_at = new DateTime($added_at);
    }


    public function getConfirmed_at(): string
    {
        return $this->confirmed_at;
    }

    public function setConfirmed_at(string $confirmed_at)
    {
        $this->confirmed_at = $confirmed_at;
    }

    public function getDeleted_at(): string
    {
        return $this->deleted_at;
    }

    public function setDeleted_at(string $deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }




















}