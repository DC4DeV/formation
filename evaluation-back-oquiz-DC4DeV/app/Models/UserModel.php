<?php
namespace Oquiz\Models;
use Oquiz\Database;
use PDO;
class UserModel extends CoreModel {
    /**
     * @var string
     */
    private $first_name;
    /**
     * @var string
     */
    private $last_name;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $password;

        // nom de la table, sous forme de constante
    const TABLE_NAME = 'users';

    // Méthode permettant de gérer la sauvegarde en BDD
    // elle va détecter seul si elle insère ou met à jour


    protected  function insert() {
        $sql = '
            INSERT INTO '.self::TABLE_NAME.'
            (`first_name`, `last_name`, `email`, `password`)
            VALUES
            (:firstname,:lastname,:email,:password)
        ';
        // Je prépare
        $pdoStatement = Database::getPDO()->prepare($sql);
        // Je "bind"
        $pdoStatement->bindValue(':firstname', $this->first_name, PDO::PARAM_STR);
        $pdoStatement->bindValue(':lastname', $this->last_name, PDO::PARAM_STR);
        $pdoStatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $pdoStatement->bindValue(':password', $this->password, PDO::PARAM_STR);

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
            SET `first_name` = :firstname,
            `last_name` = :lastname,
            `email` = :email,
            `password` = :password,
            WHERE id = :id
        ';
        // Je prépare
        $pdoStatement = Database::getPDO()->prepare($sql);

        // Je "bind"
        $pdoStatement->bindValue(':firstname', $this->first_name , PDO::PARAM_STR);
        $pdoStatement->bindValue(':lastname', $this->last_name, PDO::PARAM_STR);
        $pdoStatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $pdoStatement->bindValue(':password', $this->password, PDO::PARAM_STR);

        $affectedRows = $pdoStatement->execute();

        // Je récupère l'id auto-incrémenté
        // et je l'affecte à la propriété id
        $this->id = Database::getPDO()->lastInsertId();

        return $affectedRows;
    }

    public static function findByEmail($email) {
            $sql = '
                SELECT *
                FROM '.self::TABLE_NAME.'
                WHERE email = :email
                LIMIT 1
            ';

            $pdoStatement = Database::getPDO()->prepare($sql);

            $pdoStatement->bindValue(':email', $email, PDO::PARAM_STR);

            $pdoStatement->execute();

            // JE n'ai qu'un résultat => fetchObject
            $result = $pdoStatement->fetchObject(self::class);
            return $result;

    }

    public function getQuiz() {
       return QuizModel::findAllByUserId($this->id);
    }


    // *** GETTERS & SETTERS ***
    /**
     * Get the value of firstname
     *
     * @return string
     */
    public function getFirstname() {
        return $this->first_name;
    }
    /**
     * Set the value of firstname
     *
     * @param string firstname
     */
    public function setFirstname($name) {
        if (!empty($name)) {
            $this->first_name = $name;
        }
    }

    /**
     * Set the lastname
     *
     * @return string lastname
     */
    public function getLastname() {
        return $this->last_name;
    }
    /**
     * Set the lastname
     *
     * @param string lastname
     */
    public function setLastname($lastname) {
        if (!empty($lastname)) {
            $this->last_name = $lastname;
        }
    }
    /**
     * Get the mail
     *
     * @return string mail
     */
    public function getEmail() {
        return $this->email;
    }
    /**
     * Set the Mail
     *
     * @param string mail
     */
    public function setEmail($mail) {
        if (!empty($mail)) {
            $this->email = $mail;
        }
    }
    /**
     * Get the value of PassWord
     *
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }
    /**
     * Set the value of password
     *
     * @param string password
     */
    public function setPassword($password) {
        if (!empty($password)) {
            $this->password = $password;
        }
    }


}
