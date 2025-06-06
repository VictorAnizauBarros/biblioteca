<?php

class Usuario {
    private $conn;
    private $table_name = "usuarios";

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $papel;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function cadastrar($nome, $email, $senha, $papel) {
        $query = "INSERT INTO " . $this->table_name . " (nome, email, senha, papel) 
                  VALUES (:nome, :email, :senha, :papel)";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', password_hash($senha, PASSWORD_DEFAULT));
        $stmt->bindParam(':papel', $papel);
        
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function autenticar($email, $senha) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (password_verify($senha, $usuario['senha'])) {
                return $usuario;
            }
        }
        
        return false;
    }
}