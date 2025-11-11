<?php
require_once __DIR__.'/../models/Usuario.php';
class AuthController {
    private $pdo;
    public function __construct($pdo){ $this->pdo = $pdo; }

    public function login($email, $senha){
        $userModel = new Usuario($this->pdo);
        $user = $userModel->findByEmail($email);
        if($user && password_verify($senha, $user['senha'])){
            // login OK
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nome'];
            return true;
        }
        return false;
    }

    public function logout(){
        session_unset();
        session_destroy();
    }

    public static function check(){
        return isset($_SESSION['user_id']);
    }
}
