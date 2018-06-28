<?php
/**
 *
 */
namespace Oquiz;
use \AltoRouter;
class Application {
    private $router;
    public $config;
    public function __construct() {
        $this->config = parse_ini_file(__DIR__.'/config.conf');
        $this->router = new AltoRouter();
        $this->router->setBasePath($this->config['BASEPATH']);
        // MainController
        $this->router->map('GET','/','MainController#home', 'main_home' );
        $this->router->map('GET','/faq','MainController#faq', 'main_faq');//TODO
        $this->router->map('GET','/cgu','MainController#cgu', 'main_cgu');//TODO
        //UserController
        $this->router->map('GET|POST','/signup','UserController#signup','user_signup');
        $this->router->map('GET','/login','UserController#login','user_login');
        $this->router->map('POST','/login','UserController#loginPost','user_loginpost');
        $this->router->map('GET','/logout','UserController#logout','user_logout');
        $this->router->map('GET','/profile','UserController#profile','user_profile');
        $this->router->map('GET','/profile/update','UserController#update','user_update');//TODO
        // |_  /quiz/8     page d'un quiz (consulter ou jouer)
        $this->router->map('GET','/quiz/[i:id]','QuizController#show','quiz_show');
        $this->router->map('GET','/quiz/list','QuizController#list','quiz_list');
        $this->router->map('POST','/quiz/[i:id]','QuizController#validate','quiz_validate');

    }
	public function run(){
        $match = $this->router->match();
        // dump($match);
        if ($match !== false) {
            //on fait le dispatch ici
            $tmp = explode('#', $match['target']);
            list($controllerName, $methodName) = $tmp;

            $fqcnControllerName = '\Oquiz\Controllers\\'.$controllerName;
            $controller = new $fqcnControllerName($this);

            $controller->$methodName($match['params']);// c'est les parametres qui sont donné pour les methodes appellées
        }else{
            header("HTTP/1.0 404 Not Found");
            // echo 'perdu !!!!!!!<br />';
            exit;
        }
    }
     // Getter plus précis pour la propriété config
     // Dans le fichier config.conf
    public function getConfig($key) {
        if(array_key_exists($key, $this->config)){
            return $this->config[$key];
        }
        return false;
    }
    public function getRouter(){
        return $this->router;
    }
}
