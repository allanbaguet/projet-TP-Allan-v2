<?php

require_once __DIR__ . '/../config/database.php';


class Commentarie
{
    //private correspond à la portée des attributs / $----- est un attribut
    private int $id_comments;
    private string $text;
    private DateTime $posted_at;
    private string $modified_at;
    private ?string $deleted_at;
    private ?string $confirmed_at;
    //?string -> rend l'attribut null
    private int $id_guides;
    private int $id_dungeons;
    private int $id_users;

    public function getId_comments(): int
    {
        return $this->id_comments;
    }

    public function setId_comments(int $id_comments)
    {
        $this->id_comments = $id_comments;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text)
    {
        $this->text = $text;
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

    public function getDeleted_at(): string
    {
        return $this->deleted_at;
    }

    public function setDeleted_at(string $deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }

    public function getConfirmed_at(): string
    {
        return $this->confirmed_at;
    }

    public function setConfirmed_at(string $confirmed_at)
    {
        $this->confirmed_at = $confirmed_at;
    }

    /**
     * méthode retournant la valeur des ID des commentaire des guides
     * @return int
     */
    public function getId_guides(): int
    {
        return $this->id_guides;
    }

    /**
     * méthode affectant la valeur des ID des commentaire des guides
     * @param int $id_guides
     * 
     */
    public function setId_guides(int $id_guides)
    {
        $this->id_guides = $id_guides;
    }

    /**
     * méthode retournant la valeur des ID des commentaire des donjons
     * @return int
     */
    public function getId_dungeons(): int
    {
        return $this->id_dungeons;
    }

    /**
     * méthode affectant la valeur des ID des commentaire des donjons
     * @param int $id_dungeons
     * 
     */
    public function setId_dungeons(int $id_dungeons)
    {
        $this->id_dungeons = $id_dungeons;
    }

    /**
     * méthode retournant la valeur des ID des commentaire lié à un utilisateur
     * @return int
     */
    public function getId_users(): int
    {
        return $this->id_users;
    }

    /**
     * méthode affectant la valeur des ID des commentaire lié à un utilisateur
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
        $sql = "SELECT * FROM `commentaries`
        -- INNER JOIN `guides` ON `commentaries`.`id_guides` = `guides`.`id_guides`
        INNER JOIN `users` ON `commentaries`.`id_users` = `users`.`id_users`
        WHERE `commentaries`.`deleted_at` IS NULL AND `commentaries`.`confirmed_at` IS NOT NULL;";
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

    //methode permettant de récupérer les commentaires des guides relié à leur ID précis
    public static function getGuideComments(int $id_guides): array
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM `commentaries`
            INNER JOIN `guides` ON `commentaries`.`id_guides` = `guides`.`id_guides`
            INNER JOIN `users` ON `commentaries`.`id_users` = `users`.`id_users`
            WHERE `commentaries`.`deleted_at` IS NULL 
            AND `commentaries`.`confirmed_at` IS NOT NULL
            AND `guides`.`id_guides` = :id_guides";

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_guides', $id_guides, PDO::PARAM_INT);
        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    //methode permettant de récupérer les commentaires des donjons relié à leur ID précis
    public static function getDungeonComments(int $id_dungeons): array
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM `commentaries`
            INNER JOIN `dungeons` ON `commentaries`.`id_dungeons` = `dungeons`.`id_dungeons`
            INNER JOIN `users` ON `commentaries`.`id_users` = `users`.`id_users`
            WHERE `commentaries`.`deleted_at` IS NULL 
            AND `commentaries`.`confirmed_at` IS NOT NULL
            AND `dungeons`.`id_dungeons` = :id_dungeons";

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_dungeons', $id_dungeons, PDO::PARAM_INT);
        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    //méthode permettant de récuperer les id des commentaires pour les affiché
    public static function get(int $id_comments): object
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `commentaries` WHERE `id_comments` = :id_comments';
        //  : -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        $sth->bindValue(':id_comments', $id_comments, PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif 
        //PDO::PARAM_INT -> permet de typer la valeur de retour (ici en INT) par défaut en string
        $sth->execute();
        //la méthode execute retourne un booléen
        $result = $sth->fetch();
        //fetch récupére le premier enregistrement
        //sth -> statements handle
        return $result;
    }

    public function insertDungeon(): bool
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `commentaries` (`text`,`id_dungeons`, `id_users`)
        VALUES (:text, :id_dungeons, :id_users);';
        //  : -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':text', $this->getText());
        // $sth->bindValue(':id_guides', $this->getId_guides(), PDO::PARAM_INT);
        $sth->bindValue(':id_dungeons', $this->getId_dungeons(), PDO::PARAM_INT);
        $sth->bindValue(':id_users', $this->getId_users(), PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif
        $result = $sth->execute();
        //$result -> se trouve la réponse de la méthode execute
        //la méthode execute retourne un booléen
        //sth -> statements handle
        return $result;
    }

    public function insertGuide(): bool
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `commentaries` (`text`, `id_guides`, `id_users`)
        VALUES (:text, :id_guides, :id_users);';
        //  : -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':text', $this->getText());
        $sth->bindValue(':id_guides', $this->getId_guides(), PDO::PARAM_INT);
        // $sth->bindValue(':id_dungeons', $this->getId_dungeons(), PDO::PARAM_INT);
        $sth->bindValue(':id_users', $this->getId_users(), PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif
        $result = $sth->execute();
        //$result -> se trouve la réponse de la méthode execute
        //la méthode execute retourne un booléen
        //sth -> statements handle
        return $result;
    }
    // INSERT INTO `commentaries` (`text`, `id_guides`, `id_users`)
    //     VALUES ('test', '7', '8');

    //Méthode permettant la mise à jour les commentaires
    public function update(): bool
    {
        $pdo = Database::connect();
        $sql = 'UPDATE `commentaries` SET `text` = :text,
        `id_guides` = :id_guides,
        `id_dungeons` = :id_dungeons,
        `id_users` = :id_users 
        WHERE `id_comments` = :id_comments';
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':text', $this->getText());
        $sth->bindValue(':id_guides', $this->getId_guides(), PDO::PARAM_INT);
        $sth->bindValue(':id_dungeons', $this->getId_dungeons(), PDO::PARAM_INT);
        $sth->bindValue(':id_users', $this->getId_users(), PDO::PARAM_INT);
        $sth->bindValue(':id_comments', $this->getId_comments(), PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif, PDO::PARAM_STR par defaut
        $sth->execute();
        //la méthode execute retourne un booléen
        return (bool) $sth->rowCount();
        //rowCount renvoi le nombre de ligne envoyé -> renvoi booléen 1, 2, 3 ...
    }

    //public static ici car on ne manipule pas de donnée
    public static function archive(int $id_comments): bool
    {
        $pdo = Database::connect();
        //SET `deleted_at` = NOW() permet de mettre à jour la colonne deleted_at à l'heure de l'envois à l'archive
        $sql = 'UPDATE `commentaries` SET `deleted_at` = NOW() WHERE `id_comments` = :id_comments;';
        //:id_types -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':id_comments', $id_comments, PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif, PDO::PARAM_STR par defaut
        $sth->execute();
        //la méthode execute retourne un booléen
        $nbRows = $sth->rowCount();
        //rowCount retourne le nombre de colonne affecté par la dernière requête SQL
        return $nbRows > 0 ? true : false;
    }

    public static function get_archive(): array
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM `commentaries`
        INNER JOIN `users` ON `commentaries`.`id_users` = `users`.`id_users`
        WHERE `commentaries`.`deleted_at` IS NOT NULL;";
        //requête SQL permettant de joindre la table users et types, et de cibler leur colonne en commun
        //qui est id_types
        $sth = $pdo->query($sql);
        // $sth->bindValue(':order', $order);
        // $sth->execute();
        $commentarieArchived = $sth->fetchAll(PDO::FETCH_OBJ);
        //fetchAll récupére tout les enregistrements
        //sth -> statements handle
        return $commentarieArchived;
    }

    public static function unarchive(int $id_comments): bool
    {
        $pdo = Database::connect();
        //SET `deleted_at` = NULL permet de mettre à jour la colonne deleted_at, et la mettre en NULL
        $sql = 'UPDATE `commentaries` SET `deleted_at` = NULL WHERE `id_comments` = :id_comments';
        //:id_types -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':id_comments', $id_comments, PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif, PDO::PARAM_STR par defaut
        $sth->execute();
        //la méthode execute retourne un booléen
        $nbRows = $sth->rowCount();
        //rowCount retourne le nombre de colonne affecté par la dernière requête SQL
        return $nbRows > 0 ? true : false;
    }


    public static function delete(int $id_comments): bool
    {
        $pdo = Database::connect();
        $sql = 'DELETE FROM `commentaries` WHERE `id_comments` = :id_comments';
        //:id_guides -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':id_comments', $id_comments, PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif, PDO::PARAM_STR par defaut
        $sth->execute();
        //la méthode execute retourne un booléen
        $nbRows = $sth->rowCount();
        //rowCount retourne le nombre de colonne affecté par la dernière requête SQL
        return $nbRows > 0 ? true : false;
    }


    //public static ici car on ne manipule pas de donnée
    public static function confirm(int $id_comments): bool
    {
        $pdo = Database::connect();
        //SET `deleted_at` = NOW() permet de mettre à jour la colonne deleted_at à l'heure de l'envois à l'archive
        $sql = "UPDATE `commentaries` SET `confirmed_at` = NOW() WHERE `id_comments` = :id_comments;";
        //:id_types -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':id_comments', $id_comments, PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif, PDO::PARAM_STR par defaut
        $sth->execute();
        //la méthode execute retourne un booléen
        $nbRows = $sth->rowCount();
        //rowCount retourne le nombre de colonne affecté par la dernière requête SQL
        return $nbRows > 0 ? true : false;
    }


    public static function toConfirm(): array
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM `commentaries`
        INNER JOIN `users` ON `commentaries`.`id_users` = `users`.`id_users`
        WHERE `commentaries`.`confirmed_at` IS NULL;";
        //requête SQL permettant de joindre la table users et types, et de cibler leur colonne en commun
        //qui est id_types
        $sth = $pdo->query($sql);
        // $sth->bindValue(':order', $order);
        // $sth->execute();
        $commentarieConfirm = $sth->fetchAll(PDO::FETCH_OBJ);
        //fetchAll récupére tout les enregistrements
        //sth -> statements handle
        return $commentarieConfirm;
    }
}
