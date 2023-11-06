<?php

require_once __DIR__ . '/../config/database.php';


class Guide
{
    //private correspond à la portée des attributs / $----- est un attribut
    private int $id_guides;
    private string $main_title;
    private string $main_text;
    private string $sub_title_1;
    private string $sub_text;
    private string $picture_tier_list;
    private string $title_card_1;
    private string $picture_card_1;
    private string $text_card_1;
    private string $title_card_2;
    private string $picture_card_2;
    private string $text_card_2;
    private string $title_card_3;
    private string $picture_card_3;
    private string $text_card_3;
    private DateTime $posted_at;
    private string $modified_at;
    private ?string $deleted_at;
    //?string -> rend l'attribut null
    private int $id_users;

    /** méthode retournant la valeur des ID des guides
     * @return int
     */
    public function getId_guides(): int
    {
        return $this->id_guides;
    }

    /**
     * méthode affectant la valeur des ID des guides
     * @param int $id_rents
     */
    public function setId_guides(int $id_guides)
    {
        $this->id_guides = $id_guides;
    }

    /**
     * méthode retournant la valeur du titre principal
     * @return string
     */
    public function getMain_title(): string
    {
        return $this->main_title;
    }

    /**
     * méthode affectant la valeur du titre principal
     * @param string $stardate
     */
    public function setMain_title(string $main_title)
    {
        $this->main_title = $main_title;
    }

    /**
     * méthode retournant la valeur du texte principal
     * @return string
     */
    public function getMain_text(): string
    {
        return $this->main_text;
    }

    /**
     * méthode affectant la valeur du texte principal
     * @param string $enddate
     */
    public function setMain_text(string $main_text)
    {
        $this->main_text = $main_text;
    }

    /**
     * méthode retournant la valeur du sous titre
     * @return string
     */
    public function getSub_title_1(): string
    {
        return $this->sub_title_1;
    }

    /**
     * méthode affectant la valeur du sous titre
     * @param string $created_at
     */
    public function setSub_title_1(string $sub_title_1)
    {
        $this->sub_title_1 = $sub_title_1;
    }

    /**
     * méthode retournant la valeur du sous texte
     * @return string
     */
    public function getSub_text(): string
    {
        return $this->sub_text;
    }

    /**
     * méthode affectant la valeur ddu sous texte
     * @param string $confirmed_at
     */
    public function setSub_text(string $sub_text)
    {
        $this->sub_text = $sub_text;
    }

    /**
     * méthode retournant la valeur de l'image tier list
     * @return string
     */
    public function getPicture_tier_list(): string
    {
        return $this->picture_tier_list;
    }

    /**
     * méthode affectant la valeur de l'image tier list
     * @param string $id_vehicles
     */
    public function setPicture_tier_list(string $picture_tier_list)
    {
        $this->picture_tier_list = $picture_tier_list;
    }

    /**
     * méthode retournant la valeur du titre de la card
     * @return string
     */
    public function getTitle_card_1(): string
    {
        return $this->title_card_1;
    }

    /**
     * méthode affectant la valeur ddu titre de la card
     * @param string $id_clients
     */
    public function setTitle_card_1(string $title_card_1)
    {
        $this->title_card_1 = $title_card_1;
    }

    /** méthode retournant la valeur de l'image de la card
     * @return string
     */
    public function getPicture_card_1(): string
    {
        return $this->picture_card_1;
    }

    /**
     * méthode affectant la valeur de l'image de la card
     * @param string $id_rents
     */
    public function setPicture_card_1(string $picture_card_1)
    {
        $this->picture_card_1 = $picture_card_1;
    }

    /**
     * méthode retournant la valeur du texte de la card
     * @return string
     */
    public function getText_card_1(): string
    {
        return $this->text_card_1;
    }

    /**
     * méthode affectant la valeur du texte de la card
     * @param string $stardate
     */
    public function setText_card_1(string $text_card_1)
    {
        $this->text_card_1 = $text_card_1;
    }

    /**
     * méthode retournant la valeur ddu titre de la card
     * @return string
     */
    public function getTitle_card_2(): string
    {
        return $this->title_card_2;
    }

    /**
     * méthode affectant la valeur ddu titre de la card
     * @param string $id_clients
     */
    public function setTitle_card_2(string $title_card_2)
    {
        $this->title_card_2 = $title_card_2;
    }

    /** méthode retournant la valeur de l'image de la card
     * @return string
     */
    public function getPicture_card_2(): string
    {
        return $this->picture_card_2;
    }

    /**
     * méthode affectant la valeur de l'image de la card
     * @param string $id_rents
     */
    public function setPicture_card_2(string $picture_card_2)
    {
        $this->picture_card_2 = $picture_card_2;
    }

    /**
     * méthode retournant la valeur du texte de la card
     * @return string
     */
    public function getText_card_2(): string
    {
        return $this->text_card_2;
    }

    /**
     * méthode affectant la valeur du texte de la card
     * @param string $stardate
     */
    public function setText_card_2(string $text_card_2)
    {
        $this->text_card_2 = $text_card_2;
    }


    /**
     * méthode retournant la valeur ddu titre de la card
     * @return string
     */
    public function getTitle_card_3(): string
    {
        return $this->title_card_3;
    }

    /**
     * méthode affectant la valeur ddu titre de la card
     * @param string $id_clients
     */
    public function setTitle_card_3(string $title_card_3)
    {
        $this->title_card_3 = $title_card_3;
    }

    /** méthode retournant la valeur de l'image de la card
     * @return string
     */
    public function getPicture_card_3(): string
    {
        return $this->picture_card_3;
    }

    /**
     * méthode affectant la valeur de l'image de la card
     * @param string $id_rents
     */
    public function setPicture_card_3(string $picture_card_3)
    {
        $this->picture_card_3 = $picture_card_3;
    }

    /**
     * méthode retournant la valeur du texte de la card
     * @return string
     */
    public function getText_card_3(): string
    {
        return $this->text_card_3;
    }

    /**
     * méthode affectant la valeur du texte de la card
     * @param string $stardate
     */
    public function setText_card_3(string $text_card_3)
    {
        $this->text_card_3 = $text_card_3;
    }

    /**
     * méthode retournant la valeur de la création du guide
     * DateTime est un objet
     * @return int
     */
    public function getPosted_at(): DateTime
    //récupération des valeurs de l'attribut / Getter / DateTime est un objet
    {
        return $this->posted_at;
    }

    /**
     * méthode affectant la valeur de la création du guide
     * @param int $id_types
     * 
     */
    public function setPosted_at(string $posted_at)
    {
        $this->posted_at = new DateTime($posted_at);
    }

    /**
     * méthode retournant la valeur de la modification du guide
     * @return int
     */
    public function getModified_at(): string
    //récupération des valeurs de l'attribut / Getter / et un entier
    {
        return $this->modified_at;
    }

    /**
     * méthode affectant la valeur de la modification du guide
     * @param int $id_types
     * 
     */
    public function setModified_at(string $modified_at)
    {
        $this->modified_at = $modified_at;
    }

    /**
     * méthode retournant la valeur de la suppression du guide
     * @return int
     */
    public function getDeleted_at(): ?string
    //récupération des valeurs de l'attribut / Getter / et un entier
    {
        return $this->deleted_at;
    }

    /**
     * méthode affectant la valeur de la suppression du guide
     * @param int $id_types
     * 
     */
    public function setDeleted_at(?string $deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }


    /**
     * méthode retournant la valeur des ID de l'utilisateur -> commentaire
     * @return int
     */
    public function getId_users(): int
    {
        return $this->id_users;
    }

    /**
     * méthode affectant la valeur des ID de l'utilisateur -> commentaire
     * @param int $id_users
     * 
     */
    public function setId_users(int $id_users)
    {
        $this->id_users = $id_users;
    }


    public static function get_all(): array
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM `guides`
        INNER JOIN `users` ON `guides`.`id_users` = `users`.`id_users` WHERE `deleted_at` IS NULL;";
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
    public static function get(int $id_guides): object
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `guides` WHERE `id_guides` = :id_guides';
        //  : -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        $sth->bindValue(':id_guides', $id_guides, PDO::PARAM_INT);
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
        $sql = 'INSERT INTO `guides` (`main_title`, `main_text`, `sub_title_1`, `sub_text`, `picture_tier_list`, 
        `title_card_1`, `picture_card_1`, `text_card_1`,
        `title_card_2`, `picture_card_2`, `text_card_2`,
        `title_card_3`, `picture_card_3`, `text_card_3`, `id_users`)
        VALUES (:main_title, :main_text, :sub_title_1, :sub_text, :picture_tier_list,
        :title_card_1, :picture_card_1, :text_card_1,
        :title_card_2, :picture_card_2, :text_card_2,
        :title_card_3, :picture_card_3, :text_card_3, :id_users);';
        //:type -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':main_title', $this->getMain_title());
        $sth->bindValue(':main_text', $this->getMain_text());
        $sth->bindValue(':sub_title_1', $this->getSub_title_1());
        $sth->bindValue(':sub_text', $this->getSub_text());
        $sth->bindValue(':picture_tier_list', $this->getPicture_tier_list());
        $sth->bindValue(':title_card_1', $this->getTitle_card_1());
        $sth->bindValue(':picture_card_1', $this->getPicture_card_1());
        $sth->bindValue(':text_card_1', $this->getText_card_1());
        $sth->bindValue(':title_card_2', $this->getTitle_card_2());
        $sth->bindValue(':picture_card_2', $this->getPicture_card_2());
        $sth->bindValue(':text_card_2', $this->getText_card_2());
        $sth->bindValue(':title_card_3', $this->getTitle_card_3());
        $sth->bindValue(':picture_card_3', $this->getPicture_card_3());
        $sth->bindValue(':text_card_3', $this->getText_card_3());
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
        $sql = 'UPDATE `guides` SET `main_title` = :main_title,
        `main_text` = :main_text,
        `sub_title_1` = :sub_title_1,
        `sub_text` = :sub_text,
        `picture_tier_list` = :picture_tier_list,
        `title_card_1` = :title_card_1,
        `picture_card_1` = :picture_card_1,
        `text_card_1` = :text_card_1,
        `title_card_2` = :title_card_2,
        `picture_card_2` = :picture_card_2,
        `text_card_2` = :text_card_2,
        `title_card_3` = :title_card_3,
        `picture_card_3` = :picture_card_3,
        `text_card_3` = :text_card_3,
        `id_users` = :id_users
        WHERE `id_guides` = :id_guides';
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':main_title', $this->getMain_title());
        $sth->bindValue(':main_text', $this->getMain_text());
        $sth->bindValue(':sub_title_1', $this->getSub_title_1());
        $sth->bindValue(':sub_text', $this->getSub_text());
        $sth->bindValue(':picture_tier_list', $this->getPicture_tier_list());
        $sth->bindValue(':title_card_1', $this->getTitle_card_1());
        $sth->bindValue(':picture_card_1', $this->getPicture_card_1());
        $sth->bindValue(':text_card_1', $this->getText_card_1());
        $sth->bindValue(':title_card_2', $this->getTitle_card_2());
        $sth->bindValue(':picture_card_2', $this->getPicture_card_2());
        $sth->bindValue(':text_card_2', $this->getText_card_2());
        $sth->bindValue(':title_card_3', $this->getTitle_card_3());
        $sth->bindValue(':picture_card_3', $this->getPicture_card_3());
        $sth->bindValue(':text_card_3', $this->getText_card_3());
        $sth->bindValue(':id_users', $this->getId_users(), PDO::PARAM_INT);
        $sth->bindValue(':id_guides', $this->getId_guides(), PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif, PDO::PARAM_STR par defaut
        $sth->execute();
        //la méthode execute retourne un booléen
        return (bool) $sth->rowCount();
        //rowCount renvoi le nombre de ligne envoyé -> renvoi booléen 1, 2, 3 ...
    }

    public static function delete(int $id_guides): bool
    {
        $pdo = Database::connect();
        $sql = 'DELETE FROM `guides` WHERE `id_guides` = :id_guides';
        //:id_guides -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':id_guides', $id_guides, PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif, PDO::PARAM_STR par defaut
        $sth->execute();
        //la méthode execute retourne un booléen
        $nbRows = $sth->rowCount();
        //rowCount retourne le nombre de colonne affecté par la dernière requête SQL
        return $nbRows > 0 ? true : false;
    }
}
