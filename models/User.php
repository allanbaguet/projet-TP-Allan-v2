<?php 

require_once __DIR__ . '/../config/database.php';


class User {
    //private correspond à la portée des attributs / $----- est un attribut
    private int $id_users;
    private string $username;
    private string $mail;
    private string $password;
    private ?string $picture;
    private ?bool $role;
    private ?DateTime $added_at;
    private ?string $confirmed_at;
    private ?string $deleted_at;
    //?string -> rend l'attribut null
















}