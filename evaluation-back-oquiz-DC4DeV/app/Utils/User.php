<?php
namespace Oquiz\Utils;

class User {
  public static function isConnected() {
      return !empty($_SESSION['user']);
  }
  public static function getUser() {
      if (self::isConnected()){
          return $_SESSION['user'];
      }
      return false;
  }

  public static function setUser($userModel) {
     if (is_object($userModel)) {
         //conversion de cet objet
         $_SESSION['user'] = $userModel;
     }
 }

  public static function logout() {
      // Je supprime uniquement la variable user qui me sert pour la connexion
      unset($_SESSION['user']);

  }
}
