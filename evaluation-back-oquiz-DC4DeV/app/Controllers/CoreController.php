<?php
namespace Oquiz\Controllers;
// Classe "coeur" des Controllers
// sera héritée par les controllers pour hériter :
//  - de ses propriétés
//  - de ses méthodes
use Oquiz\Utils\User;
use Oquiz\Models\QuizModel;
abstract class CoreController {

    protected $templates;
    protected $router;

    public function __construct($app) {

        $this->templates = new \League\Plates\Engine(__DIR__.'/../Views');

        $this->router = $app->getRouter();

        $this->templates->addData([
           'title' => 'O\'quiz', // => $title
           'basePath' => $app->getConfig('BASEPATH').'/',
           'router' => $this->router,
           'connectedUser' => User::getUser(),
           'quizList' => QuizModel::quizList()
       ]);
    }


    public function sendJSON($data) {
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
        exit;
    }
    // Méthode permettant de rediriger vers une URL passée en paramètre
    public function redirect($url) {
        header('Location: '.$url);
        exit;
    }

    // Méthode permettant de rediriger vers une route de l'application
    public function redirectToRoute($routeName, $params=array()) {
        $this->redirect($this->router->generate($routeName, $params));
    }
  }
