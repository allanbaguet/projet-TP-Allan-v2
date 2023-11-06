<?php 

require_once __DIR__ . '/../config/database.php';


class Dungeon {
    //private correspond à la portée des attributs / $----- est un attribut
    private int $id_dungeons;
    private string $main_title;
    private string $picture_zone;
    private string $picture_key;
    private string $picture_pnj;
    private string $picture_card_mob_1;
    private string $text_card_mob_1;
    private string $picture_card_mob_2;
    private string $text_card_mob_2;
    private string $picture_card_mob_3;
    private string $text_card_mob_3;
    private string $picture_card_mob_4;
    private string $text_card_mob_4;
    private string $picture_card_mob_5;
    private string $text_card_mob_5;
    private string $title_card_room_1;
    private string $picture_card_room_1;
    private string $title_card_room_2;
    private string $picture_card_room_2;
    private string $title_card_room_3;
    private string $picture_card_room_3;
    private string $title_card_room_4;
    private string $picture_card_room_4;
    private string $title_card_room_boss;
    private string $picture_card_room_boss;
    private string $picture_card_boss;
    private string $text_card_boss;
    private DateTime $posted_at;
    private string $modified_at;
    private ?string $deleted_at;
    //?string -> rend l'attribut null
    private int $id_users;

    public function getId_dungeons(): int
    {
        return $this->id_dungeons;
    }

    public function setId_dungeons(int $id_dungeons)
    {
        $this->id_dungeons = $id_dungeons;
    }

    public function getMain_title(): string
    {
        return $this->main_title;
    }

    public function setMain_title(string $main_title)
    {
        $this->main_title = $main_title;
    }


    public function getPicture_zone(): string
    {
        return $this->picture_zone;
    }

    public function setPicture_zone(string $picture_zone)
    {
        $this->picture_zone = $picture_zone;
    }


    public function getPicture_key(): string
    {
        return $this->picture_key;
    }

    public function setPicture_key(string $picture_key)
    {
        $this->picture_key = $picture_key;
    }


    public function getPicture_pnj(): string
    {
        return $this->picture_pnj;
    }

    public function setPicture_pnj(string $picture_pnj)
    {
        $this->picture_pnj = $picture_pnj;
    }


    public function getPicture_card_mob_1(): string
    {
        return $this->picture_card_mob_1;
    }

    public function setPicture_card_mob_1(string $picture_card_mob_1)
    {
        $this->picture_card_mob_1 = $picture_card_mob_1;
    }


    public function getText_card_mob_1(): string
    {
        return $this->text_card_mob_1;
    }

    public function setText_card_mob_1(string $text_card_mob_1)
    {
        $this->text_card_mob_1 = $text_card_mob_1;
    }


    public function getPicture_card_mob_2(): string
    {
        return $this->picture_card_mob_2;
    }

    public function setPicture_card_mob_2(string $picture_card_mob_2)
    {
        $this->picture_card_mob_2 = $picture_card_mob_2;
    }


    public function getText_card_mob_2(): string
    {
        return $this->text_card_mob_2;
    }

    public function setText_card_mob_2(string $text_card_mob_2)
    {
        $this->text_card_mob_2 = $text_card_mob_2;
    }


    public function getPicture_card_mob_3(): string
    {
        return $this->picture_card_mob_3;
    }

    public function setPicture_card_mob_3(string $picture_card_mob_3)
    {
        $this->picture_card_mob_3 = $picture_card_mob_3;
    }


    public function getText_card_mob_3(): string
    {
        return $this->text_card_mob_3;
    }

    public function setText_card_mob_3(string $text_card_mob_3)
    {
        $this->text_card_mob_3 = $text_card_mob_3;
    }


    public function getPicture_card_mob_4(): string
    {
        return $this->picture_card_mob_4;
    }

    public function setPicture_card_mob_4(string $picture_card_mob_4)
    {
        $this->picture_card_mob_4 = $picture_card_mob_4;
    }


    public function getText_card_mob_4(): string
    {
        return $this->text_card_mob_4;
    }

    public function setText_card_mob_4(string $text_card_mob_4)
    {
        $this->text_card_mob_4 = $text_card_mob_4;
    }


    public function getPicture_card_mob_5(): string
    {
        return $this->picture_card_mob_5;
    }

    public function setPicture_card_mob_5(string $picture_card_mob_5)
    {
        $this->picture_card_mob_5 = $picture_card_mob_5;
    }


    public function getText_card_mob_5(): string
    {
        return $this->text_card_mob_5;
    }

    public function setText_card_mob_5(string $text_card_mob_5)
    {
        $this->text_card_mob_5 = $text_card_mob_5;
    }


    public function getTitle_card_room_1(): string
    {
        return $this->title_card_room_1;
    }

    public function setTitle_card_room_1(string $title_card_room_1)
    {
        $this->title_card_room_1 = $title_card_room_1;
    }


    public function getPicture_card_room_1(): string
    {
        return $this->picture_card_room_1;
    }

    public function setPicture_card_room_1(string $picture_card_room_1)
    {
        $this->picture_card_room_1 = $picture_card_room_1;
    }


    public function getTitle_card_room_2(): string
    {
        return $this->title_card_room_2;
    }

    public function setTitle_card_room_2(string $title_card_room_2)
    {
        $this->title_card_room_2 = $title_card_room_2;
    }


    public function getPicture_card_room_2(): string
    {
        return $this->picture_card_room_2;
    }

    public function setPicture_card_room_2(string $picture_card_room_2)
    {
        $this->picture_card_room_2 = $picture_card_room_2;
    }


    public function getTitle_card_room_3(): string
    {
        return $this->title_card_room_3;
    }

    public function setTitle_card_room_3(string $title_card_room_3)
    {
        $this->title_card_room_3 = $title_card_room_3;
    }


    public function getPicture_card_room_3(): string
    {
        return $this->picture_card_room_3;
    }

    public function setPicture_card_room_3(string $picture_card_room_3)
    {
        $this->picture_card_room_3 = $picture_card_room_3;
    }


    public function getTitle_card_room_4(): string
    {
        return $this->title_card_room_4;
    }

    public function setTitle_card_room_4(string $title_card_room_4)
    {
        $this->title_card_room_4 = $title_card_room_4;
    }


    public function getPicture_card_room_4(): string
    {
        return $this->picture_card_room_4;
    }

    public function setPicture_card_room_4(string $picture_card_room_4)
    {
        $this->picture_card_room_4 = $picture_card_room_4;
    }


    public function getTitle_card_room_boss(): string
    {
        return $this->title_card_room_boss;
    }

    public function setTitle_card_room_boss(string $title_card_room_boss)
    {
        $this->title_card_room_boss = $title_card_room_boss;
    }


    public function getPicture_card_room_boss(): string
    {
        return $this->picture_card_room_boss;
    }

    public function setPicture_card_room_boss(string $picture_card_room_boss)
    {
        $this->picture_card_room_boss = $picture_card_room_boss;
    }


    public function getPicture_card_boss(): string
    {
        return $this->picture_card_boss;
    }

    public function setPicture_card_boss(string $picture_card_boss)
    {
        $this->picture_card_boss = $picture_card_boss;
    }


    public function getText_card_boss(): string
    {
        return $this->text_card_boss;
    }

    public function setText_card_boss(string $text_card_boss)
    {
        $this->text_card_boss = $text_card_boss;
    }


    public function getPosted_at(): DateTime
    {
        return $this->posted_at;
    }

    public function setPosted_at(string $posted_at)
    {
        $this->posted_at = new DateTime($posted_at);
    }

    public function getModified_at(): string
    {
        return $this->modified_at;
    }

    public function setModified_at(string $modified_at)
    {
        $this->modified_at = $modified_at;
    }


    public function getDeleted_at(): ?string
    {
        return $this->deleted_at;
    }

    public function setDeleted_at(?string $deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }


    public function getId_users(): int
    {
        return $this->id_users;
    }

    public function setId_users(int $id_users)
    {
        $this->id_users = $id_users;
    }





    public static function get_all(): array
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM `dungeons`
        INNER JOIN `users` ON `dungeons`.`id_users` = `users`.`id_users` WHERE `deleted_at` IS NULL;";
        //requête SQL permettant de joindre la table vehicles et types, et de cibler leur colonne en commun
        //qui est id_types
        $sth = $pdo->query($sql);
        // $sth->bindValue(':order', $order);
        // $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        //fetchAll récupére tout les enregistrements
        //sth -> statements handle
        return $result;
    }

    //méthode permettant de récuperer les infos du formulaire pour les modifiés ensuite
    public static function get(int $id_dungeons): object
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `dungeons` WHERE `id_dungeons` = :id_dungeons';
        //  : -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        $sth->bindValue(':id_dungeons', $id_dungeons, PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif 
        //PDO::PARAM_INT -> permet de typer la valeur de retour (ici en INT) par défaut en string
        $sth->execute();
        //la méthode execute retourne un booléen
        $result = $sth->fetch();
        //fetch récupére le premier enregistrement
        //sth -> statements handle
        return $result;
    }

    public function insert(): bool
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `dungeons` (`main_title`, `picture_zone`, `picture_key`, `picture_pnj`, 
        `picture_card_mob_1`, `text_card_mob_1`,
        `picture_card_mob_2`, `text_card_mob_2`,
        `picture_card_mob_3`, `text_card_mob_3`,
        `picture_card_mob_4`, `text_card_mob_4`,
        `picture_card_mob_5`, `text_card_mob_5`,
        `title_card_room_1`, `picture_card_room_1`,
        `title_card_room_2`, `picture_card_room_2`,
        `title_card_room_3`, `picture_card_room_3`,
        `title_card_room_4`, `picture_card_room_4`,
        `title_card_room_boss`, `picture_card_room_boss`,
        `picture_card_boss`, `text_card_boss`, `id_users`)
        VALUES (:main_title, :picture_zone, :picture_key, :picture_pnj,
        :picture_card_mob_1, :text_card_mob_1,
        :picture_card_mob_2, :text_card_mob_2,
        :picture_card_mob_3, :text_card_mob_3,
        :picture_card_mob_4, :text_card_mob_4,
        :picture_card_mob_5, :text_card_mob_5,
        :title_card_room_1, :picture_card_room_1,
        :title_card_room_2, :picture_card_room_2,
        :title_card_room_3, :picture_card_room_3,
        :title_card_room_4, :picture_card_room_4,
        :title_card_room_boss, :picture_card_room_boss,
        :picture_card_boss, :text_card_boss, :id_users);';
        //:type -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':main_title', $this->getMain_title());
        $sth->bindValue(':picture_zone', $this->getPicture_zone());
        $sth->bindValue(':picture_key', $this->getPicture_key());
        $sth->bindValue(':picture_pnj', $this->getPicture_pnj());

        $sth->bindValue(':picture_card_mob_1', $this->getPicture_card_mob_1());
        $sth->bindValue(':text_card_mob_1', $this->getText_card_mob_1());
        $sth->bindValue(':picture_card_mob_2', $this->getPicture_card_mob_2());
        $sth->bindValue(':text_card_mob_2', $this->getText_card_mob_2());
        $sth->bindValue(':picture_card_mob_3', $this->getPicture_card_mob_3());
        $sth->bindValue(':text_card_mob_3', $this->getText_card_mob_3());
        $sth->bindValue(':picture_card_mob_4', $this->getPicture_card_mob_4());
        $sth->bindValue(':text_card_mob_4', $this->getText_card_mob_4());
        $sth->bindValue(':picture_card_mob_5', $this->getPicture_card_mob_5());
        $sth->bindValue(':text_card_mob_5', $this->getText_card_mob_5());

        $sth->bindValue(':title_card_room_1', $this->getTitle_card_room_1());
        $sth->bindValue(':picture_card_room_1', $this->getPicture_card_room_1());
        $sth->bindValue(':title_card_room_2', $this->getTitle_card_room_2());
        $sth->bindValue(':picture_card_room_2', $this->getPicture_card_room_2());
        $sth->bindValue(':title_card_room_3', $this->getTitle_card_room_3());
        $sth->bindValue(':picture_card_room_3', $this->getPicture_card_room_3());
        $sth->bindValue(':title_card_room_4', $this->getTitle_card_room_4());
        $sth->bindValue(':picture_card_room_4', $this->getPicture_card_room_4());

        $sth->bindValue(':title_card_room_boss', $this->getTitle_card_room_boss());
        $sth->bindValue(':picture_card_room_boss', $this->getPicture_card_room_boss());
        $sth->bindValue(':picture_card_boss', $this->getPicture_card_boss());
        $sth->bindValue(':text_card_boss', $this->getText_card_boss());

        $sth->bindValue(':id_users', $this->getId_users(), PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif
        $result = $sth->execute();
        //$result -> se trouve la réponse de la méthode execute
        //la méthode execute retourne un booléen
        //sth -> statements handle
        return $result;
    }

    //Méthode permettant la mise à jour une fiche de guide
    public function update(): bool
    {
        $pdo = Database::connect();
        $sql = 'UPDATE `dungeons` SET `main_title` = :main_title,
        `picture_zone` = :picture_zone,
        `picture_key` = :picture_key,
        `picture_pnj` = :picture_pnj,
        `picture_card_mob_1` = :picture_card_mob_1,
        `text_card_mob_1` = :text_card_mob_1,
        `picture_card_mob_2` = :picture_card_mob_2,
        `text_card_mob_2` = :text_card_mob_2,
        `picture_card_mob_3` = :picture_card_mob_3,
        `text_card_mob_3` = :text_card_mob_3,
        `picture_card_mob_4` = :picture_card_mob_4,
        `text_card_mob_4` = :text_card_mob_4,
        `picture_card_mob_5` = :picture_card_mob_5,
        `text_card_mob_5` = :text_card_mob_5,
        `title_card_room_1` = :title_card_room_1,
        `picture_card_room_1` = :picture_card_room_1,
        `title_card_room_2` = :title_card_room_2,
        `picture_card_room_2` = :picture_card_room_2,
        `title_card_room_3` = :title_card_room_3,
        `picture_card_room_3` = :picture_card_room_3,
        `title_card_room_4` = :title_card_room_4,
        `picture_card_room_4` = :picture_card_room_4,
        `title_card_room_boss` = :title_card_room_boss,
        `picture_card_room_boss` = :picture_card_room_boss,
        `picture_card_boss` = :picture_card_boss,
        `text_card_boss` = :text_card_boss,
        `id_users` = :id_users
        WHERE `id_dungeons` = :id_dungeons';
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':main_title', $this->getMain_title());
        $sth->bindValue(':picture_zone', $this->getPicture_zone());
        $sth->bindValue(':picture_key', $this->getPicture_key());
        $sth->bindValue(':picture_pnj', $this->getPicture_pnj());

        $sth->bindValue(':picture_card_mob_1', $this->getPicture_card_mob_1());
        $sth->bindValue(':text_card_mob_1', $this->getText_card_mob_1());
        $sth->bindValue(':picture_card_mob_2', $this->getPicture_card_mob_2());
        $sth->bindValue(':text_card_mob_2', $this->getText_card_mob_2());
        $sth->bindValue(':picture_card_mob_3', $this->getPicture_card_mob_3());
        $sth->bindValue(':text_card_mob_3', $this->getText_card_mob_3());
        $sth->bindValue(':picture_card_mob_4', $this->getPicture_card_mob_4());
        $sth->bindValue(':text_card_mob_4', $this->getText_card_mob_4());
        $sth->bindValue(':picture_card_mob_5', $this->getPicture_card_mob_5());
        $sth->bindValue(':text_card_mob_5', $this->getText_card_mob_5());

        $sth->bindValue(':title_card_room_1', $this->getTitle_card_room_1());
        $sth->bindValue(':picture_card_room_1', $this->getPicture_card_room_1());
        $sth->bindValue(':title_card_room_2', $this->getTitle_card_room_2());
        $sth->bindValue(':picture_card_room_2', $this->getPicture_card_room_2());
        $sth->bindValue(':title_card_room_3', $this->getTitle_card_room_3());
        $sth->bindValue(':picture_card_room_3', $this->getPicture_card_room_3());
        $sth->bindValue(':title_card_room_4', $this->getTitle_card_room_4());
        $sth->bindValue(':picture_card_room_4', $this->getPicture_card_room_4());

        $sth->bindValue(':title_card_room_boss', $this->getTitle_card_room_boss());
        $sth->bindValue(':picture_card_room_boss', $this->getPicture_card_room_boss());
        $sth->bindValue(':picture_card_boss', $this->getPicture_card_boss());
        $sth->bindValue(':text_card_boss', $this->getText_card_boss());
        $sth->bindValue(':id_users', $this->getId_users(), PDO::PARAM_INT);
        $sth->bindValue(':id_dungeons', $this->getId_dungeons(), PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif, PDO::PARAM_STR par defaut
        $sth->execute();
        //la méthode execute retourne un booléen
        return (bool) $sth->rowCount();
        //rowCount renvoi le nombre de ligne envoyé -> renvoi booléen 1, 2, 3 ...
    }

    public static function delete(int $id_dungeons): bool
    {
        $pdo = Database::connect();
        $sql = 'DELETE FROM `dungeons` WHERE `id_dungeons` = :id_dungeons';
        //:id_dungeons -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':id_dungeons', $id_dungeons, PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif, PDO::PARAM_STR par defaut
        $sth->execute();
        //la méthode execute retourne un booléen
        $nbRows = $sth->rowCount();
        //rowCount retourne le nombre de colonne affecté par la dernière requête SQL
        return $nbRows > 0 ? true : false;
    }



















}