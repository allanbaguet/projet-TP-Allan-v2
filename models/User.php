<?php

require_once __DIR__ . '/../config/database.php';


class User
{
    //private correspond à la portée des attributs / $----- est un attribut
    private int $id_users;
    private string $username;
    private string $mail;
    private string $password;
    private ?string $picture;
    private ?bool $role;
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

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture)
    {
        $this->picture = $picture;
    }

    public function getRole(): ?bool
    {
        return $this->role;
    }

    public function setRole(?bool $role)
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


    public static function get_all(): array
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM `users` WHERE `deleted_at` IS NULL;";
        $sth = $pdo->query($sql);
        // $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        //fetchAll récupére tout les enregistrements
        //sth -> statements handle
        return $result;
    }

    //méthode permettant de récuperer les infos du formulaire pour les modifiés ensuite
    public static function get(int $id_users): object
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `users` WHERE `id_users` = :id_users';
        //  : -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        $sth->bindValue(':id_users', $id_users, PDO::PARAM_INT);
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
        $sql = "INSERT INTO `users` (`username`, `mail`, `password`)
        VALUES (:username, :mail, :password);";
        //  : -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':username', $this->getUsername());
        $sth->bindValue(':mail', $this->getMail());
        $sth->bindValue(':password', $this->getPassword());
        //bindValue -> affecter une valeur à un marqueur nominatif
        $result = $sth->execute();
        //$result -> se trouve la réponse de la méthode execute
        //la méthode execute retourne un booléen
        //sth -> statements handle
        return $result;
    }

    //Méthode permettant la mise à jour des info utilisateurs
    public function update(): bool
    {
        $pdo = Database::connect();
        $sql = 'UPDATE `users` SET `username` = :username,
        `mail` = :mail,
        `password` = :password,
        `picture` = :picture
        WHERE `id_users` = :id_users';
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':username', $this->getUsername());
        $sth->bindValue(':mail', $this->getMail());
        $sth->bindValue(':password', $this->getPassword());
        $sth->bindValue(':picture', $this->getPicture());
        $sth->bindValue(':id_users', $this->getId_users(), PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif, PDO::PARAM_STR par defaut
        $sth->execute();
        //la méthode execute retourne un booléen
        return (bool) $sth->rowCount();
        //rowCount renvoi le nombre de ligne envoyé -> renvoi booléen 1, 2, 3 ...
    }

    //public static ici car on ne manipule pas de donnée
    public static function archive(int $id_users): bool
    {
        $pdo = Database::connect();
        //SET `deleted_at` = NOW() permet de mettre à jour la colonne deleted_at à l'heure de l'envois à l'archive
        $sql = 'UPDATE `users` SET `deleted_at` = NOW() WHERE `id_users` = :id_users;';
        //:id_types -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':id_users', $id_users, PDO::PARAM_INT);
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
        $sql = "SELECT * FROM `users` WHERE `deleted_at` IS NOT NULL;";
        //requête SQL permettant de joindre la table users et types, et de cibler leur colonne en commun
        //qui est id_types
        $sth = $pdo->query($sql);
        // $sth->bindValue(':order', $order);
        // $sth->execute();
        $userArchived = $sth->fetchAll(PDO::FETCH_OBJ);
        //fetchAll récupére tout les enregistrements
        //sth -> statements handle
        return $userArchived;
    }

    public static function unarchive(int $id_users): bool
    {
        $pdo = Database::connect();
        //SET `deleted_at` = NULL permet de mettre à jour la colonne deleted_at, et la mettre en NULL
        $sql = 'UPDATE `users` SET `deleted_at` = NULL WHERE `id_users` = :id_users';
        //:id_types -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':id_users', $id_users, PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif, PDO::PARAM_STR par defaut
        $sth->execute();
        //la méthode execute retourne un booléen
        $nbRows = $sth->rowCount();
        //rowCount retourne le nombre de colonne affecté par la dernière requête SQL
        return $nbRows > 0 ? true : false;
    }

    //public static ici car on ne manipule pas de donnée
    public static function delete(int $id_users): bool
    {
        $pdo = Database::connect();
        $sql = 'DELETE FROM `users` WHERE `id_users` = :id_users';
        //:id_users -> marqueur nominatif (à utilisé quand une valeur vient de l'extérieur)
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':id_users', $id_users, PDO::PARAM_INT);
        //bindValue -> affecter une valeur à un marqueur nominatif, PDO::PARAM_STR par defaut
        $sth->execute();
        //la méthode execute retourne un booléen
        $nbRows = $sth->rowCount();
        //rowCount retourne le nombre de colonne affecté par la dernière requête SQL
        return $nbRows > 0 ? true : false;
    }

}
