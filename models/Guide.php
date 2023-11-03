<?php 

require_once __DIR__ . '/../config/database.php';


class Guide {
    //private correspond à la portée des attributs / $----- est un attribut
    private int $id_guides;
    private string $main_title;
    private string $main_text;
    private ?DateTime $posted_at;
    private ?string $modified_at;
    //?string -> rend l'attribut null
    private int $id_users;
















}