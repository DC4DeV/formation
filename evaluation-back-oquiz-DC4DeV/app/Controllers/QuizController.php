<?php

namespace Oquiz\Controllers;

use Oquiz\Models\QuizModel;
use Oquiz\Models\QuestionModel;
use Oquiz\Models\CoreModel;
use Oquiz\Utils\User;



class QuizController extends CoreController
{
    // Affichage du quiz
    public function show($allParams){
        $id = (int)$allParams['id'];
        $quizModel = QuizModel::find($id);
        $questions = QuestionModel::findAllByQuizId($id);
        //pour l affichage du quiz on verifie si l utilisateur est connecter ou non
        if(User::isConnected() !== false){
            // connecte => redirection template show_game
            echo $this->templates->render('quiz/show_game',[
                'quizId' => $id,
                'currentQuiz' => $quizModel,
                'questions' => $questions,

            ]);
        }
        // non connecte => redirection template show
        else{
            echo $this->templates->render('quiz/show',[
                'quizId' => $id,
                'currentQuiz' => $quizModel,
                'questions' => $questions,

            ]);
        }

    }


    public function find($id){
        $quiz = QuizModel::find($id);
        return $quiz;
    }

    public function validate(){

        $return = array();
        //petit passement de jambes pour recuperer l 'id d une question (pas le must)
        $id = array_keys($_POST);
        $id = $id[0];
        // range POST dans un tableau
        $data = $_POST;
        // recupere une question grace a son id ,
        $catchId = QuestionModel::find($id);
        // pour ensuite recupere l id du quiz en le donnant en parametre
        // de la fonction qui recuperera le QuestionModel
        $questions = QuestionModel::findAllByQuizId($catchId->getQuiz());

        $i = 0;
        // decomposition du model du QuestionModel en question
        foreach ($questions as $question) {
            if(empty($data[$question->getId()])){
                // Aucune valeur pour les reponses nulle
                $return[$i] = [
                    'notset',
                    $question->getId()
                ];
                $i++;
            }

            else if($question->getSoluce() != $data[$question->getId()]) {
                //assigne les valeurs pour une reponse fausse
                $return[$i] = [
                    'wrong',
                    $question->getId(),
                    $question->getAnecdote(),
                    $question->getWiki(),
                    $question->getSoluce(),
                    $data[$question->getId()]
                ];
                $i++;


            }else{
                //assigne les valeurs pour une reponse juste
                $return[$i] = [
                    'right',
                    $question->getId(),
                    $question->getAnecdote(),
                    $question->getWiki(),
                    $question->getSoluce(),
                    $data[$question->getId()]
                ];
                $i++;
            }

        }
        //requete donne au front
        $this->sendJSON([
       'id' => $id,
       'code' => 1,
       'return' => $return
        ]);

    }

    public function update(){

        echo 'page Update';
    }
    public function delete(){

        echo 'page Delete';
    }

}
