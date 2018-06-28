<?php
namespace Oquiz\Models;
use Oquiz\Database;
use PDO;
class QuizModel extends CoreModel {
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $id_author;

    // nom de la table, sous forme de constante
    const TABLE_NAME = 'quizzes';

    protected  function insert() {
        $sql = '
            INSERT INTO '.self::TABLE_NAME.'
            (`title`, `description`, `id_author`)
            VALUES
            (:title,:description,:id_author)
        ';
        // Je prépare
        $pdoStatement = Database::getPDO()->prepare($sql);

        // Je "bind"
        $pdoStatement->bindValue(':title', $this->title, PDO::PARAM_STR);
        $pdoStatement->bindValue(':description', $this->description, PDO::PARAM_STR);
        $pdoStatement->bindValue(':id_author', $this->id_author, PDO::PARAM_INT);

        // J'exécute la requete
        $affectedRows = $pdoStatement->execute();

        // Je récupère l'id auto-incrémenté
        // et je l'affecte à la propriété id
        $this->id = Database::getPDO()->lastInsertId();

        return $affectedRows;
    }
    protected  function update() {

        $sql = '
            UPDATE '.self::TABLE_NAME.'
            SET `first_name` = :first_name,
            `description` = :description,

            WHERE id = :id
        ';
        // Je prépare
        $pdoStatement = Database::getPDO()->prepare($sql);
        // Je "bind"
        $pdoStatement->bindValue(':title', $this->title, PDO::PARAM_STR);
        $pdoStatement->bindValue(':description', $this->description, PDO::PARAM_STR);
        $pdoStatement->bindValue(':id_author', $this->id_author, PDO::PARAM_STR);

        $affectedRows = $pdoStatement->execute();

        // Je récupère l'id auto-incrémenté
        // et je l'affecte à la propriété id
        $this->id = Database::getPDO()->lastInsertId();

        return $affectedRows;
    }

    public function quizList() {

     $sql = '
            SELECT quizzes.*, users.first_name, users.last_name
            FROM quizzes
            INNER JOIN users ON users.id = quizzes.id_author';
     // Je prépare ma requête
     $pdoStatement = Database::getPDO()->prepare($sql);

     // Exécution de la requête
     $pdoStatement->execute();

     // Je récupère les résultats sous forme de tableau d'objets
     $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, static::class);

     return $results;

 }
 public static function findAllByUserId($userId) {
    $sql = '
            SELECT quizzes.*, users.first_name, users.last_name
            FROM users
            INNER JOIN quizzes ON users.id = quizzes.id_author
            WHERE users.id = :userId
    ';
    // Je prépare ma requête
    $pdoStatement = Database::getPDO()->prepare($sql);

    // Je fais mes "binds"
    $pdoStatement->bindValue(':userId', $userId, PDO::PARAM_INT);

    // Exécution de la requête
    $pdoStatement->execute();

    // Je récupère les résultats sous forme de tableau d'objets
    $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
    return $results;
}

    // *** GETTERS & SETTERS ***
    /**
     * Get the value of title
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }
    /**
     * Set the value of title
     *
     * @param string title
     */
    public function setTitle($title) {
        if (!empty($title)) {
            $this->title = $title;
        }
    }
    /**
     * Set the description
     *
     * @return string description
     */
    public function getDescription() {
        return $this->description;
    }
    /**
     * Set the description
     *
     * @param string description
     */
    public function setDescription($description) {
        if (!empty($description)) {
            $this->description = $description;
        }
    }
    /**
     * Set the $author
     *
     * @return int author
     */
    public function getAuthor() {
        return $this->id_author;
    }
    /**
     * Set the author
     *
     * @param int
     */
    public function setAuthor($author) {
        if (!empty($author)) {
            $this->id_author = $author;
        }
    }

}
