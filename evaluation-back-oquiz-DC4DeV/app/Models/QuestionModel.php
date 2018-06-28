<?php
namespace Oquiz\Models;
use Oquiz\Database;
use PDO;
class QuestionModel extends CoreModel {
    /**
     * @var int
     */
    private $id_quiz;
    /**
     * @var string
     */
    private $question;
    /**
     * @var string
     */
    private $prop1;
    /**
     * @var string
     */
    private $prop2;
    /**
     * @var string
     */
    private $prop3;
    /**
     * @var string
     */
    private $prop4;
    /**
     * @var int
     */
    private $id_level;
    /**
     * @var int
     */
    private $anecdote;
    /**
     * @var int
     */
    private $wiki;

    private $allProp;


    // nom de la table, sous forme de constante
    const TABLE_NAME = 'questions';

 public static function findAllByQuizId($quizId) {
    $sql = '
            SELECT questions.*
            FROM quizzes
            INNER JOIN questions ON quizzes.id = questions.id_quiz
            WHERE quizzes.id = :quizId
    ';
    // Je prépare ma requête
    $pdoStatement = Database::getPDO()->prepare($sql);

    // Je fais mes "binds"
    $pdoStatement->bindValue(':quizId', $quizId, PDO::PARAM_INT);

    // Exécution de la requête
    $pdoStatement->execute();

    // Je récupère les résultats sous forme de tableau d'objets
    $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

    QuestionModel::randomise($results);

    return $results;
    }

    public function randomise($results){
        foreach ($results as $result) {
            $temp = [$result->prop1, $result->prop2, $result->prop3, $result->prop4];
            shuffle($temp);
            $result->allProp = $temp;
            }
        return $results;
    }

    // *** GETTERS & SETTERS ***
    /**
     * Get the value of Question
     *
     * @return string
     */
    public function getQuestion() {
        return $this->question;
    }

    /**
     * Get the Proposition list
     *
     * @return string
     */
    public function getAllProp() {
        return $this->allProp;
    }
    /**
     * Get the Proposition list
     *
     * @return string
     */
    public function getSoluce() {
        return $this->prop1;
    }
    /**
     * Get the Proposition list
     *
     * @return string
     */
    public function getProp1() {
        return $this->allProp[0];
    }
    /**
     * @return string
     */

    public function getProp2() {
        return $this->allProp[1];
    }
    /**
     * Get the Proposition list
     *
     * @return string
     */
    public function getProp3() {
        return $this->allProp[2];
    }
    /**
     * Get the Proposition list
     *
     * @return string
     */
    public function getProp4() {
        return $this->allProp[3];
    }

    public function getLevel(){

        if($this->id_level == 1){
            return 'debutant';
        }
        if($this->id_level == 2){
            return 'confirme';
        }
        if($this->id_level == 3){
            return 'expert';
        }
    }

    public function getAnecdote(){
        return $this->anecdote;
    }
    public function getWiki(){
        return $this->wiki;
    }
    public function getQuiz(){
        return $this->id_quiz;
    }



}
