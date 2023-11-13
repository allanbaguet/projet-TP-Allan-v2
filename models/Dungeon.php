<?php 

require_once __DIR__ . '/../config/database.php';


class Dungeon {
    //private correspond à la portée des attributs / $----- est un attribut
    private int $id_dungeons;
    private string $main_title;
    private string $main_text;
    private string $picture;
    private string $description;
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

    public function getMain_text(): string
    {
        return $this->main_text;
    }

    public function setMain_text(string $main_text)
    {
        $this->main_text = $main_text;
    }

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function setPicture(string $picture)
    {
        $this->picture = $picture;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
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
        $sql = "INSERT INTO `dungeons` (`main_title`, `main_text`, `picture`, `description`, `id_users`)
        VALUES (:main_title, :main_text, :picture, :description, :id_users);";
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
        $sql = "UPDATE `dungeons` SET `main_title` = :main_title,
        `main_text` = :main_text,
        `picture` = :picture,
        `description` = :description,
        `id_users` = :id_users
        WHERE `id_dungeons` = :id_dungeons";
        $sth = $pdo->prepare($sql);
        //prepare -> éxecute la requête et protège d'injection SQL
        //prepare / bindValue -> méthode appartenant à un PDOStatement
        $sth->bindValue(':main_title', $this->getMain_title());
        $sth->bindValue(':main_text', $this->getMain_text());
        $sth->bindValue(':picture', $this->getPicture());
        $sth->bindValue(':description', $this->getDescription());
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

    //définit le paramètre d'url par défaut à 0 -> affichage de toute les catégories
    public static function get_all_dungeon($search = ''): array
    {
        // Offset 0 = page 1 / Offset 10 = page 2 / Offset 20 = page 3 ...
        // $limit = NB_PER_PAGE;
        // $offset = ($page - 1) * $limit;
        $pdo = Database::connect();
        $sql = "SELECT * FROM `dungeons`
        INNER JOIN `users` ON `dungeons`.`id_users` = `users`.`id_users` WHERE `deleted_at` IS NULL;";

        // Condition si différent de 0 -> entre dans la condition et concatène la requête SQL et
        // sélectionne l'id_types de la table vehicles
        // if ($id_types != 0) {
        //     $sql .= " AND `vehicles`.`id_types` = :id_types";
        // }

        if (!empty($search)) {
            $sql .= " AND (`dungeons`.`main_title` LIKE :search)";
        }

        // if ($countAll == false) {
        //     $sql .= " LIMIT :limit OFFSET :offset";
        // }

        $sth = $pdo->prepare($sql);

        // Condition comme ci-dessus, si différent de 0, bindValue de l'id_types car marqueur nominatif
        // que si on rentre dans la condition ci-dessus
        // if ($id_types != 0) {
        //     $sth->bindValue(':id_types', $id_types, PDO::PARAM_INT);
        // }

        if (!empty($search)) {
            $sth->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        }

        // if ($countAll == false) {
        //     $sth->bindValue(':offset', $offset, PDO::PARAM_INT);
        //     $sth->bindValue(':limit', NB_PER_PAGE, PDO::PARAM_INT);
        // }

        $sth->execute();

        // La méthode execute retourne un booléen
        $dungeonList = $sth->fetchAll(PDO::FETCH_OBJ);

        // fetchAll récupère tous les enregistrements
        return $dungeonList;
    }



















}