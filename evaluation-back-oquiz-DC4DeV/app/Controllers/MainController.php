<?php
// ce script se situe dans le namespace Oquiz dossier Controllers
namespace Oquiz\Controllers;
// instanciation des modeles
use Oquiz\Models\QuizModel;
// Code du controlleur
class MainController extends CoreController{
  public function home(){

      echo $this->templates->render('main/home');
  }
  //TODO page faq et CGU
}
