<?php 

require_once __DIR__ . '/../config/database.php';


class Commentarie {
    //private correspond à la portée des attributs / $----- est un attribut
    private int $id_comments;
    private string $text;
    private ?DateTime $posted_at;
    private ?string $deleted_at;
    private ?string $confirmed_at;
    //?string -> rend l'attribut null
    private int $id_guides;
    private int $id_dungeons;
    private int $id_users;
















}