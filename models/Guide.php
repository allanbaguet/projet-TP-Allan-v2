<?php

require_once __DIR__ . '/../config/database.php';


class Guide
{
    //private correspond à la portée des attributs / $----- est un attribut
    private int $id_guides;
    private string $main_title;
    private string $main_text;
    private string $picture;
    private string $description;
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
     * méthode retournant la valeur de l'image
     * @return string
     */
    public function getPicture(): string
    {
        return $this->picture;
    }

    /**
     * méthode affectant la valeur de l'image
     * @param string $enddate
     */
    public function setPicture(string $picture)
    {
        $this->picture = $picture;
    }


    /**
     * méthode retournant la valeur de la description
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * méthode affectant la valeur de la description
     * @param string $enddate
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
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
        $sql = 'INSERT INTO `guides` (`main_title`, `main_text`, `picture`, `description`,`id_users`)
        VALUES (:main_title, :main_text, :picture, :description, :id_users);';
        //:type -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':main_title', $this->getMain_title());
        $sth->bindValue(':main_text', $this->getMain_text());
        $sth->bindValue(':picture', $this->getPicture());
        $sth->bindValue(':description', $this->getDescription());
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
        `picture` = :picture,
        `description` = :description
        -- `id_users` = :id_users 
        WHERE `id_guides` = :id_guides';
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':main_title', $this->getMain_title());
        $sth->bindValue(':main_text', $this->getMain_text());
        $sth->bindValue(':picture', $this->getPicture());
        $sth->bindValue(':description', $this->getDescription());
        // $sth->bindValue(':id_users', $this->getId_users(), PDO::PARAM_INT);
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
