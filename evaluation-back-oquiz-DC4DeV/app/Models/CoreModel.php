<?php
namespace Oquiz\Models;
use Oquiz\Database;
use PDO;
// abstract = Classe abstraite
// => interdiction d'instancier cette classe
abstract class CoreModel {

    /**
     * @var int
     */
    protected $id;

    public function save() {
      // Si on a un id => alors la ligne existe dans la table
      // => on met à jour
      if ($this->id > 0) {
        $retour = $this->update();
        return $retour;
      }
      // Sinon, la ligne n'existe pas dans la table
      // => on insère dans la table
      else {
        return $this->insert();
      }
    }

    public static function findAll() {

        $sql = "
            SELECT *
            FROM ".static::TABLE_NAME."
        ";
        // Utilisation de notre classe Database pour se connecter à la database
        $pdo = Database::getPDO();
        // exécution de la requête
        $pdoStatement = $pdo->query($sql);
        // Je veux récupérer tous les résultats sous forme de tableau d'objet CommunityModel
        // on doit préciser le FQCN de la classe
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, static::class);
        // dump($results);
        // On retourne les résultats
        return $results;
    }

    public function find($id) {
        $sql = '
            SELECT *
            FROM '.static::TABLE_NAME.'
            WHERE id = :id
        ';
        // Je prépare
        $pdo = Database::getPDO();
        // exécution de la requête
        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        // J'exécute ma requête
        $pdoStatement->execute();
        // on doit préciser le FQCN de la classe
        $results = $pdoStatement->fetchObject(static::class);
        // On retourne les résultats
        return $results;
    }

    public function delete(){
        $sql = "
            DELETE FROM ".static::TABLE_NAME."
            WHERE id = {$this->id}
          ";
          // Je prépare ma requête
          $pdoStatement = Database::getPDO()->prepare($sql);

          // Je "bind" les données/token/jeton de ma requête
          $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);

          // J'exécute ma requête
          $affectedRows = $pdoStatement->execute();

          return $affectedRows;

    }

    /**
     * Get the value of Id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }


}
