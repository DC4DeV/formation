<?php

namespace Oquiz\Controllers;

use Oquiz\Models\UserModel;
use Oquiz\Utils\User;
use Oquiz\Models\QuizModel;

class UserController extends CoreController {

    public function login() {
        // On sauvegarde la liste des erreurs dans un tableau
       // J'affiche le rendu de ma template
       echo $this->templates->render('user/login', [
       ]);
    }

    public function loginPost() {
       // On sauvegarde la liste des erreurs dans un tableau
       $errorList = array();

       // Je récupère les données
       $email = isset($_POST['email']) ? trim($_POST['email']) : '';
       $password = isset($_POST['password']) ? trim($_POST['password']) : '';

       $email = htmlentities($email); // encode les caractères HTML
       $password = htmlentities($password);

       // Je valide les données
       if (empty($email)) {
           $errorList[] = 'L\'adresse email doit être renseignée';
       }
       // Vérfification par un filtre de PHP que l'email est correct
       if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
           $errorList[] = 'L\'adresse email n\'est pas correcte';
       }
       if (empty($password)) {
           $errorList[] = 'Le mot de passe doit être renseigné';
       }

       // Si tout est ok (aucune erreur)
       if (count($errorList) == 0) {
           // Je récupère le user correspondant au mot de passe
           // la méthode renvoie false si aucun résultat
           $userModel = UserModel::findByEmail($email);

           // Si j'ai un résultat sous forme d'objet
           if ($userModel !== false) {
               // Alors je test le mot de passe
               if (password_verify($password, $userModel->getPassword())) {
                   //Appel de la fonction qui convertira notre objet
                   User::setUser($userModel);
                   $this->sendJSON([
                       'code' => 1,
                       'url' => $this->router->generate('main_home')
                   ]);
               }
               else {
                   $errorList[] = 'Le mot de passe est incorrect pour cet email';
               }
           }
           else {
               $errorList[] = 'Aucun compte n\'a été trouvé pour cet email';
           }
       }

       $_SESSION['user'] = $userModel;

       $this->sendJSON([
           'code' => 2,
           'errorList' => $errorList
       ]);
   }

    public function logout(){
        // On doit être connecté pour se déconnecter
       if (User::isConnected()) {
           // On appelle la méthode de la librairie User, permettant de déconnecter
           User::logout();

           // Puis je redirige vers la home
           $this->redirectToRoute('main_home');
       }
       else {
           // Utilisateur non connecté => redirection vers la page de connexion
           $this->redirectToRoute('user_login');
       }

    }

    public function profile(){
        if (User::isConnected()){
            $connectedUser = User::getUser();
            $userModel = UserModel::find($connectedUser->getId());

            $quizList =$this->templates->addData([

               'quizList' => QuizModel::findAllByUserId($userModel->getId())

           ]);

            echo $this->templates->render('user/profile', [
                'userModel' => $userModel,
            ]);
        }
        else {
            $this->redirectToRoute('user_login');
        }


    }
    public function update(){

        echo $this->templates->render('user/profil');
        echo 'Page User update';

    }
    public function signup(){
        // On sauvegarde la liste des erreurs dans un tableau
        $errorList = array();

        if (!empty($_POST)) {
            // Je récupère les données

            $firstname = isset($_POST['firstname']) ? trim($_POST['firstname']) : '';
            $lastname = isset($_POST['lastname']) ? trim($_POST['lastname']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $password = isset($_POST['password']) ? trim($_POST['password']) : '';
            $confirmPassword = isset($_POST['confirmPassword']) ? trim($_POST['confirmPassword']) : '';

            // Traiter les données
            $firstname = htmlentities($firstname); // encode les caractères HTML
            $lastname = htmlentities($lastname); // encode les caractères HTML
            // $username = htmlentities($username); // encode les caractères HTML
            // Je valide les données
            if (empty($firstname)) {
                $errorList[] = 'Le Prenom doit être renseigné';
            }
            if (empty($lastname)) {
                $errorList[] = 'Le Nom doit être renseigné';
            }
            if (empty($email)) {
                $errorList[] = 'L\'adresse email doit être renseignée';
            }
            // Vérfification par un filtre de PHP que l'email est correct
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $errorList[] = 'L\'adresse email n\'est pas correcte';
            }
            if (empty($password)) {
                $errorList[] = 'Le mot de passe doit être renseigné';
            }
            if ($password != $confirmPassword) {
                $errorList[] = 'Les 2 mots de passe doivent être égaux';
            }
            if (strlen($password) < 8) {
                $errorList[] = 'Le mot de passe doit faire au moins 8 caractères';
            }
            // Si tout est ok (aucune erreur)
           if (count($errorList) == 0) {
               // TODO vérifier que username n'existe pas déjà
               // TODO vérifier que email n'existe pas déjà

               // J'encode, je hash le mot de passe avant de le stocker en DB
               $hash = password_hash($password, PASSWORD_DEFAULT);

               // Pour sauvegarder en DB, je dois d'abord créer le Model
               $userModel = new UserModel();
               // Puis donner une valeur à chaque propriété (besoin des setters)
               $userModel->setFirstname($firstname);
               $userModel->setLastname($lastname);
               $userModel->setEmail($email);
               $userModel->setPassword($hash);


               // Je peux sauvegarder le model
               $insertedRows = $userModel->save();

               if ($insertedRows > 0) {
                   // Je peux rediriger
                   echo $this->templates->render('user/login');
                   die();
               }
               else {
                   $errorList[] = 'L\'adresse mail est deja presente dans la base';
               }
           }
        }
        //Si il y a des erreurs je les envois a ma vue
        echo $this->templates->render('user/signup', [
            'errorList' => $errorList
        ]);


    }
}
