<?php
class Usuario {
    private $pdo;
    public function __construct($pdo){ $this->pdo = $pdo; }

    public function findByEmail($email){
        $stmt = $this->pdo->prepare('SELECT * FROM usuarios WHERE email = ?');
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
}
