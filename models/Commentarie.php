<?php 

require_once __DIR__ . '/../config/database.php';


class Commentarie {
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














}